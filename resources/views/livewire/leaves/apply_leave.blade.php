<div>
    <button wire:click=cancel() class="btn btn-secondary">Cancel</button>
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
                <input  class="form-check-input" wire:model='position' type="radio" id="Principal" name="Principal" value="Principal">
            
                <label for ="Trainer" class="form-check-label pr-2">Trainer</label>
                <input class="form-check-input" wire:model='position' type="radio" id="Trainer" name="Trainer" value="Trainer">

                <label for ="Adminstrator" class="form-check-label pr-2">Adminstrator</label>
                <input class="form-check-input" wire:model='position' type="radio" id="Adminstrator" name="Adminstrator" value="Adminstrator">

                <label for ="ITFM" class="form-check-label pr-2">It & Fac. M</label>
                <input class="form-check-input" wire:model='position' type="radio" id="ITFM" name="ITFM" value="ITFM">

                <label for ="AC" class="form-check-label pr-2">Admin Clerk</label>
                <input class="form-check-input" wire:model='position' type="radio" id="AC" name="AC" value="AC">
               
            </div>
        </div>
        <div class ="row">
            <h6 ><u>Leave applied for</u></h6>
            <div class="form-check form-check-inline mt-3 mb-3">
                <label for="office_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                <input  class="form-check-input" wire:model='leave_type' type="radio" id="office_mc" name="office_mc" value="Medical with MC">
            
                <label for ="office_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="office_emergency" name="office_emergency" value="Emergency/Compassionate">
         
                <label for ="office_annual" class="form-check-label pr-2">Annual</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="office_annual" name="office_annual" value="Annual">
            </div>
        </div>
        <div class ="row">
            <div class="mb-3 form-group col">
                <label for="no_days">No. of Days: </label>
                <input type="number" id="no_days" name="no_days" class="form-control" wire:model="no_days">
            </div>
            <div class="mb-3 form-group col">
                <label for="dates">Dates: </label>
                <input type="date" id="dates" name="dates" class="form-control" wire:model="dates">
            </div> 
        </div>
        <div>
            <label for="reasons">Reasons: </label>
            <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
        </div> 
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>

        @elseif ($this->category=="Teacher")
        <div class="row">
            <h6 ><u>Position</u></h6>
            <div class="form-check form-check-inline mt-3 mb-3 ">
                <label for="MT" class="form-check-label ml-n3 pr-2">MT</label>
                <input  class="form-check-input" wire:model='position' type="radio" id="MT" name="MT" value="MT">
            
                <label for ="AT" class="form-check-label pr-2">AT</label>
                <input class="form-check-input" wire:model='position' type="radio" id="AT" name="AT" value="AT">
            </div>
        </div>
        <div class ="row">
            <h6><u>Leave applied for</u></h6>
            <div class="form-check form-check-inline mt-3 mb-3">
                <label for="teachers_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                <input  class="form-check-input" wire:model='leave_type' type="radio" id="teachers_mc" name="teachers_mc" value="Medical with MC">
            
                <label for ="teachers_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="teachers_emergency" name="teachers_emergency" value="Emergency/Compassionate">
         
                <label for ="teachers_unpaid" class="form-check-label pr-2">Unpaid</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="teachers_unpaid" name="teachers_unpaid" value="Unpaid">
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
                <input type="date" id="dates" name="dates" class="form-control" wire:model="dates">
            </div> 
        </div>
        <div>
            <label for="reasons">Reasons: </label>
            <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
        </div>
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>

        @elseif ($this->category=="Support Staff")
        <div class="row">
            <h6 ><u>Position</u></h6>
            <div class="form-check form-check-inline mt-3 mb-3 ">
                <label for="Caretaker" class="form-check-label ml-n3 pr-2">Caretaker</label>
                <input  class="form-check-input" wire:model='position' type="radio" id="Caretaker" name="Caretaker" value="Caretaker">
            
                <label for ="Cleaner" class="form-check-label pr-2">Cleaner</label>
                <input class="form-check-input" wire:model='position' type="radio" id="Cleaner" name="Cleaner" value="Cleaner">
            </div>
        </div>
     
       
        <div class ="row">
            <h6><u>Leave applied for</u></h6>
            <div class="form-check form-check-inline mt-3 mb-3">
                <label for="support_mc" class="form-check-label ml-n3 pr-2">Medical with MC</label>
                <input  class="form-check-input" wire:model='leave_type' type="radio" id="support_mc" name="support_mc" value="Medical with MC">
            
                <label for ="support_emergency" class="form-check-label pr-2">Emergency/Compassionate</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="support_emergency" name="support_emergency" value="Emergency/Compassionate">
         
                <label for ="support_annual" class="form-check-label pr-2">Unpaid</label>
                <input class="form-check-input" wire:model='leave_type' type="radio" id="support_annual" name="support_annual" value="Annual">
            </div>
        </div>

        <div class ="row">
            <div class="mb-3 form-group col">
                <label for="no_days">No. of Days: </label>
                <input type="number" id="no_days" name="no_days" class="form-control" wire:model="no_days">
            </div>
            <div class="mb-3 form-group col">
                <label for="dates">Dates: </label>
                <input type="date" id="dates" name="dates" class="form-control" wire:model="dates">
            </div> 
        </div>
        <div>
            <label for="reasons">Reasons: </label>
            <input type="text" id="reasons" name="reasons" class="form-control" wire:model="reasons">
        </div>
    
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="applyLeave()" class="btn btn-primary">Submit</button>
        @endif

        
    </form>
</div>