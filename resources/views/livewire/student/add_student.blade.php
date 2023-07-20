
<div class='container'>
    <form class="form-inline p-4 shadow-lg  bg-white border border-secondary rounded" >

        <h2>New Student</h2>

        @csrf
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="entry_year">Year:</label>
                <input type="number" id="entry_year" name="entry_year" required class="form-control" placeholder="Entry Year" wire:model="entry_year"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="type">Type:</label>
                <select class="form-select" wire:model="type" name="type" id="type">
                    <option value="">Select an option</option>
                    <option value="Half Day">Half Day</option>
                    <option value="Full Day">Full Day</option>
                </select>
            </div>   

            <div class="mb-3 form-group col">
                <label for="enrolment_date">Enrolment Date:</label>
                <input type="date" id="enrolment_date" name="enrolment_date" required class="form-control" placeholder="Date Enrolled" wire:model="enrolment_date"> 
            </div>
        </div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="first_name">Full Name:</label>
                <input type="text" id="first_name" name="first_name" required class="form-control" placeholder="First Name" wire:model="first_name"> 
                @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col ">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required class="form-control" placeholder="Last Name" wire:model="last_name"> 
                @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col ">
                <label for="relationship_w_child">Relationship With Child:</label>
                <input type="text" id="relationship_w_child" name="relationship_w_child" required class="form-control" placeholder="Relationship With Child" wire:model="relationship_w_child"> 
                @error('relationship_w_child') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div >
            <p class='d-inline px-1'>Gender:</p>
      
                <div class="form-check form-check-inline mb-3">
                    
                    <label class="form-check-label">Male</label>
                    <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="M">

                </div>

                <div class="form-check form-check-inline  mb-3">
                    
                    <label class="form-check-label">Female</label>
                    <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="F">
                </div>
            
            </div>
       

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="dob" >Date of Birth:</label>
                <input type="date" id="dob" name="dob" required class="form-control pb-2" wire:model="dob">
                @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="birth_cert_no">Birth Cert No:</label>
                <input type="text" id="birth_cert_no" name="birth_cert_no" required class="form-control pb-2" placeholder="Birth Cert" wire:model="birth_cert_no">
                @error('birth_cert_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="birth_cert_no">MyKid No:</label>
                <input type="text" id="mykid" name="mykid" required class="form-control pb-2" placeholder="MyKid" wire:model="mykid">
                @error('mykid') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
        
            <div class="mb-3 form-group col">
                <label for="pos_in_family">Position in Family:</label>
                <input type="text" id="pos_in_family" name="pos_in_family" required class="form-control pb-2" placeholder="Position in Family" wire:model="pos_in_family">
                @error('pos_in_family') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col">
                <label for="race">Race:</label>
                <input type="text" id="race" name="race" required class="form-control pb-2" placeholder="Race" wire:model="race">
                @error('race') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" required class="form-control pb-2" placeholder="Nationality" wire:model="nationality">
                @error('nationality') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="religion">Religion: </label>
                <input type="text" id="religion" name="religion" required class="form-control pb-2" placeholder="Religion" wire:model="religion">
                @error('religion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="home_add">Home Address: </label>
            <input type="text" id="home_add" name="home_add" required class="form-control pb-2" placeholder="Home Address" wire:model="home_add">
            @error('home_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="row">
            <div class="mb-3 form-group col">
                <label for="poscode">Poscode: </label>
                <input type="text" id="home_add" name="poscode" required class="form-control pb-2" placeholder="Poscode" wire:model="poscode">
                @error('poscode') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="district">District: </label>
                <input type="text" id="district" name="district" required class="form-control pb-2" placeholder="District" wire:model="district">
                @error('district') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="state">State: </label>
                <input type="text" id="state" name="state" required class="form-control pb-2" placeholder="State" wire:model="state" default="Sarawak">
                @error('state') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="country">Country: </label>
                <input type="text" id="home_add" name="home_add" required class="form-control pb-2" placeholder="Country" wire:model="country">
                @error('country') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>


        <div class='row'>
            <div class="mb-3 col form-group">
                <label for="time_to_sch">Time to reach School: </label>
                <select class="form-select" wire:model="time_to_sch" name="time_to_sch" id="time_to_sch">
                    <option value="">Select an option</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="45+">More than 45</option>
                </select>
            </div>

            <div class="mb-3 form-group col">
                <label for="home_lang">Home Language: </label>
                <input type="text" id="home_lang" name="home_lang" required class="form-control pb-2" placeholder="Home Language" wire:model="home_lang">
                @error('home_lang') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="mb-3 form-group col">
                <label for="home_tel">Home Telephone: </label>
                <input type="text" id="religion" name="home_tel" required class="form-control pb-2" placeholder="Home Telephone" wire:model="home_tel">
                @error('home_tel') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        
        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="prev_kindy">Previous Kindygarden/Play School:</label>
                <input type="text" id="prev_kindy" name="prev_kindy" class="form-control pb-2" placeholder="If Any" wire:model="prev_kindy">
                @error('prev_kindy') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="no_years">Number of Years:</label>
                <input type="text" id="no_years" name="no_years"  class="form-control pb-2" placeholder="No of Years" value="0" wire:model="no_years">
                @error('no_years') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <p>Why Rhema:</p>
              
                    <label class="form-check-label px-3" for="Reading">
                        <input type="checkbox" id="Reading" wire:model="reasons" value="Reading"/>
                        Reading
                    </label>
               
                    <label class="form-check-label px-3" for="SEL">
                        <input type="checkbox" id="SEL" wire:model="reasons" value="SEL"/>
                        SEL
                    </label>
         
                    <label class="form-check-label px-3" for="Play">
                        <input type="checkbox" id="Play"wire:model="reasons" value="Play"/>
                        Play
                    </label>
              
                   
                    <label class="form-check-label px-3" for="Cost">
                        <input type="checkbox" id="Cost" wire:model="reasons" value="Cost"/>
                        Cost
                    </label>
       
                    <label class="form-check-label px-3" for="Locality">
                        <input type="checkbox" id="Locality" wire:model="reasons" value="Locality"/>
                        Locality
                    </label>
      
                    <label class="form-check-label px-3" for="RSS">
                        <input type="checkbox" id="RSS"  wire:model="reasons" value="RSS"/>
                        RSS
                    </label>
           
            </div>

            <div class="mb-3 form-group col"> 
                <p>Preferred Primary School:</p>
          
                <label class="form-check-label px-3" for="Chung Hua">
                    <input type="checkbox" id="Chung Hua" wire:model="pref_pri_sch" value="Chung Hua"/>
                    Chung Hua
                </label>
           
                <label class="form-check-label px-3" for="Private">
                    <input type="checkbox" id="Private" wire:model="pref_pri_sch" value="Private"/>
                    Private
                </label>
     
                <label class="form-check-label px-3" for="National">
                    <input type="checkbox" id="National"wire:model="pref_pri_sch" value="National"/>
                    National
                </label>
          
               
                <label class="form-check-label px-3" for="Others">
                    <input type="checkbox" id="Others" wire:model="pref_pri_sch" value="Others"/>
                    Others
                </label>
   
                
              
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col form-group">
                <label for="referral">How did you hear about Tadika Rhema:</label>
                <select class="form-select" wire:model="referral" name="referral" id="referral">
                    <option value="">Select an option</option>
                    <option value="Family & Friends">Family & Friends</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Street Banner">Street Banner</option>
                    <option value="Family & Friends">Open Day</option>
                    <option value="Radio">Radio</option>
                    <option value="Emails">Emails</option>
                    <option value="Website">Website</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
                @if ($this->referral=="Other")
                <div class="mb-3 form-group col">
                    <label for="referral">Please List:</label>
                    <input type="text" id="referral_other" name="referral_other"  class="form-control pb-2"  wire:model="referral_other">
                    @error('referral_other') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                @else
                
                @endif
        </div>
   
        <div class ="search-box">
            <div class='row'>
                <div class="mb-3 form-group col">
                    <label for="father">Father: </label>
                    <input required type="text" id="father" name="father" wire:keyup="searchResult_Father" class="form-control" placeholder="Father's name" wire:model="father">
                    @if($showmodal_father)
                        <ul >
                            @if(!empty($parent_father))
                                @foreach($parent_father as $record_father)

                                    <li  wire:click="fetchFather({{ $record_father->parent_id }})" >{{ $record_father->name}}</li>

                                @endforeach
                            @endif
                        </ul>
                
                        
                    @elseif($createnew_father)
            
                            <button class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#parentsModal" >Add Parent</button>
                    
                    
                    @endif

                    @error('father') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            
                
                <div class="mb-3 form-group col">
                    <label for="mother">Mother: </label>
                    <input required type="text" id="mother" name="mother" wire:keyup="searchResult_Mother" class="form-control pb-2" placeholder="Mother's name" wire:model="mother">
        
                    @if($showmodal_mother)
                        <ul >
                            @if(!empty($parent_mother))
                                @foreach($parent_mother as $record_mother)

                                    <li  wire:click="fetchMother({{ $record_mother->parent_id }})" >{{ $record_mother->name}}</li>

                                @endforeach
                            @endif
                        </ul>
                
                        
                    @elseif($createnew_mother)
            
                            <button class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#parentsModal" >Add Parent</button>
                    
                    
                    @endif
                    @error('mother') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact 1 (other than parents): </label>
                <input type="text" id="e_contact" name="e_contact" required class="form-control pb-2" placeholder="Name" wire:model="e_contact">
                @error('e_contact') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact (other than parents): </label>
                <input required type="text" id="e_contact_hp" name="e_contact_hp" required class="form-control pb-2" placeholder="Emergency Contact Number" wire:model="e_contact_hp">
                @error('e_contact_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact2">Emergency Contact (other than parents): </label>
                <input type="text" id="e_contact2" name="e_contact2" required class="form-control pb-2" placeholder="Name" wire:model="e_contact2">
                @error('e_contact2') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact2_hp">Emergency Contact 2 (other than parents): </label>
                <input required type="text" id="e_contact2_hp" name="e_contact2_hp" required class="form-control pb-2" placeholder="Emergency Contact Number" wire:model="e_contact2_hp">
                @error('e_contact2_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="fam_doc">Family Doctor: </label>
                <input type="text" id="fam_doc" name="fam_doc"  class="form-control pb-2" placeholder="Family Doctor" wire:model="fam_doc">
                @error('fam_doc') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="fam_doc_hp">Family Doctor Tel: </label>
                <input type="text" id="fam_doc_hp" name="fam_doc_hp"  class="form-control pb-2" placeholder="Family Doctor Tel" wire:model="fam_doc_hp">
                @error('fam_doc_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
            <div class="mb-3 form-group col">
                <label for="allergies">Allergies: </label>
                <input type="text" id="allergies" name="allergies" class="form-control pb-2" placeholder="Allergies" wire:model="allergies">
                @error('allergies') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
        <div class="mb-3 form-group col">
            <label for="carplate">Car Plate and model (Use , to seperate multiple cars): </label>
            <input type="text" id="carplate" name="carplate"  class="form-control pb-2" placeholder="Carplate number followed by model" wire:model="carplate">
            @error('carplate') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3 form-group col ">
            <label for="others">Other information: </label>
            <input type="text" id="others" name="others"  class="form-control pb-2" placeholder="Other information" wire:model="others">
            @error('others') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        </div>
        <div class="mb-3 form-group">
            <label for="potential">Potential: </label>
            <input type="text" id="potential" name="potential"  class="form-control pb-2" placeholder="Name and birthdate" wire:model="potential">
            @error('potential') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        
        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="class">J1 Class: </label>
                <input type="text" id="j1_class" name="j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J2 Class: </label>
                <input type="text" id="j2_class" name="j2_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="j2_class">
                @error('j2_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J3 Class: </label>
                <input type="text" id="j3_class" name="j3_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J1: </label>
                <input type="text" id="aft_j1_class" name="aft_j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="aft_j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J2: </label>
                <input type="text" id="aft_j2_class" name="aft_j2_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="aft_j2_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J3: </label>
                <input type="text" id="aft_j3_class" name="j1_class"  class="form-control pb-2" value="Not Assigned" placeholder="Class" wire:model="aft_j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

        </div>

        <div class="mb-3 text-center form-group col">
            <div>
                <label class="" for="">Signature:</label>
                <br/>
                <div wire:ignore id="sig"></div>
                <br/>
                <div>
                    <button id="clear" class="btn btn-danger btn-sm">Resign</button>
                    <button id="done" class="btn btn-primary btn-sm">Done</button>
                   
                </div>
            </div>
        </div>
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="storeStudent()" class="btn btn-primary">Submit</button>
    </form>
   
</div>

    <!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="parentsModal" tabindex="-1" aria-labelledby="studentModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Create Parent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal()"></button>
            </div>
            <form >
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input required type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <p class='d-inline px-1'>Gender:</p>
                  
                            <div class="form-check form-check-inline mb-3">
                                
                                <label class="form-check-label">Male</label>
                                <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Male">
            
                            </div>
            
                            <div class="form-check form-check-inline  mb-3">
                                
                                <label class="form-check-label">Female</label>
                                <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Female">
                            </div>
                        
                    </div>
                    <div class="mb-3">
                        <label>IC number</label>
                        <input required type="text" wire:model="ic_no" class="form-control">
                        @error('ic_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Occupation</label>
                        <input required type="text" wire:model="occupation" class="form-control">
                        @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input required type="text" wire:model="company_name" class="form-control">
                        @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Address</label>
                        <input required type="text" wire:model="company_add" class="form-control">
                        @error('company_add') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input  type="email" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tel no</label>
                        <input required type="text" wire:model="tel" class="form-control">
                        @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                        data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent="storeParent()" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        $('#sig').signature('enable');
        e.preventDefault();
        sig.signature('clear');

    });
    $('#done').click(function(e) { 
        e.preventDefault();
        var x = $('#sig').signature('toDataURL');
        @this.signed = x;
        $('#sig').signature('disable');

    });

   
   
</script>