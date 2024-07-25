<div>
    <button wire:click=cancel() class="btn btn-secondary">Cancel</button>
    @if ($this->mode=='view_single')
         <button wire:click.prevent="fillPDF()" class='btn btn-primary'>Download Filled Form</button>
    @endif
   
    <form class=" p-4 shadow-lg  bg-white border border-secondary rounded">
        @csrf
        <div class='row'>
            <div class="mb-3 form-group col">
                <div class ="search-box">
                    <label for="staff">Staff: </label>
                    <input required type="text" id="staff" name="staff" wire:keyup="searchResultStaff" class="form-control" placeholder="Staff's name" wire:model="staff">
                    @if($showStaff)
                        <ul >
                            @if(!empty($all_staff))
                                @forelse($all_staff as $record_staff)
                                    <li wire:click="fetchStaff('{{ $record_staff->staff_id }}')" >{{$record_staff->fullname}}</li>
                                @empty
                                    <li>No record Found</li>
                                @endforelse
                   
                            @endif
                        </ul>
                    @endif

                    @error('staff') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
     
        <div class="mb-3 form-group col">
            <p class='d-inline ml-n3'>Category:</p><br>
            <div class="form-check form-check-inline mt-3 mb-3">
                <label for="office" class="form-check-label ml-n5 pr-2 ">Office</label>
                <input  class="form-check-input" wire:model='category' type="radio" id="office" name="office" value="Office">
            
                <label for ="teacher" class="form-check-label pr-2">Teachers</label>
                <input  class="form-check-input" wire:model='category' type="radio" id="teacher" name="teacher" value="Teacher">
         
                <label for ="support_staff" class="form-check-label pr-2">Support Staff</label>
                <input  class="form-check-input" wire:model='category' type="radio" id="support_staff" name="support_staff" value="Support Staff">
            </div>
        </div>

        @if ($this->category=="Office")
            <div class="row">
                <h6 ><u>Position</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3 ">
                    <label for="Principal" class="form-check-label ml-n3 pr-2">Principal</label>
                    <input  class="form-check-input" wire:model='position' type="radio" id="Principal" name="Principal" value="principal">
                
                    <label for ="Trainer" class="form-check-label pr-2">Trainer</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="Trainer" name="Trainer" value="trainer">

                    <label for ="Adminstrator" class="form-check-label pr-2">Adminstrator</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="Adminstrator" name="Adminstrator" value="adminstrator">

                    <label for ="ITFM" class="form-check-label pr-2">It & Fac. M</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="ITFM" name="ITFM" value="it_f_m">

                    <label for ="AC" class="form-check-label pr-2">Admin Clerk</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="AC" name="AC" value="admin_clerk">
                
                </div>
            </div>

            <div class ="row">
                <h6 ><u>Leave applied for</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3">
                    <label for="office_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                    <input  class="form-check-input" wire:model='leave_type' type="radio" id="office_mc" name="office_mc" value="office_mc">
                
                    <label for ="office_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="office_emergency" name="office_emergency" value="office_emergency">
            
                    <label for ="office_annual" class="form-check-label pr-2">Annual</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="office_annual" name="office_annual" value="office_annual">
                </div>
            </div>

            <div class ="row">
                <div class="mb-3 form-group col">
                    <label for="no_days">No. of Days: </label>
                    <input type="number" id="no_days" name="no_days" class="form-control" wire:model="no_days">
                </div>
                <div class="mb-3 form-group col">
                    <label for="dates">Dates: </label>
                    <input type="date" id="dates" name="dates" class="form-control" wire:model="date_start">
                </div> 
            </div>

            <div>
                <label for="reasons">Reasons: </label>
                <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
            </div> 

            @if ($this->mode=='apply')
                <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
                <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>
            @endif

            @elseif ($this->category=="Teacher")
            <div class="row">
                <h6 ><u>Position</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3 ">
                    <label for="mt_1" class="form-check-label ml-n3 pr-2">MT</label>
                    <input  class="form-check-input" wire:model='position' type="radio" id="mt_1" name="mt_1" value="mt_1">
                
                    <label for ="at" class="form-check-label pr-2">AT</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="at" name="at" value="at">
                </div>
            </div>

            <div class ="row">
                <h6><u>Leave applied for</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3">
                    <label for="teaching_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                    <input  class="form-check-input" wire:model='leave_type' type="radio" id="teaching_mc" name="teaching_mc" value="teaching_mc">
                
                    <label for ="teaching_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="teaching_emergency" name="teaching_emergency" value="teaching_emergency">
            
                    <label for ="teaching_unpaid" class="form-check-label pr-2">Unpaid</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="teaching_unpaid" name="teaching_unpaid" value="teaching_unpaid">
                </div>

                <div class="mb-3 form-group col">
                    <label for="class_name">Class: </label>
                    <input type="text" id="class_name" name="class_name" class="form-control" wire:model="class_name">
                </div>
            </div>

            <div class ="row">
                <div class="mb-3 form-group col">
                    <label for="no_days">No. of Days: </label>
                    <input type="number" id="no_days" name="no_days" class="form-control" wire:model="no_days">
                </div>
                <div class="mb-3 form-group col">
                    <label for="dates">Dates: </label>
                    <input type="date" id="dates" name="dates" class="form-control" wire:model="date_start">
                </div> 
            </div>

            <div>
                <label for="reasons">Reasons: </label>
                <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
            </div>
            
            @if ($this->mode=='apply')
                <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
                <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>
            @endif
          

            @elseif ($this->category=="Support Staff")
            <div class="row">
                <h6 ><u>Position</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3 ">
                    <label for="Caretaker" class="form-check-label ml-n3 pr-2">Caretaker</label>
                    <input  class="form-check-input" wire:model='position' type="radio" id="Caretaker" name="Caretaker" value="caretaker">
                
                    <label for ="Cleaner" class="form-check-label pr-2">Cleaner</label>
                    <input class="form-check-input" wire:model='position' type="radio" id="Cleaner" name="Cleaner" value="cleaner">
                </div>
            </div>
        
            <div class ="row">
                <h6><u>Leave applied for</u></h6>
                <div class="form-check form-check-inline mt-3 mb-3">
                    <label for="support_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                    <input  class="form-check-input" wire:model='leave_type' type="radio" id="support_mc" name="support_mc" value="support_mc">
                
                    <label for ="support_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="support_emergency" name="support_emergency" value="support_emergency">
            
                    <label for ="support_annual" class="form-check-label pr-2">Annual</label>
                    <input class="form-check-input" wire:model='leave_type' type="radio" id="support_annual" name="support_annual" value="support_annual">
                </div>
            </div>

            <div class ="row">
                <div class="mb-3 form-group col">
                    <label for="no_days">No. of Days: </label>
                    <input type="number" id="no_days" name="no_days" class="form-control" wire:model="no_days">
                </div>
                <div class="mb-3 form-group col">
                    <label for="dates">Dates: </label>
                    <input type="date" id="dates" name="dates" class="form-control" wire:model="date_start">
                </div> 
            </div>
            
            <div>
                <label for="reasons">Reasons: </label>
                <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
            </div>
            
            @if ($this->mode=='apply')
                <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
                <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>
            @endif
        @endif
    </form>
</div>