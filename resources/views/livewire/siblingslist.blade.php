<div>
<h1> Siblings List</h1>
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
        </table>
        <br>
            <table class="table table-bordered" style="border: 3px solid black !important;  width:30%">
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

        <table class="table table-bordered" style="border: 3px solid black !important; width:30%" >
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