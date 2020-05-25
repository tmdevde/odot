<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;
use App\Project;

class Projects extends Component
{

    use AuthorizesRequests;

    public $project_list = null;
    public $project_new_name = '';

    protected $listeners = ['refreshProjects' => '$refresh'];

    public function mount() {
        $this->getProjects();
    }

    public function getProjects() {
        $this->project_list = Project::where('user_id',Auth::user()->id)->orderBy('name')->get();
    }

    public function addProject() {
       $project = new Project;
       $project->name = $this->project_new_name;
       $project->user_id = Auth::user()->id;
       $project->save();
       $this->getProjects();
    }

    public function getDetails($mode,$id) {
        $this->emitTo('details','getDetails', $mode, $id);
    }

    public function render()
    {
        return view('livewire.projects');
    }
}
 