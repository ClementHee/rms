<div>
    <button class="mt-2  btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newScheduledMaintainence" >Report an Issue</button>
    @include('livewire.scheduled_maintainence.add_scheduled_maintainence')
    @if ($this->mode=="update")
    @include('livewire.scheduled_maintainence.edit_scheduled_maintainence')
    @endif

    <div wire:poll.60s class="p-3 mt-2 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="pt-3 table table-striped table-sm text-center  ">
            <tr>
             
                <th>Issue</th>
                <th>Recurrences</th>
                <th>Days</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            @foreach ($all_scheduled_maintainences as $issues)
        

          
 
                <td>{{ $issues->issue }}</td>
                <td>{{ $issues->recurrences }}</td>
                <td>{{ $issues->days }}</td>
                <td>{{ $issues->scheduled_date }}</td>
                
                
                
             
                
           
                <td>
                    <button wire:click="edit('{{ $issues->maintainence_no }}')"class="btn btn-primary" >Edit</button>
                    <button wire:click="deleteConfirm('{{$issues->maintainence_no}}')" class="btn btn-danger">Delete</button>
                </td>

               
            </tr>
            @endforeach
        </table>
</div>
