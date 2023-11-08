<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    protected $primaryKey = 'staff_id';
    
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'fullname',
        'dob',
        'nric',
        'birth_cert_no',
        'gender',
        'race',
        'nationality',    
        'religion',
        'home_add',
        'home_tel',
        'hp_no',
        'email',
        'marital_status',
        'socso',
        'epf',
        'allergies',
        'spouse',
        'spouse_dob',
        'spouse_nric',
        'spouse_race',
        'spouse_religion',
        'spouse_nationality',
        'spouse_occupation',
        'spouse_comp',
        'spouse_hp',
        'spouse_office_no',
        'qualification',
        'other',
        'days_entitled',
        'days_left',
        'days_available'
    ];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->staff_id = 'RS' . strval(rand(100000,999999));
        });
    }

    public function class():BelongsTo{
        return $this->belongsTo(Classes::class,'class_id');
    }
}
