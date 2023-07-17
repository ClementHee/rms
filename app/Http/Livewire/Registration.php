<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registration extends Component
{
    protected $paginationTheme ='bootstrap';
    public $mode = 'view';
    public $search ='';
    public $class,$entry_year,$type,$first_name,$last_name,$gender,$dob,$birth_cert_no,$pos_in_family,$race,$nationality;
    public $prev_kindy,$no_years,$religion,$home_add,$home_lang,$home_tel,$e_contact,$e_contact_hp,$fam_doc,$allergies;
    public $others,$potential,$father,$mother, $enrolment_date, $referral,$relationship_w_child,$time_to_sch,$carplate,$signed;
    public array $reasons, $pref_pri_sch;
    public $j1_class,$j2_class,$j3_class,$aft_j1_class,$aft_j2_class,$aft_j3_class, $poscode, $state, $country,$district,$e_contact2,$e_contact2_hp,$fam_doc_hp,$mykid;
    public $parent_father,$parent_mother, $referral_other,$status;
    public $showmodal_father=false;
    public $showmodal_mother=false;
    public $createnew_father=false;
    public $createnew_mother= false;
    public function render()
    {
        return view('livewire.registration')->layout('livewire.registration_dashboard');
    }
    public function storeStudent() {  
       
        $father_id = Parents::where('name',($this->father))->get('parent_id')->first();
        $mother_id = Parents::where('name',($this->mother))->get('parent_id')->first();
        
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
   
 
 
       
 
         Student::create([
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
             'j1_class'=>trim(ucwords(strtolower($this->j1_class))),
             'j2_class'=>trim(ucwords(strtolower($this->j2_class))),
             'j3_class'=>trim(ucwords(strtolower($this->j3_class))),
             'aft_j1_class'=>trim(ucwords(strtolower($this->aft_j1_class))),
             'aft_j2_class'=>trim(ucwords(strtolower($this->aft_j2_class))),
             'aft_j3_class'=>trim(ucwords(strtolower($this->aft_j3_class))),
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
}
