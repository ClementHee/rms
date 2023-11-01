<div>
    
    <form class=" p-4 shadow-lg  bg-white border border-secondary rounded" >
    <h2><u>Staff Details</u></h2>   
    @csrf
        <div class="mb-3">
            <label for="fullname">Fullname:</label>
            <input type="text" id="fullname" name="fullname" required class="form-control" placeholder="Full Name" wire:model="fullname"> 
        </div>

        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required class="form-control" wire:model="dob"> 
                @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="nric">NRIC:</label>
                <input type="text" id="nric" name="nric" required class="form-control" placeholder="IC number" wire:model="nric"> 
                @error('nric') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="birth_cert_no">Birth Certification No:</label>
                <input type="text" id="birth_cert_no" name="birth_cert_no" required class="form-control" placeholder="Birth Cert No (If Applicable)" wire:model="birth_cert_no"> 
                @error('birth_cert_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="">Marital Status: </label>
                <select class="form-select" wire:model="marital_status" name="marital_status" id="marital_status">
                    <option value="">Select an option</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Other">Other</option>
                </select>
                @error('marital_status') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">  
            <div class="mb-3 form-group col">
                <p class='d-inline'>Gender:</p><br>
                  <div class="form-check form-check-inline mt-3 mb-3">
                        <label for="male" class="form-check-label pr-2">Male</label>
                        <input  class="form-check-input" wire:model='gender' type="radio" id="male" name="male" value="Male">
                    </div>
    
                    <div class="form-check form-check-inline  mb-3"> 
                        <label for ="female" class="form-check-label pr-2">Female</label>
                        <input  class="form-check-input" wire:model='gender' type="radio" id="female" name="female" value="Female">
                    </div>
            </div>

            <div class="mb-3 form-group col">
                <label for="race">Race:</label>
                <input type="text" id="race" name="race" class="form-control" placeholder="Race" wire:model="race"> 
                @error('race') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="religion">Religion:</label>
                <input type="text" id="religion" name="religion" required class="form-control" placeholder="Religion" wire:model="religion"> 
                @error('religion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" required class="form-control" placeholder="Nationality" wire:model="nationality"> 
                @error('nationality') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="home_add">Home Address:</label>
            <input type="text" id="home_add" name="home_add" class="form-control" placeholder="Home Address" wire:model="home_add"> 
            @error('home_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="home_tel">Home Telephone No.:</label>
                <input type="text" id="home_tel" name="home_tel" class="form-control" placeholder="Home Telephone No." wire:model="home_tel"> 
                @error('home_tel') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="hp_no">Handphone No.:</label>
                <input type="text" id="hp_no" name="hp_no"  class="form-control" placeholder="Handphone Number" wire:model="hp_no"> 
                @error('hp_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  class="form-control" placeholder="Email" wire:model="email"> 
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>  
            
        </div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="allergies">Allergies:</label>
                <input type="text" id="allergies" name="allergies" class="form-control" placeholder="Allergies" wire:model="allergies"> 
                @error('allergies') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="qualification">Qualifications: </label>
                <select class="form-select" wire:model="qualification" name="qualification" id="qualification">
                    <option value="">Select an option</option>
                    <option value="SPM">SPM</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Masters">Masters</option>
                    <option value="Other">Other</option>
                </select>
                @error('marital_status') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="other">Course Name:</label>
                <input type="text" id="other" name="other" class="form-control" placeholder="State your course name" wire:model="other"> 
                @error('other') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        @if($this->marital_status=="Married")
        <hr style="border-top: 3px solid grey;">
        <h2><u>Spouse Details</u></h2>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="spouse">Spouse:</label>
                <input type="text" id="spouse" name="spouse" placeholder="Spouse Name" class="form-control" wire:model="spouse"> 
                @error('spouse') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_nric">Spouse NRIC:</label>
                <input type="text" id="spouse_nric" name="spouse_nric" class="form-control" placeholder="IC number" wire:model="spouse_nric"> 
                @error('spouse_nric') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_dob">Spouse D.O.B:</label>
                <input type="date" id="spouse_dob" name="spouse_dob" class="form-control" wire:model="spouse_dob"> 
                @error('spouse_dob') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">  

            <div class="mb-3 form-group col">
                <label for="spouse_race">Race:</label>
                <input type="text" id="spouse_race" name="spouse_race" class="form-control" placeholder="Race" wire:model="spouse_race"> 
                @error('spouse_race') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_nationality">Nationality:</label>
                <input type="text" id="spouse_nationality" name="spouse_nationality" class="form-control" placeholder="Nationality" wire:model="spouse_nationality"> 
                @error('spouse_nationality') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_religion">Spouse Religion:</label>
                <input type="text" id="spouse_religion" name="spouse_religion" class="form-control" placeholder="Religion" wire:model="spouse_religion"> 
                @error('spouse_religion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

        </div>

        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="spouse_occupation">Spouse Occupation:</label>
                <input type="text" id="spouse_occupation" name="spouse_occupation" class="form-control" placeholder="Occupation" wire:model="spouse_occupation"> 
                @error('spouse_occupation') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_comp">Spouse Company:</label>
                <input type="text" id="spouse_comp" name="spouse_comp" class="form-control" placeholder="Company Name" wire:model="spouse_comp"> 
                @error('spouse_comp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_office_no">Spouse Office No.:</label>
                <input type="text" id="spouse_office_no" name="spouse_office_no" class="form-control" placeholder="Office Tel." wire:model="spouse_office_no"> 
                @error('spouse_office_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="spouse_hp">Spouse Contact No.:</label>
                <input type="text" id="spouse_hp" name="spouse_hp" class="form-control" placeholder="Contact No." wire:model="spouse_hp"> 
                @error('spouse_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        @endif

        <button wire:click="cancel()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="updateStaff()" class="btn btn-secondary">Update</button>
    </form>
   


</div>

