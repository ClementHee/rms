<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use Livewire\Component;

class Staffs extends Component
{
    protected $paginationTheme ='bootstrap';
    public $mode = 'view';
    public $fullname, $dob, $nric,$birth_cert_no,$gender,$race,$nationality,$religion,$home_add,$home_tel,$hp_np,$email,$marital_status,$socso,$epf,$allergies,$qualification,$other;
    public $spouse,$spouse_dob,$spouse_nric,$spouse_race,$spouse_religion,$spouse_nationality,$spouse_occupation,$spouse_comp,$spouse_hp,$spouse_office_no;
    public $search ='';
    public $days_entitled,$days_left,$days_available;
    protected $listeners = ['delete'=>'deleteStaff'];

    public function create_new(){
        $this->mode = 'create';
        $this->resetInputFields();
    }

    public function list_all(){
        $this->mode = 'view';
        return redirect(request()->header('Referer','no-referrer'));
    }

    public function viewStaff($id){
        $this->getStaff($id);
        $this->mode = 'view_single';
        
    }

    public function editStaff($id){
        $this->mode = 'update';
        $this->getStaff($id);
        
    }


    public function render()
    {
        $staffs = Staff::where('fullname', 'like', '%'.$this->search.'%')->orderBy('fullname','ASC')->paginate(10);      
        return view('livewire.staff.staffs',['staffs'=>$staffs])->layout('livewire.staff_dashboard');
    }
    

    public function storeStaff(){
        if($this->days_entitled==null){
            $this->days_entitled = 0;
        };
        if($this->days_left==null){
            $this->days_left = 0;
        };
        if($this->days_available==null){
            $this->days_available = 0;
        };
        if($this->spouse_dob==''){
            $spouse_dob=NULL;
    
        }
        Staff::create([
            'fullname' => trim($this->fullname),
            'dob' => trim($this->dob),
            'nric' => trim($this->nric),
            'birth_cert_no' => trim($this->birth_cert_no),
            'gender' => trim($this->gender),
            'race' => trim($this->race),
            'nationality' => trim($this->nationality),    
            'religion' => trim($this->religion),
            'home_add' => trim($this->home_add),
            'home_tel' => trim($this->home_tel),
            'hp_no' => trim($this->hp_no),
            'email' => trim($this->email),
            'marital_status' => trim($this->marital_status),
            'socso' => trim($this->socso),
            'epf' => trim($this->epf),
            'allergies' => trim($this->allergies),
            'spouse' => trim($this->spouse),
            'spouse_dob' => $spouse_dob,
            'spouse_nric'=> trim($this->spouse_nric),
            'spouse_race' => trim($this->spouse_race),
            'spouse_religion' => trim($this->spouse_religion),
            'spouse_nationality' => trim($this->spouse_nationality),
            'spouse_occupation' => trim($this->spouse_occupation),
            'spouse_comp' => trim($this->spouse_comp),
            'spouse_hp' => trim($this->spouse_hp),
            'spouse_office_no' => trim($this->spouse_office_no),
            'qualification' => trim($this->qualification),
            'other' => trim($this->other),
            'days_entitled' =>trim ($this->days_entitled),
            'days_left' =>trim ($this->days_left),
            'days_available' =>trim ($this->days_available)
        ]);

        
        $this->mode = 'view';
        $this->resetInputFields();
    }

    public function getStaff($id){
    
        $staff = Staff::findOrFail($id);

        $this->staff_id = $id;
        $this->fullname = $staff->fullname;
        $this->dob = $staff->dob;
        $this->nric = $staff->nric;
        $this->birth_cert_no = $staff->birth_cert_no;
        $this->gender = $staff->gender;
        $this->race = $staff->race;
        $this->nationality = $staff->nationality;
        $this->religion = $staff->religion;
        $this->home_add = $staff->home_add;
        $this->home_tel = $staff->home_tel;
        $this->hp_no = $staff->hp_no;
        $this->email = $staff->email;
        $this->marital_status = $staff->marital_status;
        $this->socso = $staff->socso;
        $this->epf = $staff->epf;
        $this->allergies = $staff->allergies;
        $this->spouse = $staff->spouse;
        $this->spouse_dob = $staff->spouse_dob;
        $this->spouse_nric = $staff->spouse_nric;
        $this->spouse_race = $staff->spouse_race;
        $this->spouse_religion = $staff->spouse_religion;
        $this->spouse_nationality = $staff->spouse_nationality;
        $this->spouse_occupation = $staff->spouse_occupation;
        $this->spouse_comp = $staff->spouse_comp;
        $this->spouse_hp = $staff->spouse_hp;
        $this->spouse_office_no = $staff->spouse_office_no;
        $this->qualification = $staff->qualification;
        $this->other = $staff->other;
        $this->days_entitled =$staff-> days_entitled;
        $this->days_left=$staff-> days_left;
        $this->days_available=$staff-> days_available;
    }

