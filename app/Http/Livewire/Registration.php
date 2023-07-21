<?php

namespace App\Http\Livewire;

use App\Models\Enrol;
use App\Models\Parents;
use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;

class Registration extends Component
{
    protected $paginationTheme ='bootstrap';
    public $mode = 'view';
    public $search ='';
    public $class,$entry_year,$type,$first_name,$last_name,$gender,$dob,$birth_cert_no,$pos_in_family,$race,$nationality;
    public $prev_kindy,$no_years,$religion,$home_add,$home_lang,$home_tel,$e_contact,$e_contact_hp,$fam_doc,$allergies;
    public $others,$potential,$father,$mother, $enrolment_date, $referral,$relationship_w_child,$time_to_sch,$carplate,$signed;
    public $reasons =[];
    public $pref_pri_sch=[];
    public $consent_ic, $consent_name;
    public $poscode, $state, $country,$district,$e_contact2,$e_contact2_hp,$fam_doc_hp,$mykid;
    public $parent_father,$parent_mother, $referral_other,$status;
    public $father_name, $father_gender, $father_ic, $father_occupation, $father_co_name, $father_co_add, $father_email,$father_tel;
    public $mother_name, $mother_gender, $mother_ic, $mother_occupation, $mother_co_name, $mother_co_add, $mother_email,$mother_tel;
 
    public function render()
    {
        return view('livewire.registration')->layout('livewire.registration_dashboard');
    }
    public function storeStudent() {  
       

        if(Parents::where('name',($this->father_name))->get()->first() == Null ){
            Parents::create([
                'name' => $this->father_name,
                'ic_no' => $this->father_ic,
                'gender'=>$this->father_gender,
                'occupation' => $this->father_occupation,
                'company_add' => $this->father_co_add,
                'company_name' => $this->father_co_name,
                'email' => $this->father_email,
                'tel' => $this->father_tel
            ]);
            
        }

        if(Parents::where('name',($this->mother_name))->get()->first() == Null ){
            Parents::create([
                'name' => $this->mother_name,
                'ic_no' => $this->mother_ic,
                'gender'=>$this->mother_gender,
                'occupation' => $this->mother_occupation,
                'company_add' => $this->mother_co_add,
                'company_name' => $this->mother_co_name,
                'email' => $this->mother_email,
                'tel' => $this->mother_tel
            ]);

        }
       
        $father_id = Parents::where('name',($this->father_name))->get('parent_id')->first();
        $mother_id = Parents::where('name',($this->mother_name))->get('parent_id')->first();
        
         if($father_id==NULL){
         $father_id = Parents::where('parent_id',1)->get('parent_id')->first();
  
         }
         if($mother_id==NULL){
         $mother_id = Parents::where('parent_id',1)->get('parent_id')->first();
         }
        if($this->no_years==""){
         $this->no_years=0;  
        }
 
        $referral_final=$this->referral;
        
        if ($this->referral=='Other'){
             $referral_final=$this->referral." -- ".$this->referral_other;
        }
 
        $fullname = $this->first_name." ".$this->last_name;

         Enrol::create([
             'status'=>'active',
             'carplate'=>$this->carplate,
             'fullname' => $fullname,
             'entry_year'=> $this->entry_year,
             'enrolment_date'=>$this->enrolment_date,
             'referral'=>$referral_final,
             'reasons'=>implode(", ",$this->reasons),
             'pref_pri_sch'=>implode(", ",$this->pref_pri_sch),
             'type'=> $this->type,
             'first_name'=>trim($this->first_name),
             'last_name'=>trim($this->last_name),
             'gender'=> $this->gender,
             'dob'=> $this->dob,
             'birth_cert_no'=> trim($this->birth_cert_no),
             'mykid'=>trim($this->mykid),
             'pos_in_family'=> $this->pos_in_family,
             'race'=> trim($this->race),
             'nationality'=> trim($this->nationality),
             'prev_kindy' => trim($this->prev_kindy),
             'no_years' => trim($this->no_years),
             'religion'=> trim($this->religion),
             'home_add'=> trim($this->home_add),
             'poscode'=>trim($this->poscode),
             'state' => trim($this->state),
             'country'=>trim($this->country),
             'district'=>trim($this->district),
             'home_lang'=> trim($this->home_lang),
             'home_tel'=> trim($this->home_tel),
             'e_contact'=> trim($this->e_contact),
             'e_contact_hp'=>trim( $this->e_contact_hp),
             'e_contact2'=> trim($this->e_contact2),
             'e_contact2_hp'=> trim($this->e_contact2_hp),
             'fam_doc'=> trim($this->fam_doc),
             'fam_doc_hp'=> trim($this->fam_doc_hp),
             'allergies'=> trim($this->allergies),
             'others'=> trim($this->  others),
             'potential'=> trim($this->potential),
             'father'=> $father_id->parent_id,
             'mother'=> $mother_id->parent_id,
             'time_to_sch'=>$this->time_to_sch
         ]);
 
         $student_id=Student::where('birth_cert_no',$this->birth_cert_no)->get('student_id')->first();
         Relationship::create([
             'student' => $student_id->student_id,
             'father' => $father_id->parent_id,
             'mother' => $mother_id->parent_id
         ]);
 
         if($this->signed!=""){
         $folderPath = public_path('upload/');
        
         $image_parts = explode(";base64,", $this->signed);
              
         $image_type_aux = explode("image/", $image_parts[0]);
            
         $image_type = $image_type_aux[1];
         
         $image_base64 = base64_decode($image_parts[1]);
  
         $signature = $fullname . '.'.$image_type;
            
         $file = $folderPath . $signature;
  
         file_put_contents($file, $image_base64);
 
         }
         
        $this->resetInputFields();
        $this->resetInputFields_Parents();
  
        
     }
     public function searchResult_Father(){

        if(!empty($this->father)){
            
            $this->parent_father = Parents::select('*')
                      ->where('name','like','%'.$this->father.'%')
                      ->limit(5)
                      ->get();

            
            if(count($this->parent_father)==0){
                $this->showmodal_father = false;
                $this->createnew_father = true;
           
                
            }else{
                $this->showmodal_father = true;
            }
        }else{
            $this->showmodal_father = false;
            $this->createnew_father = false;
        }
      
    }

