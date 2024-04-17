<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'to_do_list';
    protected $primaryKey = 'task_no';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'task',
        'status',
        'date',
        'days'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->task_no = 'TL' .  strval(rand(10000,99999));;
        });
    }
}

