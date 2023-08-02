<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Maintainence;
use Illuminate\Http\Request;

class MaintainenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $all_maintainence = Maintainence::orderby('reported_at','asc')->paginate (10);
        return view ('maintainence.maintainence',compact('all_maintainence'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_date = Carbon::now();

        return view('maintainence.create_maintainence', [
            'current_date' => $current_date,
    ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Maintainence::create([
            
            'issue' => ucwords($request->issue),
            'location' => $request->location,
            'reported_by' => $request->reportedby,
            'reported_at' => $request->reportedat
        ]);

        return redirect(route('maintainence.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route('maintainence.update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
        Maintainence::where('id',$id)->update([
            'fixed' => $request->fixed,

        ]);
        return redirect(route('maintainence.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
