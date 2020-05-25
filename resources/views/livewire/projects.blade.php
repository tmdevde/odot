<div wire:init="getProjects" x-data="project_list()" class="flex">
    <div class="grid grid-cols-4 gap-4 w-3/4">
    @foreach ($project_list as $p)
        <div class="bg-white-500 text-gray-600 rounded-lg shadow py-2 px-4 font-bold text-sm mr-2 mb-2" wire:key="project_{{$p->id}}">
            <div class="w-full my-4 cursor-pointer" wire:click="getDetails('project',{{$p->id}})">{{$p->name}}</div>  
            @livewire('tasks', ['project_id' => $p->id], key($p->id))
        </div>
    @endforeach

        <div class="relative">
            <div 
                class="bg-white-500 shadow hover:bg-white-200 text-gray-600 rounded-lg py-2 px-4 cursor-pointer font-bold text-sm mr-2"
                @click="isOpen = !isOpen"
            >
                +
            </div>

            <div x-show="isOpen" @click.away="isOpen = false" 
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="origin-top-right absolute left-0 mt-2 w-auto rounded-md shadow-lg">
                <div class="rounded-md bg-white shadow-xs px-6 py-3">
                    <div class="flex flex-wrap -mx-2 text-sm">
                        <div class="font-bold w-full">Name</div>
                        <form wire:submit.prevent="addProject" x-ref="frm_project_new_name">
                        <input 
                            type="text" 
                            wire:model.lazy="project_new_name"
                            id="project_new_name" 
                            class="w-64 bg-gray-200 rounded-lg px-2 py-1 mt-2 text-md focus:border-gray-300 outline-none"
                            x-on:keydown.enter="saveProject()" 
                            x-ref="project_new_name"
                            x-model="inp_project_new_name"
                            />  
                        </form>     
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="w-1/4 border-l border-gray-100 p-4 text-sm bg-white-500 rounded-lg shadow">
    @livewire('details', ['is_project' => false, 'id' => 0] )
    </div>
</div>

<script>
    function project_list() {
        return {
            inp_project_new_name: '',
            isOpen: false,
            isHover: false,
            saveProject() {
                this.inp_project_new_name = '';
                this.isOpen = false;
            }
        }
    }
</script>
