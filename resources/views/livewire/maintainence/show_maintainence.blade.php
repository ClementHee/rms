<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.maintainence.update_issue')
    @else
        @include('livewire.maintainence.report_issue')
    @endif
    <h1 class="text-center">Maintainence book</h1>

    <div class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-sm text-center  ">
            <tr>
                <th>Issue No.</th>
                <th>Issue</th>
                <th>Location</th>
                <th>Reported By</th>
                <th>Time</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Seen</th>
                <th>Updated on</th>
                <th width="150px">Action</th>
            </tr>

            @foreach ($all_maintainence as $issues)
            
            <tr>
                <td>{{ $issues->issueNo }}</td>
                <td>{{ $issues->issue }}</td>
                <td>{{ $issues->location }}</td>
                <td>{{ $issues->reported_by }}</td>
                <td>{{ $issues->reported_at }}</td>
                
                <td>
                    @if($issues->fixed==false)
                        <button type="button" class="btn btn-danger">Not Fixed</button>
                    @else
                        <button type="button" class="btn btn-success">Fixed</button>
                    @endif
                </td>
                <td>
                    @if($issues->remarks==null)
                        <p>None</p>
                    @else
                        <p>{{$issues->remarks}}</p>
                    @endif
                </td>
                
                <td>
                    <form>
                        @if($issues->fixed==true)
                        
                            <button wire:click.prevent="mau({{ $issues->issueNo }})" class="btn btn-info">Mark as Unfixed</button>
                        @else
                        
                            <button wire:click.prevent="maf({{ $issues->issueNo }})" class="btn btn-info">Mark as Fixed</button>
                    
                        @endif
                    </form> 
                </td>
                
                <td>{{ $issues->updated_at }}</td>
                <td>
                <button wire:click="edit({{ $issues->issueNo }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $issues->issueNo }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>  

