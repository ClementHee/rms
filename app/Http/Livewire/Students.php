<?php

namespace App\Http\Livewire;

use App\Models\Parents;
use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;

class Students extends Component
{
    public $class,$record_year,$type,$fullname,$gender,$dob,$birth_cert_no,$pos_in_family,$race,$nationality,$prev_kindy,$no_years,$religion,$home_add,$home_lang,$home_tel,$e_contact,$e_contact_hp,$fam_doc,$allergies,$others,$potential,$father,$mother;
    public $j1_class,$j2_class,$j3_class,$aft_j1_class,$aft_j2_class,$aft_j3_class;
    public $poscode, $state, $country,$district,$e_contact2,$e_contact2_hp,$fam_doc_hp,$mykid;
    public $mode = 'view';
    public $search = '';
    public $parents;
    public $parents2;
    public $showdiv=false;
    public $showdiv2=false;
    public $showcreatenew=false;
    public $showcreatenew2= false;

   //

    public function create_new(){
        $this->resetInputFields();
        $this->mode = 'create';
   
    }
    public function list_all(){
        
        $this->mode = 'view';
   
    }

    public function view_only(){
        
        $this->mode = 'single';
   
    }

    public function viewStudent($id)
    {


        $students = Student::findOrFail($id);

        $father_name = Parents::where('parent_id',($students->father))->get('name')->first();
        $mother_name = Parents::where('parent_id',($students->mother))->get('name')->first();

        $this->student_id=$id;
        $this->record_year=$students->record_year;
        $this->type=$students->type;
        $this->fullname=$students->fullname;
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
        $this-> father=$father_name->name;
        $this->mother=$mother_name->name;
        $this->j1_class=$students->j1_class;
        $this->j2_class=$students->j2_class;
        $this->j3_class=$students->j3_class;
        $this->aft_j1_class=$students->aft_j1_class;
        $this->aft_j2_class=$students->aft_j2_class;
        $this->aft_j3_class=$students->aft_j3_class;
 
        $this->mode = 'single';
    }

    public function searchResult(){

        if(!empty($this->father)){
            
            $this->parents = Parents::select('*')
                      ->where('name','like','%'.$this->father.'%')
                      ->limit(5)
                      ->get();

            
            if(count($this->parents)==0){
                $this->showdiv = false;
                $this->showcreatenew = true;
           
                
            }else{
                $this->showdiv = true;
            }
        }else{
            $this->showdiv = false;
            $this->showcreatenew = false;
        }
      
    }

    public function searchResult2(){
    
        if(!empty($this->mother)){
            
            $this->parents2 = Parents::select('*')
                      ->where('name','like','%'.$this->mother.'%')
                      ->limit(5)
                      ->get();

            if(count($this->parents2)==0){
                $this->showdiv2 = false;
                $this->showcreatenew2 = true;
       
            }else{
                $this->showdiv2 = true;
            }
        }else{
            
            $this->showdiv2 = false;
            $this->showcreatenew2 = false;
        }
        
    }

    public function fetchFather($id = 0){

        $record = Parents::select('*')
                    ->where('parent_id',$id)
                    ->first();

        $this->father = $record->name;
        
        $this->showdiv = false;
        $this->showcreatenew = false;
    }

    public function fetchMother($id = 0){

        $record2 = Parents::select('*')
                    ->where('parent_id',$id)
                    ->first();

        $this->mother = $record2->name;
        
        $this->showdiv2 = false;
        $this->showcreatenew2 = false;
    }

    public function render()
    {
       
        $students = Student::where('fullname', 'like', '%'.$this->search.'%')->orderBy('student_id','DESC')->paginate(10);
        
        return view('livewire.student.students', ['students' => $students])->layout('livewire.student_dashboard');
    
     
    }
    

    private function resetInputFields(){
        $this->record_year='';
        $this->type='';
        $this->fullname='';
        $this->gender='';
        $this->dob='';
        $this-> birth_cert_no='';
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
        $this->country='';
        $this->district='';
        $this->home_lang='';
        $this->home_tel='';
        $this->e_contact='';
        $this->e_contact_hp='';
        $this->fam_doc='';
        $this->e_contact2='';
        $this->e_contact2_hp='';
        $this->fam_doc_hp='';
        $this->allergies='';
        $this->others='';
        $this->potential='';
        $this-> father='';
        $this->mother='';
        $this->class='';
        $this->j1_class='';
        $this->j2_class='';
        $this->j3_class=='';
        $this->aft_j1_class='';
        $this->aft_j2_class='';
        $this->aft_j3_class='';
   
    }

    
    public function cancel()
    {
        $this->mode = 'view';
        $this->resetInputFields();
    }
    public function editStudent($id)
    {   
        $student = Student::findOrFail($id);
      
        $father_name = Parents::where('parent_id',($student->father))->get('name')->first();
        $mother_name = Parents::where('parent_id',($student->mother))->get('name')->first();
       
        $students = Student::findOrFail($id);
        $this->student_id=$id;
        $this->record_year=$students->record_year;
        $this->type=$students->type;
        $this->fullname=$students->fullname;
        $this->gender=$students->gender;
        $this->dob=$students->dob;
        $this-> birth_cert_no=$students->birth_cert_no;
        $this->$mykid=$students->mykid;
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
        $this->fam_doc=$students->fam_doc;
        $this->e_contact2=$students->e_contact2;
        $this->e_contact2_hp=$students->e_contact2_hp;
        $this->fam_doc_hp=$students->fam_doc_hp;
        $this-> allergies=$students->allergies;
        $this->others=$students->others;
        $this->potential=$students->potential;
        $this-> father=$father_name->name;
        $this->mother=$mother_name->name;
        $this->j1_class=$students->j1_class;
        $this->j2_class=$students->j2_class;
        $this->j3_class=$students->j3_class;
        $this->aft_j1_class=$students->aft_j1_class;
        $this->aft_j2_class=$students->aft_j2_class;
        $this->aft_j3_class=$students->aft_j3_class;
 
        $this->mode = 'update';
    }

