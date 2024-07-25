<div>
  @if($mode=="view")
    <h1>Parent Dashboard</h1>
    @include('livewire.parent.list_parent')
  @else    

    @if($mode=="view_single")
      <h1>View Parent</h1>
    @elseif($mode=="update")
      <h1>Update Parent</h1>
    @else
      <h1>Create Parent</h1>
    @endif

  @include('livewire.parent.parent_form')   
  @endif
</div>
