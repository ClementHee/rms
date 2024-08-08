<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InventoryM;

class Inventory extends Component
{
    public $category, $name, $date_purchased, $warranty,$remarks,$serial_no;
    public $mode = 'view';
    public $search = '';
    protected $listeners = ['delete'=>'deleteItem'];

    public function render()
    {
        $inventory = InventoryM::where('name', 'like', '%'.$this->search.'%')->orderBy('name','ASC')->paginate(10);
        return view('livewire.inventory.inventory', ['inventory' => $inventory])->layout('livewire.inventory_dashboard');
    }
    public function list_all(){
        $this->resetInputFields();
        $this->mode = 'view';
   
    }

    public function create_new(){
        
        $this->mode = 'create';
        
    }

    public function editItem($id){

        $this->getInventory($id);
        $this->mode = 'update';
    }

    public function viewItem($id){
        $this->getInventory($id);
        $this->mode = 'view_single';

    }
    public function recordInventory(){
        InventoryM::create([
        'category'=>trim($this->category),
        'name'=>trim($this->name),
        'serial_no'=>trim($this->serial_no),
        'date_purchased'=>trim($this->date_purchased),
        'warranty'=>trim($this->warranty),
        'remarks'=>trim($this->remarks)]);

        $this->resetInputFields();
    }
    
    public function getInventory($id){
        $current_item =  InventoryM::findOrFail($id);

        $this->student_id = $id;
        $this->category = $current_item->category;
        $this->name = $current_item->name;
        $this->serial_no = $current_item->serial_no;
        $this->date_purchased = $current_item->date_purchased;
        $this->warranty = $current_item->warranty;
        $this->remarks = $current_item->remarks;
    }

    


    public function updateInventory(){
       
        $editing_item = InventoryM::findOrFail($this->student_id);

        $editing_item->update(['category'=>trim($this->category),
        'name'=>trim($this->name),
        'serial_no'=>trim($this->serial_no),
        'date_purchased'=>trim($this->date_purchased),
        'warranty'=>trim($this->warranty),
        'remarks'=>trim($this->remarks)]);

        $this->resetInputFields();
    }

    public function deleteItem($id)
    {
        InventoryM::find($id)->delete();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Item deleted',
            'text' =>'Item record has been deleted',
        
        ]);
    }

    public function deleteConfirm($id){

        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' =>'The action cannot be undone',
            'id'=>$id,
        ]);

    }


    public function resetInputFields(){
        $this->category='';
        $this->name='';
        $this->serial_no='';
        $this->date_purchased='';
        $this->warranty='';
        $this->remarks='';

        return redirect(request()->header('Referer','no-referrer'));
    }
}
