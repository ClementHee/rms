<?php

namespace App\Http\Livewire;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use mikehaertl\pdftk\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Leaves extends Component
{
    public $category, $position,$class_name,$leave_type,$no_days,$dates,$reasons,$days_entitled,$days_available,$days_left;
    public $staff,$record_staff,$all_staff;
    public $showStaff = false;
    public $empty_staff =true;
    public $mode = 'view';
    

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
        ->leftJoin('leaves', 'staffs.staff_id', '=', 'leaves.staff_id')
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

    public function resetInputFields(){
        $this->staff='';
        $this->staff_name = '';
        $this->staff_id = '';
        $this->category = '';
        $this->position = '';
        $this->class_name = '';
        $this->leave_type = '';
        $this->no_days = '';
        $this->dates = '';
        $this->reasons = '';
        $this->days_entitled = '';
        $this->days_available = '';
        $this->days_left = ''; 
    }

    public function fillPDF(){

        $pdf = new Pdf(asset('form/form.pdf'),[
            'command' => '/usr/local/bin/pdftk',
            'useExec' => true,
        ]);

        $result = $pdf->
        fillForm([
            'staff_name'=>'ÄÜÖ äüö мирано čárka',
  
        ])
        ->flatten()
        ->saveAs(asset('form/filled.pdf'));
       
        if ($result === false) {
            $error = $pdf->getError();
        
        }
        dd($error);
        
      
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
