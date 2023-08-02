<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;
use Illuminate\Support\Facades\DB;


class Siblingslist extends Component
{
    public function render()
    {  $siblings = DB::SELECT(
        'SELECT s1.* FROM students AS s1 JOIN (SELECT father, COUNT(*) as cnt FROM students  GROUP BY father HAVING cnt >1) AS s2 ON s1.`father` = s2.`father` INTERSECT  SELECT s3.* FROM students AS s3 JOIN (SELECT mother, COUNT(*) as cnt FROM students  GROUP BY mother HAVING cnt >1) AS s4 ON s3.`mother` = s4.`mother`; ');

        return view('livewire.siblingslist',['siblings',$siblings])->layout('livewire.siblingslist-layout');
    }

    public function getData(){
      }
    
}