    public function storeStudent()
    {  $father_id = Parents::where('name',($this->father))->get('parent_id')->first();
        $mother_id = Parents::where('name',($this->mother))->get('parent_id')->first();
       if($this->no_years==""){
        $this->no_years=0;  
       }
        
        Student::create([
            'record_year'=> $this->record_year,
            'type'=> $this->type,
            'fullname'=> $this->fullname,
            'gender'=> $this->gender,
            'dob'=> $this->dob,
            'birth_cert_no'=> $this->birth_cert_no,
            'mykid'=>$this->mykid,
            'pos_in_family'=> $this->pos_in_family,
            'race'=> $this->race,
            'nationality'=> $this->nationality,
            'prev_kindy' => $this->prev_kindy,
            'no_years' => $this->no_years,
            'religion'=> $this->religion,
            'home_add'=> $this->home_add,
            'poscode'=>$this->poscode,
            'state' => $this->state,
            'country'=>$this->country,
            'district'=>$this->district,
            'home_lang'=> $this->home_lang,
            'home_tel'=> $this->home_tel,
            'e_contact'=> $this->e_contact,
            'e_contact_hp'=> $this->e_contact_hp,
            'e_contact2'=> $this->e_contact2,
            'e_contact2_hp'=> $this->e_contact2_hp,
            'fam_doc'=> $this->fam_doc,
            'fam_doc_hp'=> $this->fam_doc_hp,
            'allergies'=> $this->allergies,
            'others'=> $this->  others,
            'potential'=> $this->potential,
            'father'=> $father_id->parent_id,
            'mother'=> $mother_id->parent_id,
            'j1_class'=>$this->j1_class,
            'j2_class'=>$this->j2_class,
            'j3_class'=>$this->j3_class,
            'aft_j1_class'=>$this->aft_j1_class,
            'aft_j2_class'=>$this->aft_j2_class,
            'aft_j3_class'=>$this->aft_j3_class
        ]);

        $student_id=Student::where('fullname',$this->fullname)->get('student_id')->first();
        Relationship::create([
            'student' => $student_id->student_id,
            'father' => $father_id->parent_id,
            'mother' => $mother_id->parent_id
        ]);

        session()->flash('message', 'Student added Successfully.');
  
        $this->resetInputFields();
        $this->mode = 'view';
        
    }

    public function updateStudent()
    {
        $father_id = Parents::where('name',($this->father))->get('parent_id')->first();
        $mother_id = Parents::where('name',($this->mother))->get('parent_id')->first();
        
        $editing_student = Student::find($this->student_id);
        

        

        
        $editing_student->update([
            'record_year'=> $this->record_year,
            'type'=> $this->type,
            'fullname'=> $this->fullname,
            'gender'=> $this->gender,
            'dob'=> $this->dob,
            'birth_cert_no'=> $this->birth_cert_no,
            'mykid'=>$this->mykid,
            'pos_in_family'=> $this->pos_in_family,
            'race'=> $this->race,
            'nationality'=> $this->nationality,
            'prev_kindy' => $this->prev_kindy,
            'no_years' => $this->no_years,
            'religion'=> $this->religion,
            'home_add'=> $this->home_add,
            'poscode'=>$this->poscode,
            'state' => $this->state,
            'country'=>$this->country,
            'district'=>$this->district,
            'home_lang'=> $this->home_lang,
            'home_tel'=> $this->home_tel,
            'e_contact'=> $this->e_contact,
            'e_contact_hp'=> $this->e_contact_hp,
            'fam_doc'=> $this->fam_doc,
            'e_contact2'=> $this->e_contact2,
            'e_contact2_hp'=> $this->e_contact2_hp,
            'fam_doc_hp'=> $this->fam_doc_hp,
            'allergies'=> $this->allergies,
            'others'=> $this->others,
            'potential'=> $this->potential,
            'father'=> $father_id->parent_id,
            'mother'=> $mother_id->parent_id,
            'j1_class'=>$this->j1_class,
            'j2_class'=>$this->j2_class,
            'j3_class'=>$this->j3_class,
            'aft_j1_class'=>$this->aft_j1_class,
            'aft_j2_class'=>$this->aft_j2_class,
            'aft_j3_class'=>$this->aft_j3_class
        ]);

        

        $this->mode = 'view';
  
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();

    }

    public function deleteStudent($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student Record Deleted Successfully.');
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
  
        
        
        $showdiv=false;
        $showdiv2=false;
        $showcreatenew=false;
        $showcreatenew2= false;
        $this->resetInputFields_Parents();
        $this->dispatchBrowserEvent('close-modal');
        
    }

    public function redirectParent($name){
        
        $parent_id = Parents::where('name',$name)->get('parent_id')->first();
        session()->flash('message', 'Student Record Deleted Successfully.');
    }

    public function closeModal(){
        $this->resetInputFields_Parents();
        $showdiv=false;
        $showdiv2=false;
        $showcreatenew=false;
        $showcreatenew2= false;
    }
}
