<div class='container'>
    <form class="form-inline p-4 shadow-lg  bg-white border border-secondary rounded" >

        <h2>Registration</h2>
       
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
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required class="form-control" placeholder="First Name" wire:model="first_name"> 
                @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col ">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required class="form-control" placeholder="Last Name" wire:model="last_name"> 
                @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col ">
                <label for="chinese_name">Chinese Name (if any):</label>
                <input type="text" id="chinese_name" name="chinese_name" required class="form-control" placeholder="Chinese Name (if any)" wire:model="chinese_name"    > 
                @error('chinese_name') <span class="text-danger">{{ $message }}</span>@enderror
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
       
        <div class ="search-box">
        <div class='row'>
            
            <div class="mb-3 form-group col">
                <h2 class="mt-3">Father's Detail</h2>
                <div class="mb-3">
                    <label for="father_name">Full Name</label>
                    <input required type="text" wire:model="father_name" class="form-control" placeholder="Name as per IC">
                    @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <p class='d-inline px-1'>Gender:</p>                  
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">Male</label>
                        <input  class="form-check-input" wire:model='father_gender' type="radio" name="father_gender" value="Male">    
                    </div>
                    <div class="form-check form-check-inline ">
                        <label class="form-check-label">Female</label>
                        <input  class="form-check-input" wire:model='father_gender' type="radio" name="father_gender" value="Female">
                    </div>  
                </div>
                <div class="mb-3">
                    <label for="father_ic">IC number</label>
                    <input required type="text" wire:model="father_ic" class="form-control" placeholder="NRIC number">
                    @error('father_ic') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="father_occupation">Occupation</label>
                    <input required type="text" wire:model="father_occupation" class="form-control" placeholder="Occupation">
                    @error('father_occupation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="father_co_name">Company Name</label>
                    <input required type="text" wire:model="father_co_name" class="form-control" placeholder="Company Name">
                    @error('father_co_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="father_co_add">Company Address</label>
                    <input required type="text" wire:model="father_co_add" class="form-control" placeholder="Company Address">
                    @error('father_co_add') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="father_email">Email</label>
                    <input  type="email" wire:model="father_email" class="form-control" placeholder="Email">
                    @error('father_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="father_tel">Contact No.</label>
                    <input required type="text" wire:model="father_tel" class="form-control" placeholder="Contact No.">
                    @error('father_tel') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="mb-3 form-group col">
                <h2 class="mt-3">Mother's Details</h2>
                <div class="mb-3">
                    <label for="father_name">Full Name</label>
                    <input required type="text" wire:model="mother_name" class="form-control" placeholder="Name as per IC">
                    @error('mother_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <p class='d-inline px-1'>Gender:</p>                  
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">Male</label>
                        <input  class="form-check-input" wire:model='mother_gender' type="radio" name="mother_gender" value="Male">    
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">Female</label>
                        <input  class="form-check-input" wire:model='mother_gender' type="radio" name="mother_gender" value="Female">
                    </div>  
                </div>
                <div class="mb-3">
                    <label for="mother_ic">IC number</label>
                    <input required type="text" wire:model="mother_ic" class="form-control" placeholder="NRIC number">
                    @error('mother_ic') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mother_occupation">Occupation</label>
                    <input required type="text" wire:model="mother_occupation" class="form-control" placeholder="Occupation">
                    @error('mother_occupation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mother_co_name">Company Name</label>
                    <input required type="text" wire:model="mother_co_name" class="form-control" placeholder="Company Name">
                    @error('mother_co_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mother_co_add">Company Address</label>
                    <input required type="text" wire:model="mother_co_add" class="form-control" placeholder="Company Address">
                    @error('mother_co_add') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mother_email">Email</label>
                    <input  type="email" wire:model="mother_email" class="form-control" placeholder="Email">
                    @error('mother_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mother_tel">Contact No.</label>
                    <input required type="text" wire:model="mother_tel" class="form-control" placeholder="Contact No.">
                    @error('mother_tel') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <hr>
        <h2>Emergency Contact</h2>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact: </label>
                <input type="text" id="e_contact" name="e_contact" required class="form-control pb-2" placeholder="Name" wire:model="e_contact">
                @error('e_contact') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact">Emergency Contact Hp No. : </label>
                <input required type="text" id="e_contact_hp" name="e_contact_hp" required class="form-control pb-2" placeholder="Emergency Contact Number" wire:model="e_contact_hp">
                @error('e_contact_hp') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="e_contact2">Emergency Contact: </label>
                <input type="text" id="e_contact2" name="e_contact2" required class="form-control pb-2" placeholder="Name" wire:model="e_contact2">
                @error('e_contact2') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="e_contact2_hp">Emergency Contact Hp No.: </label>
                <input required type="text" id="e_contact2_hp" name="e_contact2_hp" required class="form-control pb-2" placeholder="Emergency Contact Number" wire:model="e_contact2_hp">
                @error('e_contact2_hp') <span class="text-danger">{{ $message }}</span>@enderror
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

        <div class="list-group">
                  
            <div class="d-flex w-100 justify-content-between">
              <h3 class="mb-3 mt-3">Payment Guidelines</h3>
           
            </div>
            <p class="list-group-item">1. Confirmation of registration is subject to payment of commitment deposit.</p>
            <p class="list-group-item">2. All fees are to be paid either by: 
                <br>- <span class="fw-bold">crossed cheque </span>made payable to <span class="fw-bold">Tadika Rhema Sdn Bhd.</span>
                <br>- banked into the school account <span class="fw-bold">(21114600031136 - RHB) </span> and the bank-in receipt given to the office.
                <br>- online transfer (successful transfer advice e-mail to <span class="fw-bold">tadikarhema@gmail.com.</span>)
            </p>
            <p class="list-group-item">3. The commitment deposit is refundable upon fulfillment on the following terms:
                <br> a. Your child must have completed <span class="fw-bold">as least one full school term</span>.
                <br><span class="fw-bold"> One month's written notice </span> is given before the end of the child's final term with the school.
            </p>
            <p class="list-group-item">4. Where payment is not made by thr relevant due date, a <span class="fw-bold">"FIVE PERCENT (5%) LATE PAYMENT ADMINSTRATIVE FEE"</span> will be levied, unless prior arrangement (a written letter) has been made with the school.</p>
            <p class="list-group-item">5. Any student who has not paid his / her full fees plus late payment fee, 2 weeks after the due date, will not be allowed to attend classes or any other school activities until the outstanding amount is settled in full.</p>
            <p class="list-group-item">6. Any student who has not paid his/ her full fees plus late payment fee, one month after the due date, the shcool reserves the right to terminate the student's enrolment.</p>
            <p class="list-group-item">7. Fees are subject to changes at the discretion of the Management</p>
            <p class="list-group-item">8. <span class="fw-bold"> Copyright of images recorded at Tadika Rhema</span>
            <br>The Management of Tadika Rhema Sdn Bhd claims and reserves all rights of all images taken or created of your child while they are registered students of Tadika Rhema Sdn Bhd together with all the images of the child and family members (hereinafter collectively
            reffered to as "images") and reservers the absolute right to use and publish these images in whatever form including but not limited to photographic, video and electronic images without the need to seek yout permission and without disclosing the names and identities
            of those images and the creator of those images unless prior written request is made to the Management of Tadika Rhema Sdn Bhd which the Management reserves the right to consider without any obligation to agree. 
            </p>
            <p class="list-group-item">9. <span class="fw-bold"> Personal Data Protection Statement</span>
            <br>Your personal information collected is processed, retained and used by Tadika Rhema Sdn Bhd in accordance with the Malaysian Personal Data Protection Act 2010. Your personal information may be used for all purposes in relation to your enrolment of you child in
            Tadika Rhema Sdn Bhd, and to meet statutory obligations, and for registration of public events such as art competitions. Tadika Rhema Sdn Bhd may also retain and continue to process your personal data for all intents and purposes unless you request in writing
            to withdraw your consent
            </p>
          
  
        </div>
        
            <div class="mb-3 form-group col">
                <p>I, 
                    <select class="form control" data-width="100px" wire:model="consent_name" name="consent_name" id="consent_name">
                        <option value="{{$this->father_name}}">{{$this->father_name}}</option>
                        <option value="{{$this->mother_name}}">{{$this->mother_name}}</option>
                    </select> 
                    (I.C No.   <select class="form control" data-width="100px" wire:model="consent_ic" name="consent_ic" id="consent_ic">
                        <option value="{{$this->father_ic}}">{{$this->father_ic}}</option>
                        <option value="{{$this->mother_ic}}">{{$this->mother_ic}}</option>
                    </select>), hereby agree to accept the above guidelines. I also agree to provide my personal data as mentioned in the Statement above.</p>
            </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <p>Name: {{ $this->consent_name }}
                <br>
                Child's Name: {{$this->first_name}} {{$this->last_name}}
                <br>
                Date: {{date("Y/m/d")}}</p>
            </div>
                <div class="mb-3 form-group col">
                    <p for="">Signature:</p>
      
                    <div wire:ignore id="sig"></div>
                    <br/>
                    <div class="text-center">
                        <button id="clear" class="btn btn-danger btn-sm mt-3">Resign</button>
                        <button id="done" class="btn btn-primary btn-sm mt-3">Done</button>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        <button wire:click="list_all()" class="btn btn-danger btn-lg">Cancel</button>
        <button wire:click.prevent="storeStudent()" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
   
</div>
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<script>
    
    var sig = $('#sig').signature({syncFormat: 'PNG'});
    $('#sig').draggable();
    $('#clear').click(function(e) {
        $('#sig').signature('enable');
        e.preventDefault();
        sig.signature('clear');
        @this.signature = '';

    });
    $('#done').click(function(e) { 
        e.preventDefault();
        var x = $('#sig').signature('toDataURL');
        @this.signature = x;
        $('#sig').signature('disable');

    });

    if(@this.signature=''){
        sig.signature('clear');
    }
   
</script>