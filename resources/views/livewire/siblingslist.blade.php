<div>
<h1> Siblings List</h1>
    
<button wire:click="exportPDF()" class="btn btn-info">
    Export</button> 
<div class="row">
@php
$prevItem = null

@endphp
@foreach($siblings as $sibling)
    
  
    @if ($prevItem!==null)
 
        @if ((($sibling->father)==($prevItem->father)) ||(($sibling->mother)==($prevItem->mother)) )
            <tr>
                <td>
                    {{$sibling->fullname}}
                </td>
                <td>
                    @if ( $sibling->j3_class !="")
                        {{ $sibling->j3_class}}
                    @elseif( $sibling->j2_class !="")
                        {{ $sibling->j2_class}}
                    @elseif($sibling->j1_class)
                        {{ $sibling->j1_class}}
                    @else
                        Not Assigned
                    @endif
                </td>
            </tr>

        @else
        </table></div>
        <br>
        <div class="col-4">
            <table cellspacing="0" cellpadding="0"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important;  width:100%">
            <tr ><td class="col-3">{{$sibling->fullname}}</td>
                <td class="col-3">
                    @if ( $sibling->j3_class !="")
                        {{ $sibling->j3_class}}
                    @elseif( $sibling->j2_class !="")
                        {{ $sibling->j2_class}}
                    @elseif($sibling->j1_class)
                        {{ $sibling->j1_class}}
                    @else
                        Not Assigned
                    @endif
                </td>
        @endif
    @else
        <div class='col-4'>
        <table cellspacing="0" cellpadding="0"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important; width:100%" >
            <tr>
                <td class="col-3" >{{$sibling->fullname}}</td>
                <td class="col-3">
                    @if ( $sibling->j3_class !="")
                        {{ $sibling->j3_class}}
                    @elseif( $sibling->j2_class !="")
                        {{ $sibling->j2_class}}
                    @elseif($sibling->j1_class)
                        {{ $sibling->j1_class}}
                    @else
                        Not Assigned
                    @endif
                </td>
            </tr>

    @endif
 
 @php
     $prevItem =$sibling
 @endphp

@endforeach
        </div>
</div>