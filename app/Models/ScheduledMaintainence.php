<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledMaintainence extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'scheduled_maintainence';
    protected $primaryKey = 'maintainence_no';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'issue' ,
        'recurrences',
        'days',
        'scheduled_date'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->maintainence_no = 'SM' .  strval(rand(10000,99999));;
        });
    }
}
