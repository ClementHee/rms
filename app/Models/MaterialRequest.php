<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    use HasFactory;

    protected $table = 'materialrequests';
    protected $primaryKey = 'request_id';
    public $timestamps = false;
    protected $fillable = [
        'date',
        'requested_by',
        'class',
        'purpose',
        'item',
        'needed',
        'fulfilled'

    ];

}