    public function searchResult_Mother(){
    
        if(!empty($this->mother)){
            
            $this->parent_mother = Parents::select('*')
                      ->where('name','like','%'.$this->mother.'%')
                      ->limit(5)
                      ->get();

            if(count($this->parent_mother)==0){
                $this->showmodal_mother = false;
                $this->createnew_mother = true;
       
            }else{
                $this->showmodal_mother = true;
            }
        }else{
            
            $this->showmodal_mother = false;
            $this->createnew_mother = false;
        }
        
    }

    public function fetchFather($id = 0){

        $record_father = Parents::select('*')
                    ->where('parent_id',$id)
                    ->first();

        $this->father = $record_father->name;
        
        $this->showmodal_father = false;
        $this->createnew_father = false;
    }

    public function fetchMother($id = 0){

        $record_mother = Parents::select('*')
                    ->where('parent_id',$id)
                    ->first();

        $this->mother = $record_mother->name;
        
        $this->showmodal_mother = false;
        $this->createnew_mother = false;
    }

    public function storeParent()
    { 
        Parents::create([
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'occupation' => $this->occupation,
            'gender' => $this->gender,
            'company_name' => $this->company_name,
            'company_add' => $this->company_add,
            'email' => $this->email,
            'tel' => $this->tel
        ]);
        
        session()->flash('message', 'Parent added Successfully.');
  
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->carplate='';
        $this->student_id='';
        $this->enrolment_date='';
        $this->entry_year='';
        $this->type='';
        $this->first_name='';
        $this->last_name='';
        $this->relationship_w_child='';
        $this->gender='';
        $this->dob='';
        $this->birth_cert_no='';
        $this->mykid='';
        $this->pos_in_family='';
        $this->race='';
        $this-> nationality='';
        $this->prev_kindy='';
        $this->no_years='';
        $this->religion='';
        $this->home_add='';
        $this->poscode='';
        $this->state='';
        $this->district='';
        $this->country='';
        $this->home_lang='';
        $this->home_tel='';
        $this->e_contact='';
        $this->e_contact_hp='';
        $this->e_contact2='';
        $this->e_contact2_hp='';
        $this->fam_doc='';
        $this->fam_doc_hp='';
        $this-> allergies='';
        $this->others='';
        $this->potential='';
        $this->reasons=[];
        $this->pref_pri_sch=[];
        $this->referral='';
        $this-> father='';
        $this->mother='';
   
        $this->time_to_sch='';
        $this->referral_other='';
        $this->status='';
        $this->signed='';
 
        
    }
    private function resetInputFields_Parents(){
        $this->father_name = '';
        $this->father_ic= '';
        $this->father_occupation= '';
        $this->father_co_name= '';
        $this->father_co_add= '';
        $this->father_email= '';
        $this->father_tel= '';
        $this->father_gender='';
        $this->mother_name = '';
        $this->mother_ic= '';
        $this->mother_occupation= '';
        $this->mother_co_add= '';
        $this->mother_co_name= '';
        $this->mother_email= '';
        $this->mother_tel= '';
   
    }
}
