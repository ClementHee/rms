<div>
    <div>
        <div >
            <div >
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        
                        <input type="search" wire:model="search" class="form-control float-end mt-2 mx-2" placeholder="Search..." style="width: auto;" />
   
                            <select class="form-select form-select float-end mt-2 mx-2" wire:model="searchType" name="searchType" id="searchType" style="width:auto;">
                                <option value="fullname">Name</option>
                                <option value="carplate">CarPlate No.</option>
                                <option value="father_tel">Father's Hp NO.</option>
                                <option value="mother_tel">Mother's Hp NO.</option>
                            </select>
                            <h6 class="float-end mt-3 mx-2">Search By:</h6>
          
                        <button wire:click="create_new()" class="btn btn-primary mt-2 float-end">Add New Student</button>
                      
                        @if ($this->filters=='reset')
                            <button wire:click.prevent="filterActive()" class="btn btn-success mt-2  float-end" >
                                Show active
                            </button> 

                        @elseif($this->filters=='active')
                            <button wire:click.prevent="filterWithdrawn()" class="btn btn-danger mt-2  float-end" >
                                Show Withdrawn
                            </button>
                        @elseif($this->filters=='withdrawn')
                            <button wire:click.prevent="filterGraduated()" class="btn btn-info mt-2  float-end" >
                                Show Graduated
                            </button>
                        @else
                            <button wire:click.prevent="filterReset()" class="btn btn-secondary mt-2  float-end" >
                                Reset Filter
                            </button>
                        @endif
                    </div>

                    
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>D.O.B</th>
                                    <th>Birth Cert</th>
                                    <th>Status</th>
                                    <th>Morning Class</th>
                                    <th>Afternoon Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                   
                                        <td wire:click="viewStudent({{$student->student_id}})" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" >{{ $student->first_name." ".$student->last_name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->dob }}</td>
                                        <td>{{ $student->birth_cert_no }}</td>
                                        <td>@if( $student->status=='withdrawn')
                                            <button type="button" class="btn btn-danger">Withdrawn</button>
                                        @elseif ($student->status=='graduated')
                                            <button type="button" class="btn btn-info">Graduated</button>
                                        @else
                                            <button type="button" class="btn btn-success">Enrolled</button>
                                        @endif
                                        </td>
                                        <td>
                                            @if ( $student->j3_class !="")
                                                {{ $student->j3_class}}
                                            @elseif( $student->j2_class !="")
                                                {{ $student->j2_class}}
                                            @elseif($student->j1_class)
                                                {{ $student->j1_class}}
                                            @else
                                                Not Assigned
                                            @endif
                                        </td>
                                   
                                        <td> @if ( $student->aft_j3_class !=""  and $student->j3_class!="")
                                            {{ $student->aft_j3_class}}
                                        @elseif( $student->aft_j2_class !=""  and $student->j2_class!="") 
                                            {{ $student->aft_j2_class}}
                                        @elseif($student->aft_j1_class!="")
                                            {{ $student->aft_j1_class}}
                                        @else
                                            Not Assigned
                                        @endif</td>
                                        <td class="text-center">
                                            
                                            <button type="button"  wire:click="editStudent({{$student->student_id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteConfirm({{$student->student_id}})" class="btn btn-danger ">Delete</button>
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
                    {{$students ->links()}}
                </div>
            </div>
        </div>
    </div>

</div>