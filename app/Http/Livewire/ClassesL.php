<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClassesL extends Component
{
    public $class, $teacher, $assist_teacher, $no_student;
    public $updateMode = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        
        $this->all_classes = Classes::all();
        
        return view ('livewire.class.classes-l')->layout('livewire.class_dashboard');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->issue = '';
        $this->location = '';
        $this->reported_by = '';
        $this->reported_at = '';
        $this->remarks='';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {

        $new_issue=$this ->validate([
        'issue' => 'required',
        'location' => 'required',
        'reported_by' => 'required',

        ]);
        
        Maintainence::create([
            'issue' => $this->issue,
            'location' => $this->location,
            'reported_by' => $this->reported_by,
            'remarks' => $this->remarks,
            'reported_at' => Carbon::now(),
        ]);


        session()->flash('message', 'Issue has been lodged Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $issues = Maintainence::findOrFail($id);
        $this->issue_no = $id;
        $this->issue = $issues->issue;
        $this->location = $issues->location;
        $this->reported_by = $issues->reported_by;
        $this->reported_at = $issues->reported_at;
        $this->fixed = $issues->fixed;
        $this->remarks = $issues->remarks;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $editing_issue = Maintainence::find($this->issue_no);
        $editing_issue->update([
            'issue' => $this->issue,
            'location' => $this->location,
            'reported_by' =>  $this->reported_by,
            'remarks'=>$this->remarks
        ]);
         
        
  
        $this->updateMode = false;
  
        session()->flash('message', 'Issue Updated Successfully.');
        $this->resetInputFields();

    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Maintainence::find($id)->delete();
        session()->flash('message', 'Issue Deleted Successfully.');
    }

    public function maf($id){
 
        $issue_update = Maintainence::find($id);
 
        $issue_update->fixed=1;

        $issue_update->update([
            'issue' => $issue_update->issue,
            'location' => $issue_update->location,
            'reported_by' =>  $issue_update->reported_by,
            'remarks'=>$issue_update->remarks,
            'fixed'=>$issue_update->fixed
        ]);

         
        session()->flash('message', 'Issue Fixed');
        
    }
    public function mau($id){
        $issue_update = Maintainence::find($id);
        $issue_update->fixed=0;

        $issue_update->update([
            'issue' => $issue_update->issue,
            'location' => $issue_update->location,
            'reported_by' =>  $issue_update->reported_by,
            'remarks'=>$issue_update->remarks,
            'fixed'=>$issue_update->fixed
        ]);

        session()->flash('message', 'Issue Not Fixed');
        
    }
}
