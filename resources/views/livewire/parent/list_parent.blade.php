<div>
    <div class="container">
   
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Parents
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button wire:click="create_new()" class="btn btn-primary float-end">Add New Parent</button>
                        </h4>
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
                                @foreach($parents as $parent)
                                    <tr>
                                   
                                        <td>{{ $parent->name }}</td>
                                        
                                        <td>
                                            <button type="button"  wire:click="viewParent({{$parent->parent_id}})" class="btn btn-primary">
                                                View
                                            </button>
                                            <button type="button"  wire:click="editParent({{$parent->parent_id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteParent({{$parent->parent_id}})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach   
                             
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                {{$parents ->links()}}
            </div>
        </div>
    </div>

</div>