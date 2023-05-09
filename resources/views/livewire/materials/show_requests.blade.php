<div>
    

    @if($updateMode)
        @include('livewire.materials.update_request')
    @else
        @include('livewire.materials.new_request')
    @endif
    
    <h1 class="text-center">Request book</h1>


    <div class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-sm text-center  ">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Class By</th>
                <th>Purpose</th>
                <th>Item</th>
                <th>Date Needed</th>
                <th>Status</th>
                <th>Fulfilled</th>
                <th width="150px">Action</th>
            </tr>

            @foreach ($all_request as $request)
            
            <tr>
                <td>{{ $request->request_id }}</td>
                <td>{{ $request->requested_by }}</td>
                <td>{{ $request->class }}</td>
                <td>{{ $request->purpose }}</td>
                <td>{{ $request->item }}</td>
                <td>{{ $request->needed }}</td>
                <td>
                    @if($request->fulfilled==false)
                        <button type="button" class="btn btn-danger">Not Fulfilled</button>
                    @else
                        <button type="button" class="btn btn-success">Fulfilled</button>
                    @endif
                </td>
                
                
                <td>
                    <form>
                        @if($request->fulfilled==true)
                        
                            <button wire:click.prevent="mauf({{ $request->request_id }})" class="btn btn-info">Mark as Unfulfilled</button>
                        @else
                        
                            <button wire:click.prevent="maf({{ $request->request_id }})" class="btn btn-info">Mark as Fulfilled</button>
                    
                        @endif
                    </form> 
                </td>

                <td>
                    <button wire:click="editRequest({{ $request->request_id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteRequest({{ $request->request_id }})" class="btn btn-danger ">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>  

