<div>
    <div class='container'>
        <h2>Update Student</h2>
    <button readonly wire:click="list_all()" class="btn btn-primary">Back</button><br>
    <form class="form-inline">
        @csrf
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="record_year">Year:</label>
                <input type="number" id="record_year" name="record_year" required class="form-control" placeholder="Entry Year" readonly wire:model="record_year"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="type">Type:</label>
                <select class="form-select" disabled wire:model="type" name="type" id="type">
                    <option value="">Select an option</option>
                    <option value="halfday">Half Day</option>
                    <option value="fullday">Full Day</option>
                </select>
            </div>   
        </div>
              <div class="mb-3 form-group col ">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required class="form-control" placeholder="Full Name" readonly wire:model="fullname"> 
                @error('issue') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            <p class='d-inline px-1'>Gender:</p>
      
                <div class="form-check form-check-inline mb-3">
                    
                    <label class="form-check-label">Male</label>
                    <input  class="form-check-input" disabled wire:model='gender' type="radio" name="gender" value="M">

                </div>

                <div class="form-check form-check-inline  mb-3">
                    
                    <label class="form-check-label">Female</label>
                    <input  class="form-check-input" disabled wire:model='gender' type="radio" name="gender" value="F">
                </div>
            

       

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="dob" >Date of Birth:</label>
                <input type="date" id="dob" name="dob" required class="form-control pb-2" readonly wire:model="dob">
                @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="birth_cert_no">Birth Cert No:</label>
                <input type="text" id="birth_cert_no" name="birth_cert_no" required class="form-control pb-2" placeholder="Birth Cert" readonly wire:model="birth_cert_no">
                @error('birth_cert_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
            <div class="mb-3 form-group col">
                <label for="pos_in_family">Position in Family:</label>
                <input type="text" id="pos_in_family" name="pos_in_family" required class="form-control pb-2" placeholder="Position in Family" readonly wire:model="pos_in_family">
                @error('pos_in_family') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col">
                <label for="race">Race:</label>
                <input type="text" id="race" name="race" required class="form-control pb-2" placeholder="Race" readonly wire:model="race">
                @error('race') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" required class="form-control pb-2" placeholder="Nationality" readonly wire:model="nationality">
                @error('nationality') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="religion">Religion: </label>
                <input type="text" id="religion" name="religion" required class="form-control pb-2" placeholder="Religion" readonly wire:model="religion">
                @error('religion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="home_add">Home Address: </label>
            <input type="text" id="home_add" name="home_add" required class="form-control pb-2" placeholder="Home Address" readonly wire:model="home_add">
            @error('home_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="home_lang">Home Language: </label>
                <input type="text" id="home_lang" name="home_lang" required class="form-control pb-2" placeholder="Home Language" readonly wire:model="home_lang">
                @error('home_lang') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="mb-3 form-group col">
                <label for="home_tel">Home Telephone: </label>
                <input type="text" id="religion" name="home_tel" required class="form-control pb-2" placeholder="Home Telephone" readonly wire:model="home_tel">
                @error('home_tel') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        
        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="prev_kindy">Previous Kindygarden/Play School:</label>
                <input type="text" id="prev_kindy" name="prev_kindy" class="form-control pb-2" placeholder="If Any" readonly wire:model="prev_kindy">
                @error('prev_kindy') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="no_years">Number of Years:</label>
                <input type="number" id="no_years" name="no_years"  class="form-control pb-2" placeholder="No of Years" readonly wire:model="no_years">
                @error('no_years') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class ="search-box">
            <div class='row'>
                <div class="mb-3 form-group col">
                    <label for="father">Father: </label>
                    <input required type="text" id="father" name="father" readonly wire:keyup="searchResult" class="form-control" placeholder="Father's name" readonly wire:model="father">
                  

                    @error('father') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                
                <div class="mb-3 form-group col">
                    <label for="mother">Mother: </label>
                    <button wire:click="redirectParent('{{$this->mother}}')" class="form-control pb-2 btn btn-primary">{{$this->mother}}</button>
                   
                    @error('mother') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact (other than parents): </label>
                <input type="text" id="e_contact" name="e_contact" required class="form-control pb-2" placeholder="Name" readonly wire:model="e_contact">
                @error('e_contact') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact (other than parents): </label>
                <input required type="text" id="e_contact_hp" name="e_contact_hp" required class="form-control pb-2" placeholder="Emergency Contact Number" readonly wire:model="e_contact_hp">
                @error('e_contact_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="fam_doc">Family Doctor: </label>
                <input type="text" id="fam_doc" name="fam_doc"  class="form-control pb-2" placeholder="Family Doctor" readonly wire:model="fam_doc">
                @error('fam_doc') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
            <div class="mb-3 form-group col">
                <label for="allergies">Allergies: </label>
                <input type="text" id="allergies" name="allergies" class="form-control pb-2" placeholder="Allergies" readonly wire:model="allergies">
                @error('allergies') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="others">Other information: </label>
            <input type="text" id="others" name="others"  class="form-control pb-2" placeholder="Other information" readonly wire:model="others">
            @error('others') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3 form-group">
            <label for="potential">Potential: </label>
            <input type="text" id="potential" name="potential"  class="form-control pb-2" placeholder="Name" readonly wire:model="potential">
            @error('potential') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        
        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="class">J1 Class: </label>
                <input type="text" id="j1_class" name="j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J2 Class: </label>
                <input type="text" id="j2_class" name="j2_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="j2_class">
                @error('j2_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J3 Class: </label>
                <input type="text" id="j3_class" name="j3_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J1: </label>
                <input type="text" id="aft_j1_class" name="aft_j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="aft_j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J2: </label>
                <input type="text" id="aft_j2_class" name="aft_j2_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="aft_j2_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J3: </label>
                <input type="text" id="aft_j3_class" name="j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" readonly wire:model="aft_j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        
    </form>
    </div>
</div>

