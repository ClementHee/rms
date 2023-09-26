<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintainence extends Model
{
    use HasFactory;
    protected $table = 'maintainence';
    protected $primaryKey = 'issueNo';
    public $timestamps = false;
    protected $fillable = [
        'issue' ,
        'location',
        'reported_by',
        'reported_at',
        'remarks'
        
        
    ];
}
