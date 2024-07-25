<div >
    <button class="mt-2 btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newRequest" >New Request</button>
    @if ($this->filters=='reset')
      <button wire:click.prevent="filterUnfulfilled()" class="mt-2 btn btn-info btn-lg" >
        Show Unfulfilled</button> 

    @elseif($this->filters=='fulfilled')
        <button wire:click.prevent="filterFulfilled()" class="mt-2 btn btn-info btn-lg" >
        Show Fulfilled</button>
    
    @else
        <button wire:click.prevent="filterReset()" class="mt-2 btn btn-info btn-lg" >
       Reset Filter</button>
   @endif
    @if($updateMode)
        @include('livewire.materials.update_request')
    @endif

    <button wire:click.prevent="exportData()" class="mt-2 btn btn-info btn-lg" >
        Export</button>
    <h1 class="text-center">Request book</h1>


    <div wire:poll.60s class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-responsive-xl text-center  ">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Class By</th>
                <th>Purpose</th>
                <th>Item</th>
                <th>Date Needed</th>
                <th>Status</th>
                <th>Fulfilled</th>
                <th>Action</th>
            </tr>

            @foreach ($all_request as $request)

            <tr class='bg-opacity-50'>
           
            
                <td>{{ $request->date }}</td>
                <td>{{ $request->requested_by }}</td>
                <td>{{ $request->class }}</td>
                <td>{{ $request->purpose }}</td>
                <td>{{ $request->item." ".$request->item2 }}</td>
                <td>{{ $request->needed }}</td>
                <td>
                    @if($request->fulfilled==false)
                        <button type="button" class="btn btn-danger">Not Fulfilled</button>
                    @else
                        <button type="button" class="btn btn-success">Fulfilled</button>
                    @endif
                </td>
                
                
                <td>
                  
                        @if($request->fulfilled==true)
                        
                            <button wire:click.prevent="mauf({{ $request->request_id }})" class="btn btn-info">Mark as Unfulfilled</button>
                        @else
                        
                            <button wire:click.prevent="maf({{ $request->request_id }})" class="btn btn-info">Mark as Fulfilled</button>
                    
                        @endif
                    
                </td>

                <td>
                    <button wire:click="editRequest({{ $request->request_id }})" class="btn btn-primary">Edit</button>
                    <br>
                    @role('Admin|EMT|SuperAdmin')
                    <button wire:click="deleteConfirm({{ $request->request_id }})" class="btn btn-danger mt-1">Delete</button>
                    @endrole
                </td>
            </tr>
            @endforeach
        </table>
        {{$all_request -> links("pagination::bootstrap-5")}}
        
    </div>

    <div wire:ignore.self class="modal fade" id="newRequest" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Create Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal()"></button>
            </div>
            <form>
                <div class="mb-3 form-group">
                    <label for="requested_by">Requested by:</label>
                    <input type="text" id="requested_by" name="requested_by" required class="form-control pb-2" placeholder="Enter Your Name" wire:model="requested_by">
                    @error('requested_by') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3 form-group">
                    <label for="class">Class:</label>
                    <input type="text" id="class" name="class" required class="form-control" placeholder="Enter Class" wire:model="class"> 
                    @error('class') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3 form-group">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" name="purpose" required class="form-control pb-2" placeholder="Inidcate for what purpose" wire:model="purpose">
                    @error('purpose') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="mb-3 form-group">
                    <label for="item">Item:</label>
                    <input type="text" id="item" name="item" required class="form-control" placeholder="Enter Items (Row 1)" wire:model="item" maxlength="254"> 
                    @error('item') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3 form-group">
                    <label for="item2">Item:</label>
                    <input type="text" id="item2" name="item2" required class="form-control" placeholder="Enter Items (Row 2 Optional)" wire:model="item2"> 
                    @error('item2') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
    
                <div class="mb-3 form-group">
                    <label for="needed">Date Needed</label>
                    <input type="date" id="needed" name="needed" required class="form-control" wire:model="needed">
                    @error('needed') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                        data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent="storeRequest()" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>