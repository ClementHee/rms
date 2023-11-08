<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';
    protected $primaryKey = 'leave_id';
    public $timestamps = false;
    protected $fillable = [
        
        'staff_id',
        'position',
        'class_name',
        'leave_type',
        'no_days',
        'date_start',
        'date_end',
        'reasons',
        'days_entitled',
        'days_available',
        'days_left'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->leave_id = 'L' . ($model::count() + 1)*1000;
        });
    }
}
