<div>
    <div>
   
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        
                            <input type="search" wire:model="search" class="form-control float-end mt-2 mx-2" placeholder="Search..." style="width: 230px" />
                            <button wire:click="create_new()" class="btn btn-primary float-end">Add New Staff</button>
                 
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                              
                                    <th>Name</th>
                                    
                                    <th width='250px'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staffs as $staff)
                                    <tr>
                                   
                                    
                                        <td wire:click="viewStaff('{{$staff->staff_id}}')" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" >{{ $staff->fullname}}</td>
                          
                                        
                                        <td>
                                            
                                            <button type="button"  wire:click="editStaff('{{$staff->staff_id}}')" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteConfirm('{{$staff->staff_id}}')" class="btn btn-danger"  wire:confirm="Are you sure you want to delete this post?">Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">No Record Found</td>
                                    </tr>
                                @endforelse
                             
                            </tbody>
                        </table>
                        
                    </div>
                    {{$staffs ->links()}}
                </div>
                
            </div>
        </div>
    </div>

</div>