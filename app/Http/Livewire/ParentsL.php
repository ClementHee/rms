<?php

namespace App\Http\Livewire;

use App\Models\Parents;
use Livewire\Component;
use Livewire\WithPagination;

class ParentsL extends Component
{
    public $name, $ic_no, $occupation,$gender, $company_name, $company_add, $email, $tel;
    public $search = '';
    public $mode = 'view';
    protected $listeners = ['delete'=>'deleteParent'];
    use WithPagination;
    protected $paginationTheme ='bootstrap';

    private function resetInputFields(){
        $this->name = '';
        $this->ic_no= '';
        $this->occupation= '';
        $this->gender='';
        $this->company_name= '';
        $this->company_add= '';
        $this->email= '';
        $this->tel= '';

        return redirect(request()->header('Referer','no-referrer'));
   
    }

    public function create_new(){
        
        $this->mode = 'create';
   
    }
    public function list_all(){
        
        $this->mode = 'view';
   
    }

    public function view_only(){
        
        $this->mode = 'view_single';
   
    }

    public function render()
    {
        $parents = Parents::where('name', 'like', '%'.$this->search.'%')->where('parent_id',"!=",1)->orderBy('parent_id','DESC')->paginate(10);

        return view('livewire.parent.parents', ['parents' => $parents])->layout('livewire.parents_dashboard');
    }

    public function storeParent()
    { 
        Parents::create([
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'occupation' => $this->occupation,
            'gender' => $this->gender,
            'company_name' => $this->company_name,
            'company_add' => $this->company_add,
            'email' => $this->email,
            'tel' => $this->tel
        ]);
        
        session()->flash('message', 'Parent added Successfully.');
        $this->mode = 'view';
        $this->resetInputFields();
      
    }
    public function viewParent($id)
    {
        $parents = Parents::findOrFail($id);

 
        $this->parent_id = $id;
        $this->name = $parents->name;
        $this->ic_no = $parents->ic_no;
        $this->occupation = $parents->occupation;
        $this->gender = $parents->gender;
        $this->company_name = $parents->company_name;
        $this->company_add = $parents->company_add;
        $this->email = $parents->email;
        $this->tel = $parents->tel;
      
        $this->mode = 'view_single';
    }

    public function editParent($id)
    {
        $parents = Parents::findOrFail($id);

 
        $this->parent_id = $id;
        $this->name = $parents->name;
        $this->ic_no = $parents->ic_no;
        $this->occupation = $parents->occupation;
        $this->gender = $parents->gender;
        $this->company_name = $parents->company_name;
        $this->company_add = $parents->company_add;
        $this->email = $parents->email;
        $this->tel = $parents->tel;
      
        $this->mode = 'update';
    }

    public function updateParent()
    {
   
        $editing_parent = Parents::find($this->parent_id);
        $editing_parent->update([
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'occupation' => $this->occupation,
            'gender' => $this->gender,
            'company_name' => $this->company_name,
            'company_add' => $this->company_add,
            'email' => $this->email,
            'tel' => $this->tel
        ]);
         
        
  
        $this->mode = 'view';
  
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();

    }

     public function cancel()
    {
 
        $this->resetInputFields();
    }
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function deleteParent($id)
    {
        Parents::find($id)->delete();
        session()->flash('message', 'Record Deleted Successfully.');
       
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
