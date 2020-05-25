
    <div wire:init="getTasks()">
        
        <div class="flex flex-wrap w-full" wire:key="tasklist_{{$project_id}}">
            @if ($tasks)
                @foreach ($tasks as $t)
                <div 
                    class="min-w-8 min-h-8 w-8 h-8
                    @if ($t->priority=='1') bg-red-500 
                    @elseif ($t->priority=='2') bg-yellow-500
                    @elseif ($t->priority=='3') bg-green-500
                    @endif
                    rounded shadow cursor-pointer mb-2 mr-2"
                    wire:click="getDetails('task',{{$t->id}})"
                    wire:key="task_{{$t->id}}">
                </div>
                @endforeach
                <div 
                    class="min-w-8 min-h-8 w-8 h-8 bg-white-500 flex items-center justify-center rounded shadow cursor-pointer mb-2"
                    wire:click="getDetails('task_new',{{$project_id}})">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 26 26"
style=" fill:#000000;"><path d="M 12 3 C 11.398438 3 11 3.398438 11 4 L 11 11 L 4 11 C 3.398438 11 3 11.398438 3 12 L 3 14 C 3 14.601563 3.398438 15 4 15 L 11 15 L 11 22 C 11 22.601563 11.398438 23 12 23 L 14 23 C 14.601563 23 15 22.601563 15 22 L 15 15 L 22 15 C 22.601563 15 23 14.601563 23 14 L 23 12 C 23 11.398438 22.601563 11 22 11 L 15 11 L 15 4 C 15 3.398438 14.601563 3 14 3 Z"></path></svg>

                </div>
            @endif
            <div wire:loading wire:target="getTasks" class="spinner mb-2"></div>
        </div>

    </div>

