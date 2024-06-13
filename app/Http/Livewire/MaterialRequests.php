<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\MaterialRequest;
use App\Events\NewMaterialRequest;
use Livewire\WithPagination;
class MaterialRequests extends Component
{
    

    public $date, $requested_by, $class, $purpose,$item,$item2,$needed,$fulfilled;
    public $updateMode = false;
    public $all_requests;
    public $filters = 'reset';
    protected $listeners = ['delete'=>'deleteRequest'];

    
    
    private function resetInputFields(){
        $this->date='';
        $this->requested_by = '';
        $this->class = '';
        $this->purpose = '';
        $this->item='';
        $this->item2='';
        $this->needed='';
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {

        if($this->filters=='unfixed'){
            $all_requests = MaterialRequest::where('fulfilled','=',0)->orderBy('date','DESC')->paginate(10);
        }elseif($this->filters=='fixed'){
            $all_requests = MaterialRequest::where('fulfilled','=',1)->orderBy('date','DESC')->paginate(10);
        }else{
            $all_requests = MaterialRequest::orderBy('date','DESC')->paginate(10);
        }
      

        return view('livewire.materials.show_requests',['all_request'=>$all_requests])->layout('livewire.material_dashboard');
        
    }
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function storeRequest()
    {

        $new_request=$this ->validate([
            'requested_by' => 'required',
            'class' => 'required',
            'purpose' => 'required',
            'item' => 'required',
            'needed' => 'required',
        ]);
        
        MaterialRequest::create([
            'date' => Carbon::now(),
            'requested_by' => $this->requested_by,
            'class' => $this->class,
            'purpose' => $this->purpose,
            'item' => $this->item,
            'item2' => $this->item2,
            'needed'=>$this->needed
        ]);
        //$data=$this;
        

        //event(new NewMaterialRequest($data));

        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Issue reported',
            'text' =>'Issue has been reported. Please wait for it to be fixed',
        
        ]);

        session()->flash('message', 'Request has been made Successfully.');
  
        
   
        $this->dispatchBrowserEvent('close-modal');
        $this->emitUp('getNewRequest');
        $this->resetInputFields();
        
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function editRequest($id)
    {
        $requests = MaterialRequest::findOrFail($id);
        $this->request_id = $id;
        $this->item = $requests->item;
        $this->item2 = $requests->item2;
        $this->requested_by = $requests->requested_by;
        $this->class = $requests->class;
        $this->purpose = $requests->purpose;
        $this->needed = $requests->needed;
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
    public function updateRequest()
    {

        $editing_request = MaterialRequest::find($this->request_id);
        $editing_request->update([
                'date' => Carbon::now(),
                'requested_by' => $this->requested_by,
                'class' => $this->class,
                'purpose' => $this->purpose,
                'item' => $this->item,
                'item2' => $this->item2,
                'needed'=>$this->needed
            ]);
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Issue Updated',
            'text' =>'Issue has been updated.',
        
        ]);
        session()->flash('message', 'Request Updated Successfully.');
        $this->resetInputFields();

    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function deleteRequest($id)
    {
        MaterialRequest::find($id)->delete();
        session()->flash('message', 'Request Deleted Successfully.');
    }

    public function maf($id){
 
        $request_update = MaterialRequest::find($id);
 
        $request_update->fulfilled=1;
  
        $request_update->update([
            'date' => Carbon::now(),
            'requested_by' => $request_update->requested_by,
            'class' => $request_update->class,
            'purpose' => $request_update->purpose,
            'item' => $request_update->item,
            'item2' => $request_update->item2,
            'needed'=>$request_update->needed
        ]);
         
        session()->flash('message', 'Request Fulfilled');
        
    }
    public function mauf($id){
        $request_update = MaterialRequest::find($id);
 
        $request_update->fulfilled=0;
    
        $request_update->update([
            'date' => Carbon::now(),
            'requested_by' => $request_update->requested_by,
            'class' => $request_update->class,
            'purpose' => $request_update->purpose,
            'item' => $request_update->item,
            'item2' => $request_update->item2,
            'needed'=>$request_update->needed
        ]);
         
        session()->flash('message', 'Request Not Fulfilled');
        
    }
    public function filterUnfulfilled(){
        $this->filters='unfixed';
    }

    public function filterFulfilled(){
        $this->filters='fixed';
    }
    public function filterReset(){
        $this->filters='reset';
    }

    public function closeModal(){
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

}
