<?php

namespace App\Http\Livewire;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use mikehaertl\pdftk\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Leaves extends Component
{
    public $category, $position,$class_name,$leave_type,$no_days,$dates,$reasons,$days_entitled,$days_available,$days_left;
    public $staff,$record_staff,$all_staff;
    public $showStaff = false;
    public $empty_staff =true;
    public $mode = 'view';
    public $form_no_days,$form_dates,$form_reasons,$form_days_entitled,$form_days_available,$form_days_left,$link_to_file;
    public $filled=false;
    

    public function applyNew(){
        $this->mode = 'apply';
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->mode = 'view';
        $this->resetInputFields();
    }

    public function render()
    {

        $leaves =  DB::table('staffs')
        ->join('leaves', 'staffs.staff_id', '=', 'leaves.staff_id')
        ->get();
     
        return view('livewire.leaves.leaves',['leaves'=>$leaves])->layout('livewire.leaves_dashboard');
    }
  
    public function applyLeave(){

        Leave::create([
            
            'staff_id' => Staff::where('fullname','=',$this->staff)->get('staff_id')->first()->staff_id,
            'category' =>trim($this->category),
            'position' =>trim($this->position),
            'class_name' => trim($this->class_name),
            'leave_type' => trim($this->leave_type),
            'no_days' => trim($this->no_days),
            'date_start' => Carbon::createFromFormat('Y-m-d',$this->dates),
            'date_end' => Carbon::createFromFormat('Y-m-d',$this->dates)->addDays($this->no_days),
            'reasons' => trim($this->reasons)
      
        ]);
        $after_apply = $this->days_available - $this->no_days;
        $edit_staff = Staff::findOrFail(Staff::where('fullname','=',$this->staff)->get('staff_id')->first()->staff_id);
        Staff::update([
            'days_left' =>$after_apply,

        ]);


        $this->resetInputFields();
        $this->mode = 'view';
    }

    public function searchResultStaff(){
        if(!empty($this->staff)){ 
            $this->all_staff = Staff::select('*')
                      ->where('fullname','like','%'.$this->staff.'%')
                      ->limit(5)
                      ->get();
     
   
                $this->showStaff = true;
              
            
        }else{
            $this->showStaff = false;
        }
      
    }

    public function fetchStaff($id){

        $record_staff = Staff::select('*')
                    ->where('staff_id',$id)
                    ->first();

        $this->staff = $record_staff->fullname;
        
        $this->showStaff = false;
        
    }
    public function getLeave($id){
    
        $leave = Leave::findOrFail($id);
        $this->staff_id = $leave->staff_id;
        $this->position = $leave->position;
        $this->category = $leave->category;
        $this->class_name = $leave->class_name;
        $this->leave_type = $leave->leave_type;
        $this->no_days = $leave->no_days;
        $this->date_start = $leave->date_start;
        $this->date_end = $leave->date_end;
        $this->reasons = $leave->reasons;
        
    }

    public function viewLeave($id){

        $this->getLeave($id);
        $this->staff= Staff::where('staff_id','=',$this->staff_id)->get('fullname')->first()->fullname;
        $this->mode='single';

    }

   


    public function resetInputFields(){
        $this->staff='';
        $this->staff_name = '';
        $this->staff_id = '';
        $this->category = '';
        $this->position = '';
        $this->class_name = '';
        $this->leave_type = '';
        $this->no_days = '';
        $this->date_start = '';
        $this->date_end = '';
        $this->reasons = '';
        $this->days_entitled = '';
        $this->days_available = '';
        $this->days_left = ''; 
    }

    public function fillPDF(){
      
        
        $this->days_available = Staff::where('staff_id','=',$this->staff_id)->get('days_available')->first()->days_available;        
        $this->days_entitled = Staff::where('staff_id','=',$this->staff_id)->get('days_entitled')->first()->days_entitled;
        $this->days_left = Staff::where('staff_id','=',$this->staff_id)->get('days_left')->first()->days_left;



        if($this->category=="Office"){

            $this->form_days_entitled = 'office_days_entitled';
            $this->form_days_available ='office_days_avail';
            $this->form_days_left ='office_days_left';

            if($this->leave_type='office_mc'){
                $this->form_no_days = 'office_mc_days';
                $this->form_dates = 'office_mc_dates';
                $this->form_reasons = 'office_mc_reasons';
            }
            elseif($this->leave_type='office_emergency'){
                $this->form_no_days = 'office_emergency_days';
                $this->form_dates = 'office_emergency_dates';
                $this->form_reasons = 'office_emergency_reasons';
            }else{
                $this->form_no_days = 'office_annual_days';
                $this->form_dates = 'office_annual_dates';
                $this->form_reasons = 'office_annual_reasons';
            }
        }elseif($this->category=="Teacher"){

            $this->form_days_entitled = 'teaching_days_entitled';
            $this->form_days_available ='teaching_days_avail';
            $this->form_days_left ='teaching_days_left';

            if($this->leave_type='teaching_mc'){
                $this->form_no_days = 'teaching_mc_days';
                $this->form_dates = 'teaching_mc_dates';
                $this->form_reasons = 'teaching_mc_reasons';
                
            }
            elseif($this->leave_type='teaching_emergency'){
                $this->form_no_days = 'teaching_emergency_days';
                $this->form_dates = 'teaching_emergency_dates';
                $this->form_reasons = 'teaching_emergency_reasons';
            }else{
                $this->form_no_days = 'teaching_unpaid_days';
                $this->form_dates = 'teaching_unpaid_dates';
                $this->form_reasons = 'teaching_unpaid_reasons';
            }
        }elseif($this->category=="Support Staff"){

            $this->form_days_entitled = 'support_days_entitled';
            $this->form_days_available ='support_days_avail';
            $this->form_days_left ='support_days_left';

            if($this->leave_type='support_mc'){
                $this->form_no_days = 'support_mc_days';
                $this->form_dates = 'support_mc_dates';
                $this->form_reasons = 'support_mc_reasons';
                
            }
            elseif($this->leave_type='support_emergency'){
                $this->form_no_days = 'support_emergency_days';
                $this->form_dates = 'support_emergency_dates';
                $this->form_reasons = 'support_emergency_reasons';
            }else{
                $this->form_no_days = 'support_annual_days';
                $this->form_dates = 'support_annual_dates';
                $this->form_reasons = 'support_annual_reasons';
            }
        }

        $pdf = new Pdf(public_path('/form/form.pdf'),[
            'useExec' => true,
        ]); 
        
        $result = $pdf->
        fillForm([
            'staff_name' => $this->staff,
            $this->leave_type => "Yes",
            $this->position => "Yes",
            $this->form_no_days=>$this->no_days,
            $this->form_dates=>$this->date_start . ' -> ' . $this->date_end,
            $this->form_reasons=>$this->reasons,
            $this->form_days_entitled => $this-> days_entitled,
            $this->form_days_available => $this-> days_available,
            $this->form_days_left => $this->days_left
  
        ])
        ->flatten()
        ->saveAs(storage_path('applied_form/'.$this->staff.' '.$this->date_start.'.pdf'));
        
        $this->link_to_file = storage_path('applied_form\\'.$this->staff.' '.$this->date_start.'.pdf');
      
        $this->filled=true;
        if ($result === false) {
            $error = $pdf->getError();
            dd($result);
        }
      
    }

    public function downloadPDF(){
        $this->filled=false;
        return response()->download($this->link_to_file);
    }

      /*'staff_id',
    'position',
    'class_name',
    'leave_type',
    'no_days',
    'dates',
    'reasons',
    'days_entitled',
    'days_available',
    'days_left'*/
}
