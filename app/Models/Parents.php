<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $primaryKey = 'parent_id';
    public $timestamps = false;
    protected $fillable = [
            'name',
            'ic_no',
            'occupation',
            'parents',
            'company_name',
            'company_add',
            'email',
            'tel'
    ];
}