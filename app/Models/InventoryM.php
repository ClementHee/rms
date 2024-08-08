<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryM extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'category',
        'name',
        'serial_no',
        'date_purchased',
        'warranty',
        'remarks'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->product_id = 'A' .  strval(rand(10000,99999));;
        });
    }
}
