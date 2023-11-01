<div>
    <div >
   
    <button readonly wire:click="list_all()" class="btn btn-primary">Back</button><br>
    <form class=" p-4 mt-2 shadow-lg  bg-white border border-secondary rounded">
        <h2><u>Student Details</u></h2>   
      

        @csrf
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="entry_year">Year:</label>
                <input readonly type="number" id="entry_year" name="entry_year" required class="form-control"  wire:model="entry_year"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="type">Type:</label>
                <select disabled class="form-select" wire:model="type" name="type" id="type">
                    <option value="">Select an option</option>
                    <option value="Half Day">Half Day</option>
                    <option value="Full Day">Full Day</option>
                </select>
            </div>   

            <div class="mb-3 form-group col">
                <label for="enrolment_date">Enrolment Date:</label>
                <input  readonly type="date" id="enrolment_date" name="enrolment_date" required class="form-control"  wire:model="enrolment_date"> 
            </div>
        </div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="first_name">Full Name:</label>
                <input readonly type="text" id="first_name" name="first_name" required class="form-control" wire:model="first_name"> 
                @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col ">
                <label for="last_name">Last Name:</label>
                <input  readonly type="text" id="last_name" name="last_name" required class="form-control"  wire:model="last_name"> 
                @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col ">
                <label for="chinese_name">Chinese Name (if any):</label>
                <input type="text" id="chinese_name" name="chinese_name" required class="form-control" placeholder="Chinese Name (if any)" wire:model="chinese_name" readonly> 
                @error('chinese_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col ">
                <label for="relationship_w_child">Relationship With Child:</label>
                <input readonly type="text" id="relationship_w_child" name="relationship_w_child" required class="form-control"  wire:model="relationship_w_child"> 
                @error('relationship_w_child') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div >
            <p class='d-inline px-1'>Gender:</p>
      
                <div class="form-check  form-check-inline ">
                    
                    <label class="form-check-label pr-2">Male</label>
                    <input disabled  class="form-check-input" wire:model='gender' type="radio" name="gender" value="M">

                </div>

                <div class="form-check form-check-inline  ">
                    
                    <label class="form-check-label pr-2">Female</label>
                    <input disabled class="form-check-input" wire:model='gender' type="radio" name="gender" value="F">
                </div>
            
            </div>
       

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="dob" >Date of Birth:</label>
                <input readonly type="date" id="dob" name="dob" required class="form-control pb-2" wire:model="dob">
                @error('dob') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="birth_cert_no">Birth Cert No:</label>
                <input readonly type="text" id="birth_cert_no" name="birth_cert_no" required class="form-control pb-2"  wire:model="birth_cert_no">
                @error('birth_cert_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="birth_cert_no">MyKid No:</label>
                <input readonly type="text" id="mykid" name="mykid" required class="form-control pb-2"  wire:model="mykid">
                @error('mykid') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
        
            <div class="mb-3 form-group col">
                <label for="pos_in_family">Position in Family:</label>
                <input readonly type="text" id="pos_in_family" name="pos_in_family" required class="form-control pb-2"  wire:model="pos_in_family">
                @error('pos_in_family') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">
            <div class="mb-3 form-group col">
                <label for="race">Race:</label>
                <input readonly type="text" id="race" name="race" required class="form-control pb-2"wire:model="race">
                @error('race') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="nationality">Nationality:</label>
                <input readonly type="text" id="nationality" name="nationality" required class="form-control pb-2"  wire:model="nationality">
                @error('nationality') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="religion">Religion: </label>
                <input readonly type="text" id="religion" name="religion" required class="form-control pb-2"  wire:model="religion">
                @error('religion') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="home_add">Home Address: </label>
            <input readonly type="text" id="home_add" name="home_add" required class="form-control pb-2"  wire:model="home_add">
            @error('home_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="row">
            <div class="mb-3 form-group col">
                <label for="poscode">Poscode: </label>
                <input readonly type="text" id="home_add" name="poscode" required class="form-control pb-2" wire:model="poscode">
                @error('poscode') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="district">District: </label>
                <input readonly type="text" id="district" name="district" required class="form-control pb-2" wire:model="district">
                @error('district') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="state">State: </label>
                <input readonly type="text" id="state" name="state" required class="form-control pb-2"  wire:model="state" default="Sarawak">
                @error('state') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 form-group col">
                <label for="country">Country: </label>
                <input type="text" id="home_add" name="home_add" required class="form-control pb-2"  wire:model="country">
                @error('country') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>


        <div class='row'>
            <div class="mb-3 col form-group">
                <label for="time_to_sch">Time to reach School: </label>
                <select class="form-select" disabled wire:model="time_to_sch" name="time_to_sch" id="time_to_sch">
                    <option value="">Select an option</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="45+">More than 45</option>
                </select>
            </div>
            <div class="mb-3 form-group col">
                <label for="home_lang">Home Language: </label>
                <input readonly type="text" id="home_lang" name="home_lang" required class="form-control pb-2" wire:model="home_lang">
                @error('home_lang') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="mb-3 form-group col">
                <label for="home_tel">Home Telephone: </label>
                <input readonly type="text" id="religion" name="home_tel" required class="form-control pb-2"  wire:model="home_tel">
                @error('home_tel') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        
        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="prev_kindy">Previous Kindygarden/Play School:</label>
                <input readonly type="text" id="prev_kindy" name="prev_kindy" class="form-control pb-2"  wire:model="prev_kindy">
                @error('prev_kindy') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="no_years">Number of Years:</label>
                <input readonly type="text" id="no_years" name="no_years"  class="form-control pb-2"  value="0" wire:model="no_years">
                @error('no_years') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <p>Why Rhema:</p>
              
                    <label class="form-check-label px-3" for="Reading">
                        <input disabled type="checkbox" id="Reading" wire:model="reasons" value="Reading"/>
                        Reading
                    </label>
               
                    <label class="form-check-label px-3" for="SEL">
                        <input disabled type="checkbox" id="SEL" wire:model="reasons" value="SEL"/>
                        SEL
                    </label>
         
                    <label class="form-check-label px-3" for="Play">
                        <input disabled type="checkbox" id="Play"wire:model="reasons" value="Play"/>
                        Play
                    </label>
              
                   
                    <label class="form-check-label px-3" for="Cost">
                        <input disabled type="checkbox" id="Cost" wire:model="reasons" value="Cost"/>
                        Cost
                    </label>
       
                    <label class="form-check-label px-3" for="Locality">
                        <input disabled type="checkbox" id="Locality" wire:model="reasons" value="Locality"/>
                        Locality
                    </label>
      
                    <label class="form-check-label px-3" for="RSS">
                        <input disabled type="checkbox" id="RSS"  wire:model="reasons" value="RSS"/>
                        RSS
                    </label>
           
            </div>

            <div class="mb-3 form-group col"> 
                <p>Preferred Primary School:</p>
          
                <label class="form-check-label px-3" for="Chung Hua">
                    <input disabled type="checkbox" id="Chung Hua" wire:model="pref_pri_sch" value="Chung Hua"/>
                    Chung Hua
                </label>
           
                <label class="form-check-label px-3" for="Private">
                    <input disabled type="checkbox" id="Private" wire:model="pref_pri_sch" value="Private"/>
                    Private
                </label>
     
                <label class="form-check-label px-3" for="National">
                    <input disabled type="checkbox" id="National"wire:model="pref_pri_sch" value="National"/>
                    National
                </label>
          
               
                <label class="form-check-label px-3" for="Others">
                    <input disabled type="checkbox" id="Others" wire:model="pref_pri_sch" value="Others"/>
                    Others
                </label>
   
                
              
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="referral">How did you hear about Tadika Rhema:</label>
            <input readonly type="text" id="referral" name="referral" class="form-control pb-2"  wire:model="referral">
        </div>

        

        <div class ="search-box">
            <div class='row'>
                <div class="mb-3 form-group col">
                    <label for="father">Father: </label>
                    <input readonly required type="text" id="father" name="father" wire:keyup="searchResult_Father" class="form-control"  wire:model="father">
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
                    <input readonly required type="text" id="mother" name="mother" wire:keyup="searchResult_Mother" class="form-control pb-2" placeholder="Mother's name" wire:model="mother">
        
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
                <input  readonly type="text" id="e_contact" name="e_contact" required class="form-control pb-2"  wire:model="e_contact">
                @error('e_contact') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact (other than parents): </label>
                <input  readonly required type="text" id="e_contact_hp" name="e_contact_hp" required class="form-control pb-2"  wire:model="e_contact_hp">
                @error('e_contact_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact2">Emergency Contact (other than parents): </label>
                <input readonly type="text" id="e_contact2" name="e_contact2" required class="form-control pb-2"  wire:model="e_contact2">
                @error('e_contact2') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact2_hp">Emergency Contact 2 (other than parents): </label>
                <input readonly required type="text" id="e_contact2_hp" name="e_contact2_hp" required class="form-control pb-2"  wire:model="e_contact2_hp">
                @error('e_contact2_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="fam_doc">Family Doctor: </label>
                <input readonly type="text" id="fam_doc" name="fam_doc"  class="form-control pb-2"  wire:model="fam_doc">
                @error('fam_doc') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="fam_doc_hp">Family Doctor Tel: </label>
                <input readonly type="text" id="fam_doc_hp" name="fam_doc_hp"  class="form-control pb-2"  wire:model="fam_doc_hp">
                @error('fam_doc_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
            <div class="mb-3 form-group col">
                <label for="allergies">Allergies: </label>
                <input readonly type="text" id="allergies" name="allergies" class="form-control pb-2"  wire:model="allergies">
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
                <input readonly type="text" id="j1_class" name="j1_class"  class="form-control pb-2" value="Not Assigned"  wire:model="j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J2 Class: </label>
                <input readonly type="text" id="j2_class" name="j2_class"  class="form-control pb-2" value="Not Assigned"  wire:model="j2_class">
                @error('j2_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">J3 Class: </label>
                <input readonly type="text" id="j3_class" name="j3_class"  class="form-control pb-2" value="Not Assigned" wire:model="j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class='row'>
            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J1: </label>
                <input readonly type="text" id="aft_j1_class" name="aft_j1_class"  class="form-control pb-2" value="Not Assigned"  wire:model="aft_j1_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J2: </label>
                <input readonly type="text" id="aft_j2_class" name="aft_j2_class"  class="form-control pb-2" value="Not Assigned" wire:model="aft_j2_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="class">Afternoon Class J3: </label>
                <input readonly type="text" id="aft_j3_class" name="j1_class"  class="form-control pb-2" value="Not Assigned"  wire:model="aft_j3_class">
                @error('j1_class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        
    </form>
</div>
 
    </div>
</div>

