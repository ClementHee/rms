<div>
    <button class="mt-2  btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newTask" >Report an Issue</button>
    @include('livewire.to_do_list.add_to_do_list')
    @if ($this->mode=="update")
    @include('livewire.to_do_list.edit_to_do_list')
    @endif

    <div wire:poll.60s class="p-3 mt-2 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="pt-3 table table-striped table-sm text-center  ">
            <tr>
             
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
                <th>Days</th>
                <th>Action</th>
            </tr>

            @foreach ($task_lists as $task)
                <td>{{ $task->task }}</td>
                <td>
            
                    @if($task->status==true)
                    
                        <button type="button" wire:click.prevent="mau('{{ $task->task_no }}')" class="btn btn-info">Mark as Unfixed</button>
                    @else
                    
                        <button type="button" wire:click.prevent="maf('{{ $task->task_no }}')" class="btn btn-info">Mark as Fixed</button>
                
                    @endif
    
            </td>
                <td>{{ $task->date }}</td>
                <td>{{ $task->days }}</td>
                
                <td>
                    <button wire:click="editToDoList('{{ $task->task_no }}')"class="btn btn-primary" >Edit</button>
                    <button wire:click="deleteConfirm('{{$task->task_no}}')" class="btn btn-danger">Delete</button>
                </td>

            </tr>
            @endforeach
        </table>
</div>
