<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoList;
use App\Models\ScheduledMaintainence;

class ScheduledMaintainences extends Component
{
    public $issue,$recurrences,$scheduled_date,$days=[],$mode='view';
    protected $listeners = ['delete'];
    
    public function render()
    {
        $all_scheduled_maintainences=ScheduledMaintainence::get() ;
 
        return view('livewire.scheduled_maintainence.scheduled_maintainence',['all_scheduled_maintainences'=>$all_scheduled_maintainences])->layout('livewire.scheduled_maintainence_dashboard');
    }

    public function scheduleMaintainence(){
 
        ScheduledMaintainence::create([
            'issue' => $this->issue,
            'recurrences' => $this->recurrences,
            'days'=>implode(", ",$this->days),
            'scheduled_date'=>$this->scheduled_date
        ]);

        $this->mode = 'view';
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputFields();
        
    }


    public function deleteConfirm($id){

        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' =>'The action cannot be undone',
            'id'=>$id,
        ]);

    }

    public function delete($id)
    {
        ScheduledMaintainence::find($id)->delete();
        
    }

    public function edit($id)
    {
 
        $issues = ScheduledMaintainence::findOrFail($id);
        $this->maintainence_no = $id;
        $this->issue = $issues->issue;
        $this->recurrences = $issues->recurrences;
        $this->days =explode(", ",$issues->days);
        $this->scheduled_date = $issues->scheduled_date;
      
   
  
        $this->mode = 'update';
    }
  
    
    public function update()
    {
        $editing_issue = ScheduledMaintainence::find($this->maintainence_no);
       
        $editing_issue -> update([
            'issue' => $this->issue,
            'recurrences' => $this->recurrences,
            'days'=>$this->days,
            'scheduled_date'=>$this->scheduled_date
        ]);
         
        $this->resetInputFields();
        $this->mode = 'view';
    }
        
    public function weeklySchedule(){
        ToDoList::where('status','=', 1)->delete();
        $weekly_maintainences = ScheduledMaintainence::where('recurrences','weekly')->get();

        foreach($weekly_maintainences as $single_task){
            $days_array = explode(',',$single_task->days);
            for ($i=0;$i<sizeof(explode(',',$single_task->days));$i++){
                ToDoList::create([
                    'task'=>$single_task->issue,
                    'status'=>'0',
                    'days'=>$days_array[$i]
                ]);
            }
        }
    }

    public function monthlySchedule(){
        ToDoList::where('status','=', 1)->delete();
        $weekly_maintainences = ScheduledMaintainence::where('recurrences','monthly')->get();
        foreach($weekly_maintainences as $single_task){    
            ToDoList::create([
                'task'=>$single_task->issue,
                'status'=>'0',
                'date'=>''
            ]);    
        }
    }

    public function quaterlySchedule(){
        ToDoList::where('status','=', 1)->delete();
        $weekly_maintainences = ScheduledMaintainence::where('recurrences','quarterly')->get();
        foreach($weekly_maintainences as $single_task){    
            ToDoList::create([
                'task'=>$single_task->issue,
                'status'=>'0',
                'date'=>''
            ]);    
        }
    }

    public function view_only(){
        $this->mode = 'single';
    }

    public function cancel()
    {
        $this->mode = 'view';
        $this->resetInputFields();
    }
    
    public function resetInputFields(){
        $this->issue='';
        $this->recurrences='';
        $this->scheduled_date='';
        $this->days = '';

        return redirect(request()->header('Referer','no-referrer'));
    }

    
}
