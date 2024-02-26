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
                            <button wire:click="create_new()" class="btn btn-primary float-end">Add New Parent</button>
                 
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
                                @forelse($parents as $parent)
                                    <tr>
                                   
                                        <td wire:click="viewParent({{$parent->parent_id}})" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" >{{ $parent->name }}</td>
                                        
                                        <td>
                                            
                                            <button type="button"  wire:click="editParent({{$parent->parent_id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteParent({{$parent->parent_id}})" class="btn btn-danger">Delete</button>
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
                    {{$parents ->links()}}
                </div>
                
            </div>
        </div>
    </div>

</div>