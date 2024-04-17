<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ToDoList;

class ToDoLists extends Component
{
    public $task, $status, $date,$days,$mode='view';
    protected $listeners = ['delete'];

    public function render()
    {
        $task_lists = ToDoList::get();
        return view('livewire.to_do_list.to_do_list',['task_lists'=>$task_lists])->layout('livewire.to_do_list_dashboard');
    }

    public function addToDoList(){
 
        ToDoList::create([
            'task' => $this->task,
            'status' => 0,
            'date'=>$this->date,
            'days'=>$this->days
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
   
        ToDoList::find($id)->delete();
        
    }

    public function editToDoList($id)
    {
 
        $tasks = ToDoList::findOrFail($id);
        $this->task_no = $id;
        $this->task = $tasks->task;
        $this->status = $tasks->status;
        $this->date = $tasks->date;
        $this->days = $tasks->days;
      
        $this->mode = 'update';
    }
  
    
    public function updateToDoList()
    {
        $editing_task = ToDoList::find($this->task_no);
       
        $editing_task -> update([
            'task' => $this->task,
            'status' => $this->status,
            'date'=>$this->date,
            'days'=>$this->days
        ]);
         
        $this->resetInputFields();
        $this->mode = 'view';
    }
    public function resetInputFields(){
      
        $this->task = '';
        $this->status = '';
        $this->date = '';
        $this->days = '';
    
    }

    public function maf($id){

        $task_update = ToDoList::find($id);
 
        $task_update->status=1;

        $task_update->update([
            'issue' => $task_update->issue,
            'location' => $task_update->location,
            'reported_by' =>  $task_update->reported_by,
            'remarks'=>$task_update->remarks,
            'status'=>$task_update->status
        ]);

        
        session()->flash('message', 'Issue Fixed');
        
    }
    public function mau($id){
        $task_update = ToDoList::find($id);
        $task_update->status=0;

        $task_update->update([
            'issue' => $task_update->issue,
            'location' => $task_update->location,
            'reported_by' =>  $task_update->reported_by,
            'remarks'=>$task_update->remarks,
            'status'=>$task_update->status
        ]);

        session()->flash('message', 'Issue Not Fixed');
        
    }

    
}
