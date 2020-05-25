<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Project;
use App\Task;
use Auth;

class Tasks extends Component
{

    use AuthorizesRequests;

    public $project_id;
    public $project = null;
    public $tasks = null;

    protected $listeners = ['refreshTasks' => 'getTasks'];

    public function mount($project_id) {

        $this->project_id = $project_id;
        $this->getTasks();
    }

    public function getTasks() {
        $this->project = Project::where('user_id',Auth::user()->id)->where('id',$this->project_id)->first();
        if ($this->project!=null) {
            $this->tasks = null;
            
            $this->tasks = Task::where('project_id',$this->project_id)->orderBy('priority')->get();
        }
    }

    public function getDetails($mode,$id) {
        $this->emitTo('details','getDetails',  $mode, $id);
    }


    public function render()
    {
        return view('livewire.tasks');
    }
}
