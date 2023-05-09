<div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Students
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button wire:click="create_new()" class="btn btn-primary float-end">Add New Student</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                              
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>D.O.B</th>
                                    <th>Birth Cert</th>
                                    <th>Morning Class</th>
                                    <th>Afternoon Class</th>
                                    <th width='250px'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                   
                                        <td>{{ $student->fullname }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->dob }}</td>
                                        <td>{{ $student->birth_cert_no }}</td>
                                        <td>{{ $student->mykid }}</td>
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
                                   
                                        <td> @if ( $student->aft_j3_class !="")
                                            {{ $student->aft_j3_class}}
                                        @elseif( $student->aft_j2_class !="")
                                            {{ $student->aft_j2_class}}
                                        @elseif($student->aft_j1_class!="")
                                            {{ $student->aft_j1_class}}
                                        @else
                                            Not Assigned
                                        @endif</td>
                                        <td>
                                            <button type="button"  wire:click="viewStudent({{$student->student_id}})" class="btn btn-primary">
                                                View
                                            </button>
                                            <button type="button"  wire:click="editStudent({{$student->student_id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteStudent({{$student->student_id}})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>