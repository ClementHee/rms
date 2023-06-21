<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Relationship;
use Illuminate\Support\Facades\DB;


class Siblingslist extends Component
{
    public function render()
    {
        return view('livewire.siblingslist')->layout('livewire.siblingslist-layout');
    }

    public function getData(){
        $x =  Student::get();
    
        $y = DB::SELECT('SELECT s1.* FROM students AS s1 JOIN (SELECT father, COUNT(*) as cnt FROM students WHERE father != 1 GROUP BY father HAVING cnt >1) AS s2 ON s1.`father` = s2.`father`;
        ');
        dd($y); 
    }
    
}
