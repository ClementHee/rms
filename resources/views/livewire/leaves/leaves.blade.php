<div>
    <button wire:click=applyNew() class="btn btn-primary">Apply Leave</button>
    <div class="card">
        <div class="card-body">
            <button wire:click="fillPDF()">Click Me</button>
            <table>
                <tr>
                    <th>Staff</th>
                    <th>Dates</th>
                </tr>
                @forelse($leaves as $leave)
                
                <tr>
                    
                    <td>
                        {{$leave->fullname}}
                    </td>
                    <td>
                        {{$leave->date_start}} - {{$leave->date_end}}
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
    @endif
    
</div>