<?php

namespace App\Http\Livewire;

use App\Models\Parents;
use Livewire\Component;

class ParentsL extends Component
{
    public $name, $ic_no, $occupation, $company_name, $company_add, $email, $tel;
    public $search = '';
    public $updateMode = false;
    public $mode = 'view';

    private function resetInputFields(){
        $this->name = '';
        $this->ic_no= '';
        $this->occupation= '';
        $this->company_name= '';
        $this->company_add= '';
        $this->email= '';
        $this->tel= '';
   
    }

    public function create_new(){
        
        $this->mode = 'create';
   
    }
    public function list_all(){
        
        $this->mode = 'view';
   
    }

    public function view_only(){
        
        $this->mode = 'single';
   
    }

    public function render()
    {
        $parents = Parents::where('name', 'like', '%'.$this->search.'%')->orderBy('parent_id','DESC')->paginate(10);

        return view('livewire.parent.parents', ['parents' => $parents])->layout('livewire.parents_dashboard');
    }

    public function storeParent()
    { 
        Parents::create([
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'occupation' => $this->occupation,
            'company_name' => $this->company_name,
            'company_add' => $this->company_add,
            'email' => $this->email,
            'tel' => $this->tel
        ]);
        
        session()->flash('message', 'Parent added Successfully.');
  
        $this->resetInputFields();
        $this->mode = 'view';
    }
    public function viewParent($id)
    {
        $parents = Parents::findOrFail($id);

 
        $this->parent_id = $id;
        $this->name = $parents->name;
        $this->ic_no = $parents->ic_no;
        $this->occupation = $parents->occupation;
        $this->company_name = $parents->company_name;
        $this->company_add = $parents->company_add;
        $this->email = $parents->email;
        $this->tel = $parents->tel;
      
        $this->mode = 'single';
    }

    public function editParent($id)
    {
        $parents = Parents::findOrFail($id);

 
        $this->parent_id = $id;
        $this->name = $parents->name;
        $this->ic_no = $parents->ic_no;
        $this->occupation = $parents->occupation;
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
        $this->mode = 'view';
    }
    
}
