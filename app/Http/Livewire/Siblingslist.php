<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;
use Illuminate\Support\Facades\DB;
use PDF;

class Siblingslist extends Component
{
    public function render()
    {  
        DB::SELECT('CREATE OR REPLACE VIEW active_students AS SELECT students.* FROM students WHERE students.status="active"');
        
        $siblings = DB::SELECT(
        'SELECT s1.* FROM active_students AS s1 JOIN 
        (SELECT father, COUNT(*) as cnt FROM active_students  GROUP BY father HAVING cnt >1 )
        AS s2 ON s1.`father` = s2.`father` 
        INTERSECT  
        SELECT s3.* FROM active_students AS s3 JOIN 
        (SELECT mother, COUNT(*) as cnt FROM active_students  GROUP BY mother HAVING cnt >1) 
        AS s4 ON s3.`mother` = s4.`mother`; ');
       
       
        return view('livewire.siblingslist',['siblings'=>$siblings])->layout('livewire.siblingslist-layout');
    }
    public function exportPDF(){

        $siblings = DB::SELECT(
            'SELECT s1.* FROM active_students AS s1 JOIN 
            (SELECT father, COUNT(*) as cnt FROM active_students  GROUP BY father HAVING cnt >1)
            AS s2 ON s1.`father` = s2.`father` 
            INTERSECT  SELECT s3.* FROM active_students AS s3 JOIN 
            (SELECT mother, COUNT(*) as cnt FROM active_students  GROUP BY mother HAVING cnt >1) 
            AS s4 ON s3.`mother` = s4.`mother`; ');

        $data = ['siblings'=>$siblings];
    
        
        $pdf = PDF::loadView('livewire.export_sibling_list', $data)->setPaper('a4', 'potrait')->output(); //
        return response()->streamDownload(
            fn() => print($pdf), 'Siblings List.pdf'
        );
        
    }
   
    
}
