<?php

namespace App\Http\Livewire;

use App\Models\Parents;
use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Students extends Component
{   
    use WithPagination;
    protected $paginationTheme ='bootstrap';
    public $mode = 'view';
    public $search ='';
    public $class,$entry_year,$type,$first_name,$last_name,$gender,$dob,$birth_cert_no,$pos_in_family,$race,$nationality;
    public $prev_kindy,$no_years,$religion,$home_add,$home_lang,$home_tel,$e_contact,$e_contact_hp,$fam_doc,$allergies;
    public $others,$potential,$father,$mother, $enrolment_date, $referral,$relationship_w_child,$time_to_sch,$carplate,$signed;
    public array $reasons, $pref_pri_sch;
    public $j1_class,$j2_class,$j3_class,$aft_j1_class,$aft_j2_class,$aft_j3_class, $poscode, $state, $country,$district,$e_contact2,$e_contact2_hp,$fam_doc_hp,$mykid;
    public $parent_father,$parent_mother, $referral_other,$status,$chinese_name;
    public $showmodal_father=false;
    public $showmodal_mother=false;
    public $createnew_father=false;
    public $createnew_mother= false;

 
    public function render()
    {
        $students = Student::where('fullname', 'like', '%'.$this->search.'%')->orderBy('fullname','ASC')->paginate(10);      
        return view('livewire.student.students', ['students' => $students])->layout('livewire.student_dashboard');
    }

   public function updatingSearch()
   {
       $this->resetPage();
   }    
    public function create_new(){
        
        $this->mode = 'create';
        $this->resetInputFields();
    }

    public function list_all(){
        $this->mode = 'view';
    }

    public function view_only(){
        $this->mode = 'single';
    }

    public function cancel()
    {
        $this->mode = 'view';
        $this->resetInputFields();
    }
    public function clearSignature()
    {
        $this->signed = null;
    }
   
    public function storeSignature(){
       
        
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

   
        Student::create([
            'fullname' =>$this->first_name." ".$this->last_name,
            'status'=>'active',
            'chinese_name'=>$this->chinese_name,
            'carplate'=>$this->carplate,
            
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
            'aft_j1_class'=>trim(strtoupper($this->aft_j1_class)),
            'aft_j2_class'=>trim(strtoupper($this->aft_j2_class)),
            'aft_j3_class'=>trim(strtoupper($this->aft_j3_class)),
            'time_to_sch'=>$this->time_to_sch

        ]);

        $student_id=Student::where('birth_cert_no',$this->birth_cert_no)->get('student_id')->first();
        Relationship::create([
            'student' => $student_id->student_id,
            'father' => $father_id->parent_id,
            'mother' => $mother_id->parent_id
        ]);

 
        $this->resetInputFields();
        $this->mode = 'view';
        
    }



    public function viewStudent($id)
    {
        $students = Student::findOrFail($id);

        $father_name = Parents::where('parent_id',($students->father))->get('name')->first();
        $mother_name = Parents::where('parent_id',($students->mother))->get('name')->first();
        $this->status=$students->status;
        $this->chinese_name=$students->chinese_name;
        $this->carplate=$students->carplate;
        $this->student_id=$id;
        $this->enrolment_date=$students->enrolment_date;
        $this->entry_year=$students->entry_year;
        $this->type=$students->type;
        $this->first_name=$students->first_name;
        $this->last_name=$students->last_name;
        $this->relationship_w_child=$students->relationship_w_child;
        $this->gender=$students->gender;
        $this->dob=$students->dob;
        $this-> birth_cert_no=$students->birth_cert_no;
        $this->mykid=$students->mykid;
        $this->pos_in_family=$students->pos_in_family;
        $this->race=$students->race;
        $this-> nationality=$students->nationality;
        $this->prev_kindy=$students->prev_kindy;
        $this->no_years=$students->no_years;
        $this->religion=$students->religion;
        $this->home_add=$students->home_add;
        $this->poscode=$students->poscode;
        $this->state=$students->state;
        $this->country=$students->country;
        $this->country=$students->district;
        $this->home_lang=$students->home_lang;
        $this->home_tel=$students->home_tel;
        $this->e_contact=$students->e_contact;
        $this->e_contact_hp=$students->e_contact_hp;
        $this->e_contact2=$students->e_contact2;
        $this->e_contact2_hp=$students->e_contact2_hp;
        $this->fam_doc=$students->fam_doc;
        $this->fam_doc_hp=$students->fam_doc_hp;
        $this-> allergies=$students->allergies;
        $this->others=$students->others;
        $this->potential=$students->potential;
        $this->reasons=explode(", ",$students->reasons);
        $this->pref_pri_sch=explode(", ",$students->pref_pri_sch);
        $this->referral=$students->referral;
        $this-> father=$father_name->name;
        $this->mother=$mother_name->name;
        $this->j1_class=$students->j1_class;
        $this->j2_class=$students->j2_class;
        $this->j3_class=$students->j3_class;
        $this->aft_j1_class=$students->aft_j1_class;
        $this->aft_j2_class=$students->aft_j2_class;
        $this->aft_j3_class=$students->aft_j3_class;
        $this->time_to_sch=$students->time_to_sch;
 
        
        $this->mode = 'single';
    }

    public function editStudent($id)
    {   

        $students = Student::findOrFail($id);
        $father_name = Parents::where('parent_id',($students->father))->get('name')->first();
        $mother_name = Parents::where('parent_id',($students->mother))->get('name')->first();
        
        
        if(substr($students->referral,0,5)=="Other"){
            $referral_final = explode(" -- ",$students->referral);
            
            $this->referral=$referral_final[0];
            $this->referral_other=$referral_final[1];
            
        }else{
            $this->referral = $students->referral;
            $this->referral_other = "";
        }
        
        $this->chinese_name=$students->chinese_name;
        $this->status=$students->status;
        $this->student_id=$id;
        $this->carplate=$students->carplate;
        $this->enrolment_date=$students->enrolment_date;
        $this->entry_year=$students->entry_year;
        $this->type=$students->type;
        $this->first_name=$students->first_name;
        $this->last_name=$students->last_name;
        $this->relationship_w_child=$students->relationship_w_child;
        $this->gender=$students->gender;
        $this->dob=$students->dob;
        $this-> birth_cert_no=$students->birth_cert_no;
        $this->mykid=$students->mykid;
        $this->pos_in_family=$students->pos_in_family;
        $this->race=$students->race;
        $this-> nationality=$students->nationality;
        $this->prev_kindy=$students->prev_kindy;
        $this->no_years=$students->no_years;
        $this->religion=$students->religion;
        $this->home_add=$students->home_add;
        $this->poscode=$students->poscode;
        $this->state=$students->state;
        $this->country=$students->country;
        $this->country=$students->district;
        $this->home_lang=$students->home_lang;
        $this->home_tel=$students->home_tel;
        $this->e_contact=$students->e_contact;
        $this->e_contact_hp=$students->e_contact_hp;
        $this->e_contact2=$students->e_contact2;
        $this->e_contact2_hp=$students->e_contact2_hp;
        $this->fam_doc=$students->fam_doc;
        $this->fam_doc_hp=$students->fam_doc_hp;
        $this-> allergies=$students->allergies;
        $this->others=$students->others;
        $this->potential=$students->potential;
        $this->reasons=explode(", ",$students->reasons);
        $this->pref_pri_sch=explode(", ",$students->pref_pri_sch);
        $this->father=$father_name->name;
        $this->mother=$mother_name->name;
        $this->j1_class=$students->j1_class;
        $this->j2_class=$students->j2_class;
        $this->j3_class=$students->j3_class;
        $this->aft_j1_class=$students->aft_j1_class;
        $this->aft_j2_class=$students->aft_j2_class;
        $this->aft_j3_class=$students->aft_j3_class;
        $this->time_to_sch=$students->time_to_sch;
        $this->signed=$students->signed;
 
        $this->mode = 'update';
        
    }

    public function updateStudent()
    {
        $father_id = Parents::where('name',($this->father))->get('parent_id')->first();
        $mother_id = Parents::where('name',($this->mother))->get('parent_id')->first();
        if($father_id==NULL){
            $father_id = Parents::where('parent_id',1)->get('parent_id')->first();
        }

        if($mother_id==NULL){
            $mother_id = Parents::where('parent_id',1)->get('parent_id')->first();
        }
        
        $editing_student = Student::find($this->student_id);
        $referral_final=$this->referral;
       
        if ($this->referral=='Other'){
             $referral_final=$this->referral." -- ".$this->referral_other;
        }
    
        $editing_student->update([
            'chinese_name'=>$this->chinese_name,
            'status'=>$this->status,
            'fullname' => $this->first_name." ".$this->last_name,
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
            'aft_j1_class'=>trim(strtoupper($this->aft_j1_class)),
            'aft_j2_class'=>trim(strtoupper($this->aft_j2_class)),
            'aft_j3_class'=>trim(strtoupper($this->aft_j3_class)),
            'time_to_sch'=>$this->time_to_sch,
            'carplate'=>$this->carplate,
            'signed'=>$this->signed
        ]);


        $this->mode = 'view';
  
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();

    }

    public function deleteStudent($id)
    {
        Student::find($id)->delete();
        session()->flash('danger', 'Student Record Deleted Successfully.');
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

    private function resetInputFields(){
        $this->chinese_name = '';
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
        $this->j1_class='';
        $this->j2_class='';
        $this->j3_class='';
        $this->aft_j1_class='';
        $this->aft_j2_class='';
        $this->aft_j3_class='';
        $this->time_to_sch='';
        $this->referral_other='';
        $this->status='';
        $this->signed='';
 
        
    }


    public $name, $ic_no, $occupation, $company_name, $company_add, $email, $tel;
    
    private function resetInputFields_Parents(){
        $this->name = '';
        $this->ic_no= '';
        $this->occupation= '';
        $this->company_name= '';
        $this->company_add= '';
        $this->email= '';
        $this->tel= '';
        $this->gender='';
   
    }

    public function storeParent()
    { 
        Parents::create([
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'occupation' => $this->occupation,
            'company_add' => $this->company_add,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'tel' => $this->tel
        ]);
        
        session()->flash('message', 'Parent added Successfully.');
  
        
        
        $showmodal_father=false;
        $showmodal_mother=false;
        $createnew_father=false;
        $createnew_mother= false;
        
        $this->resetInputFields_Parents();
        $this->dispatchBrowserEvent('close-modal');
        
    }

    public function redirectParent($name){
        
        $parent_id = Parents::where('name',$name)->get('parent_id')->first();
     
    }

    public function closeModal(){
        $this->resetInputFields_Parents();
        $showmodal_father=false;
        $showmodal_mother=false;
        $createnew_father=false;
        $createnew_mother= false;
    }
}
