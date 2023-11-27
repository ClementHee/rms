<div>
    <button wire:click=applyNew() class="btn btn-primary">Apply Leave</button>
    <div class="card">
        <div class="card-body">
            
            <table>
                <tr>
                    <th>Staff</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
                @forelse($leaves as $leave)
                
                <tr>
                    
                    <td>
                        {{$leave->fullname}}
                    </td>
                    <td>
                        {{$leave->date_start}} - {{$leave->date_end}}
                    </td>
                    
                    <td>
                        <button type="button"  wire:click="viewLeave('{{$leave->leave_id}}')" class="btn btn-primary">
                            View
                        </button>
                        @if (in_array('EMT',Auth::user()->getRoleNames()->toArray()))
                        <button type="button"  wire:click="deleteConfirm('{{$leave->leave_id}}')" class="btn btn-danger">
                            Delete
                        </button>
                        @endif
                    </td>
                
                    
                </tr>
                @empty
                <tr>
                    <td>
                        Nothing to Show
                    </td>
                </tr>
                
                @endforelse
            </table>
        </div>
    </div>
    @if ($this->mode=='apply')
        @include('livewire.leaves.apply_leave')
    @elseif ($this->mode=='single')
        @include('livewire.leaves.view_leave_application')
    @endif

    
</div>