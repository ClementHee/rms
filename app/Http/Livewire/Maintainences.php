<?php
  
namespace App\Http\Livewire;
  

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Maintainence;
use Livewire\WithPagination;
use App\Events\NewMaterialRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\MaintainenceReportedMail;

  
class Maintainences extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $issue, $location, $reported_by, $reported_at,$remarks,$fixed;
    public $all_maintainences;
    public $updateMode = false;
    public $filters = 'reset';
    protected $listeners = ['delete'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {   
 
    
        if($this->filters=='unfixed'){
            $all_maintainences = Maintainence::where('fixed','=',0)->orderBy('reported_at','DESC')->paginate(10);
        }elseif($this->filters=='fixed'){
            $all_maintainences = Maintainence::where('fixed','=',1)->orderBy('reported_at','DESC')->paginate(10);
        }else{
            $all_maintainences = Maintainence::orderBy('reported_at','DESC')->paginate(10);
        }

        return view ('livewire.maintainence.show_maintainence',['all_maintainence' => $all_maintainences])->layout('livewire.maintainence_dashboard');
        
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
    public function storeMaintainences()
    {
        
        Maintainence::create([
            'issue' => $this->issue,
            'location' => $this->location,
            'reported_by' => $this->reported_by,
            'remarks' => $this->remarks,
            'reported_at' => Carbon::now(),
        ]);

        $issue_to_Mail = $this->issue;
        $location_to_Mail = $this->location;
        $reported_by_to_Mail = $this->reported_by;
        $reported_at_to_Mail = Carbon::now()->format('Y-m-d');
        $remarks_to_Mail = $this->remarks;

        Mail::to('clement.hee.wy.2001@gmail.com')->send(new MaintainenceReportedMail($issue_to_Mail,$location_to_Mail,$reported_by_to_Mail,$reported_at_to_Mail,$remarks_to_Mail));
        Mail::to('tadikarhema@gmail.com')->send(new MaintainenceReportedMail($issue_to_Mail,$location_to_Mail,$reported_by_to_Mail,$reported_at_to_Mail,$remarks_to_Mail));

        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Issue reported',
            'text' =>'Issue has been reported. Please wait for it to be fixed',
        ]);

        session()->flash('message', 'Issue has been lodged Successfully.');

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
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
  
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Issue Updated',
            'text' =>'Issue has been updated.',
        
        ]);

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
    public function filterUnfixed(){
        $this->filters='unfixed';
    }

    public function filterFixed(){
        $this->filters='fixed';
    }
    public function filterReset(){
        $this->filters='reset';
    }

    public function deleteConfirm($id){

        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' =>'The action cannot be undone',
            'id'=>$id,
        ]);

    }

    public function closeModal(){
        $this->resetInputFields();
    }
}