<html>
<head>
    <title>
        Export Data
    </title>
</head>
<body>
    <h1 class="text-center">Request book</h1>
    <div wire:poll.60s class="p-3 shadow-lg  bg-white border border-secondary rounded ">    
        <table cellspacing="5px" cellpadding="5px"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important;  width:100%">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Class By</th>
                <th>Purpose</th>
                <th>Item</th>
                <th>Date Needed</th>
                
            </tr>

            @foreach ($all_request as $request)

            <tr class='bg-opacity-50'>
        
    
  
            
                <td>{{ $request->date }}</td>
                <td>{{ $request->requested_by }}</td>
                <td>{{ $request->class }}</td>
                <td>{{ $request->purpose }}</td>
                <td>{{ $request->item." ".$request->item2 }}</td>
                <td>{{ $request->needed }}</td>
                
            </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>