<div class="">
    <div wire:loading wire:target="getDetails" class="spinner mb-2"></div>
    <div>
        @if ($mode=='project')
            @if ($project)
            
            <form wire:submit.prevent="addProject">
            <div class="font-bold w-full mb-2">Name</div>
            <input 
                type="text" 
                wire:model.lazy="project_update.name"
                class="brand-input w-full outline-none"
            />  
            </form>  
            
            <div class="flex justify-between  items-center w-full mt-8">
                <div 
                    class="flex text-center bg-blue-500 text-white-500 hover:bg-blue-600 px-4 py-2 rounded font-bold cursor-pointer"
                    wire:click="updateProject()"
                    >
                    <div class="spinner-light mr-4" wire:loading wire:target="updateProject"></div>
                    <div class="">Save</div>
                </div> 
                <div 
                    class="flex text-center bg-red-500 text-white-500 hover:bg-red-600 px-4 py-2 rounded font-bold cursor-pointer"
                    wire:click="deleteProject()"
                    >
                    <div class="spinner-light mr-4" wire:loading wire:target="deleteProject"></div>
                    <div class="">Delete</div>
                </div>
            </div>


            @endif
        @elseif ($mode=='task')
            @if ($task)
            
            <form wire:submit.prevent="addTask">
            <div class="font-bold w-full mb-2">Name</div>
            <input 
                type="text" 
                wire:model.lazy="task_update.name"
                class="brand-input w-full outline-none"
            />  
            <div class="font-bold w-full mt-4 mb-2">Priority</div>
            <select 
                wire:model.lazy="task_update.priority"
                class="brand-input w-full outline-none"
            >
                <option value="1">High</option>
                <option value="2">Middle</option>
                <option value="3">Low</option>
            </select>
            </form>  
            
            <div class="flex justify-between  items-center w-full mt-8">
                <div 
                    class="flex text-center bg-blue-500 text-white-500 hover:bg-blue-600 px-4 py-2 rounded font-bold cursor-pointer"
                    wire:click="updateTask()"
                    >
                    <div class="spinner-light mr-4" wire:loading wire:target="updateTask"></div>
                    <div class="">Save</div>
                </div> 
                <div 
                    class="flex text-center bg-red-500 text-white-500 hover:bg-red-600 px-4 py-2 rounded font-bold cursor-pointer"
                    wire:click="deleteTask()"
                    >
                    <div class="spinner-light mr-4" wire:loading wire:target="deleteTask"></div>
                    <div class="">Delete</div>
                </div>
            </div>
            @endif
        @elseif ($mode=='task_new')
        <form wire:submit.prevent="addTask">
            <div class="font-bold w-full mb-2">Name</div>
            <input 
                type="text" 
                wire:model.lazy="task_new.name"
                class="brand-input w-full outline-none"
            />  
            <div class="font-bold w-full mt-4 mb-2">Priority</div>
            <select 
                wire:model.lazy="task_new.priority"
                class="brand-input w-full outline-none"
            >
                <option value="1">High</option>
                <option value="2">Middle</option>
                <option value="3">Low</option>
            </select>
        </form>  
            
        <div class="flex justify-between  items-center w-full mt-8">
            <div 
                class="flex text-center bg-blue-500 text-white-500 hover:bg-blue-600 px-4 py-2 rounded font-bold cursor-pointer"
                wire:click="addTask()"
                >
                <div class="spinner-light mr-4" wire:loading wire:target="addTask"></div>
                <div class="">Add</div>
            </div> 
        </div>
        @endif


        
    </div>
    
    <div>
</div>