    public function updateStaff(){
     
        $editing_staff = Staff::find($this->staff_id);
        $editing_staff->update([
            'fullname' => trim($this->fullname),
            'dob' => trim($this->dob),
            'nric' => trim($this->nric),
            'birth_cert_no' => trim($this->birth_cert_no),
            'gender' => trim($this->gender),
            'race' => trim($this->race),
            'nationality' => trim($this->nationality),    
            'religion' => trim($this->religion),
            'home_add' => trim($this->home_add),
            'home_tel' => trim($this->home_tel),
            'hp_no' => trim($this->hp_no),
            'email' => trim($this->email),
            'marital_status' => trim($this->marital_status),
            'socso' => trim($this->socso),
            'epf' => trim($this->epf),
            'allergies' => trim($this->allergies),
            'spouse' => trim($this->spouse),
            'spouse_dob' => $this->spouse_dob,
            'spouse_nric'=> trim($this->spouse_nric),
            'spouse_race' => trim($this->spouse_race),
            'spouse_religion' => trim($this->spouse_religion),
            'spouse_nationality' => trim($this->spouse_nationality),
            'spouse_occupation' => trim($this->spouse_occupation),
            'spouse_comp' => trim($this->spouse_comp),
            'spouse_hp' => trim($this->spouse_hp),
            'spouse_office_no' => trim($this->spouse_office_no),
            'qualification' => trim($this->qualification),
            'other' => trim($this->other),
            'days_entitled' =>trim ($this->days_entitled),
            'days_left' =>trim ($this->days_left),
            'days_available' =>trim ($this->days_available)
        ]);

        $this->resetInputFields();
        $this->mode="view";
    }

    public function deleteStaff($id)
    {
        Staff::find($id)->delete();
        session()->flash('danger', 'Student Record Deleted Successfully.');
    }

  
    public function resetInputFields(){
        $this->fullname = '';
        $this->dob = '';
        $this->nric = '';
        $this->birth_cert_no = '';
        $this->gender = '';
        $this->race = '';
        $this->nationality = '';
        $this->religion = '';
        $this->home_add = '';
        $this->home_tel = '';
        $this->hp_no = '';
        $this->email = '';
        $this->marital_status = '';
        $this->socso = '';
        $this->epf = '';
        $this->allergies = '';
        $this->spouse = '';
        $this->spouse_dob = '';
        $this->spouse_nric = '';
        $this->spouse_race = '';
        $this->spouse_religion = '';
        $this->spouse_nationality = '';
        $this->spouse_occupation = '';
        $this->spouse_comp = '';
        $this->spouse_hp = '';
        $this->spouse_office_no = '';
        $this->qualification = '';
        $this->other = '';

        return redirect(request()->header('Referer','no-referrer'));
    }

    public function deleteConfirm($id){

        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' =>'The action cannot be undone',
            'id'=>$id,
        ]);

    }
    /*public function editStaff(){
        $staff = Staff::findOrFail($id);

        $this->fullname = $staff->fullname;
        $this->dob = $staff->dob;
        $this->nric = $staff->nric;
        $this->birth_cert_no = $staff->birth_cert_no;
        $this->gender = $staff->gender;
        $this->race = $staff->race;
        $this->nationality = $staff->nationality;
        $this->religion = $staff->religion;
        $this->home_add = $staff->home_add;
        $this->home_tel = $staff->home_tel;
        $this->hp_no = $staff->hp_no;
        $this->email = $staff->email;
        $this->marital_status = $staff->marital_status;
        $this->socso = $staff->socso;
        $this->epf = $staff->epf;
        $this->allergies = $staff->allergies;
        $this->spouse = $staff->spouse;
        $this->spouse_dob = $staff->spouse_dob;
        $this->spouse_nric = $staff->spouse_nric;
        $this->spouse_race = $staff->spouse_race;
        $this->spouse_religion = $staff->spouse_religion;
        $this->spouse_nationality = $staff->spouse_nationality;
        $this->spouse_occupation = $staff->spouse_occupation;
        $this->spouse_comp = $staff->spouse_comp;
        $this->spouse_hp = $staff->spouse_hp;
        $this->spouse_office_no = $staff->spouse_office_no;
        $this->qualification = $staff->qualification;
        $this->other = $staff->other;

        $this->mode ='edit';
    }*/

    /*'fullname',
    'dob',
    'nric',
    'birth_cert_no',
    'gender',
    'race',
    'nationality',    
    'religion',
    'home_add',
    'home_tel',
    'hp_no',
    'email',
    'marital_status',
    'socso',
    'epf',
    'allergies',
    'spouse',
    'spouse_dob',
    'spouse_nric',
    'spouse_race',
    'spouse_religion',
    'spouse_nationality',
    'spouse_occupation',
    'spouse_comp',
    'spouse_hp',
    'spouse_office_no',
    'qualification',
    'other'*/
}
