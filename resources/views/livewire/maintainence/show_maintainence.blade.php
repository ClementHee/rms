<div>

    <button class="mt-2 btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newMaintainence" >Report an Issue</button>
    @if($updateMode)
        @include('livewire.maintainence.update_issue')
    @endif
        
    <h1 class="text-center">Maintainence book</h1>

    <div wire:poll.60s class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-sm text-center  ">
            <tr>
             
                <th>Issue</th>
                <th>Location</th>
                <th>Reported By</th>
                <th>Time</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Fixed at</th>
                <th>Action</th>
            </tr>

            @foreach ($all_maintainence as $issues)
            @if($issues->fixed==false)
            <tr class='bg-danger text-white bg-opacity-50'>
            @else
                <tr class="bg-success bg-opacity-50 p-2">
            @endif
        
              
                <td>{{ $issues->issue }}</td>
                <td>{{ $issues->location }}</td>
                <td>{{ $issues->reported_by }}</td>
                <td>{{ $issues->reported_at }}</td>
                
                <td>
                    @if($issues->fixed==false)
                    
                        <button type="button" class="btn btn-danger">Not Fixed</button>
               
                    @else
                   <button type="button" class="btn btn-success">Fixed</button>
                        
                    @endif
                </td>
                <td>
                    @if($issues->remarks==null)
                        <p>None</p>
                    @else
                        <p>{{$issues->remarks}}</p>
                    @endif
                </td>
                
                <td>
                    <form>
                        @if($issues->fixed==true)
                        
                            <button wire:click.prevent="mau({{ $issues->issueNo }})" class="btn btn-info">Mark as Unfixed</button>
                        @else
                        
                            <button wire:click.prevent="maf({{ $issues->issueNo }})" class="btn btn-info">Mark as Fixed</button>
                    
                        @endif
                    </form> 
                </td>
                <td>{{ $issues->updated_at }}</td>
           
                <td>
                    <button wire:click="edit({{ $issues->issueNo }})" class="btn btn-primary ">Edit</button>
                    <button wire:click="delete({{ $issues->issueNo }})" class="btn btn-danger">Delete</button>
                </td>

               
            </tr>
            @endforeach
        </table>
        
    </div>

    <div wire:ignore.self class="modal fade" id="newMaintainence" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Report Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal()"></button>
                </div>
            <form> <div class="mb-3 form-group">
                        <label for="issue">Issue:</label>
                        <input type="text" id="issue" name="issue" required class="form-control" placeholder="Enter Title" wire:model="issue"> 
                        @error('issue') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location" required class="form-control" placeholder="Enter Location" wire:model="location">
                        @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="reported_by">Reported By:</label>
                        <input type="text" id="reported_by" name="reported_by" required class="form-control pb-2" placeholder="Enter Your Name" wire:model="reported_by">
                        @error('reported_by') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3 form-group">
                        <label for="remarks">Remarks:</label>
                        <input type="text" id="remarks" name="remarks" required class="form-control pb-2" placeholder="Remarks" wire:model="remarks">
                        @error('remarks') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                            data-bs-dismiss="modal">Close</button>
                        <button wire:click.prevent="storeMaintainences()" class="btn btn-primary">Save</button>
                    </div>
                </form>
                
            
            </div>
        </div>
    </div>
</div>

