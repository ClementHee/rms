<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
