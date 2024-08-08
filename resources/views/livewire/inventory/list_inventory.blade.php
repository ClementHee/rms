<div>
    <div>
        <div >
            <div >
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <input type="search" wire:model="search" class="form-control float-end mt-2 mx-2" placeholder="Search..." style="width: 230px" />
                        <button wire:click="create_new()" class="btn btn-primary float-end">Add New Item</button>

                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Serial Number</th>
                                    <th>Date Purchased</th>
                                    <th>Warranty</th>
                                    <th>Remarks</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inventory as $item)
                                    <tr>
                                      
                                        <td wire:click="viewItem({{$item->product_id}})" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" >{{ $item->name}}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->serial_no }}</td>
                                        <td>{{ $item->date_purchased }}</td>
                                        <td>{{ $item->warranty }}</td>
                                        <td>{{ $item->remarks }}</td>
                                      
                                        <td class="text-center">
                                            
                                            <button type="button"  wire:click="editItem({{$item->product_id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteConfirm({{$item->product_id}})" class="btn btn-danger ">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                           
                        </table>
                        
                    </div>
                    {{$inventory ->links()}}
                </div>
            </div>
        </div>
    </div>

</div>