<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{

    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'class';
    public $timestamps = false;
    protected $fillable = [
        'classes' ,
        'teacher',
        'assist_teacher',
        'no_student'     
    ];

    public function teachers(): HasMany{
        return $this->hasMany(Staff::class,'staff_id');
    }
}
