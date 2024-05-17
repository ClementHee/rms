<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\MaterialRequest;
use App\Events\NewMaterialRequest;

class MaterialRequests extends Component
{
    

    public $date, $requested_by, $class, $purpose,$item,$needed,$fulfilled;
    public $updateMode = false;
    public $filters = 'reset';
    protected $listeners =['getNewRequest'=>'reload'];

    public function reload(){
   
        $this->all_request = MaterialRequest::all();
        
    }
    
    
    private function resetInputFields(){
        $this->date='';
        $this->requested_by = '';
        $this->class = '';
        $this->purpose = '';
        $this->item='';
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
            $this->all_request = MaterialRequest::where('fulfilled','=',0)->orderBy('date','DESC')->get();
        }elseif($this->filters=='fixed'){
            $this->all_request = MaterialRequest::where('fulfilled','=',1)->orderBy('date','DESC')->get();
        }else{
            $this->all_request = MaterialRequest::orderBy('date','DESC')->get();
        }
      

        return view('livewire.materials.show_requests')->layout('livewire.material_dashboard');
        
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
            'needed'=>$this->needed
        ]);
        //$data=$this;
        

        //event(new NewMaterialRequest($data));

        
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
                'needed'=>$this->needed
            ]);
        $this->updateMode = false;
  
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
}
