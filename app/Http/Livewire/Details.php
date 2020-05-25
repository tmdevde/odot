<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Project;
use App\Task;
use Auth;

class Details extends Component
{

    use AuthorizesRequests;

    public $mode = '';
    public $project = null;
    public $task = null;

    public $project_update= [];
    public $task_update = [];
    public $task_new = [
        'name'      => '',
        'priority'  => ''
    ];

    protected $listeners = ['getDetails'];

    public function mount($mode='',$id) {
        $this->mode = $mode;
    }

    public function getDetails($mode,$id) {
        $this->mode = $mode;

        if ($this->mode=='project') {
            $this->project = Project::where('user_id',Auth::user()->id)->where('id',$id)->first();
            $this->project_update['name'] = $this->project->name;
        } elseif ($this->mode=='task') {
            
            $this->task = Task::where('id',$id)->first();
            $this->task_update['name'] = $this->task->name;
            $this->task_update['priority'] = $this->task->priority;
        } elseif ($this->mode=='task_new') {
            $this->project = Project::where('user_id',Auth::user()->id)->where('id',$id)->first();
        }
    }

    public function updateProject() {
        $project = Project::find($this->project->id);
        $project->name = $this->project_update['name'];
        $project->save();
        $this->refreshProjects();
        $this->mode = 'fresh';
    }


    public function deleteProject() {
        $tasks = Task::where('project_id',$this->project->id)->delete();
        $project = Project::find($this->project->id);
        $project->delete();
        $this->refreshProjects();
        $this->project = null;
        $this->task = null;
        $this->mode = 'fresh';
    }

    public function refreshProjects() {
        $this->emitTo('projects','refreshProjects');
    }

    public function addTask() {
        $task = new Task;
        $task->name = $this->task_new['name'];
        if (!$this->task_new['priority']) $this->task_new['priority'] = '1';
        $task->priority = $this->task_new['priority'];
        $task->project_id =$this->project->id;
        $task->save();
        $this->refrehTasks($this->project->id);
        $this->project = null;
        $this->task_new = [
            'name'      => '',
            'priority'  => ''
        ];
        $this->mode = 'fresh';
    }

    public function updateTask() {
        $task = Task::find($this->task->id);
        $task->name = $this->task_update['name'];
        $task->priority = $this->task_update['priority'];
        $task->save();
        $this->refrehTasks($this->task->project_id);
        $this->project = null;
        $this->task_update = [
            'name'      => '',
            'priority'  => ''
        ];
        $this->mode = 'fresh';
    }

    public function deleteTask() {
        $tasks = Task::find($this->task->id)->delete();
        $this->refrehTasks($this->task->project_id);
        $this->project = null;
        $this->task = null;
    }

    public function refrehTasks($project_id) { 
        $this->emitTo('tasks','refreshTasks',  $project_id);
    }

    public function render()
    {
        return view('livewire.details');
    }
}
