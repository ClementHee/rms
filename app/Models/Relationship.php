<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Relationship extends Model
{
    use HasFactory;
    protected $table = 'relationship';

    public $timestamps = false;
    protected $fillable = [
            'student',
            'father',
            'mother'
    ];

    public static function enrolType()
    {
        return Student::select('type')->distinct('type')->get();
    }

    public static function religion()
    {
        return Student::select('religion')->distinct('religion')->get();
    }
}
