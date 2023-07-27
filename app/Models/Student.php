<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    public $timestamps = false;
    protected $fillable = [
            'enrolment_date', 
            'referral', 
            'reasons', 
            'pref_pri_sch',
            'entry_year',
            'type',
            'first_name',
            'last_name',
            'gender',
            'dob',
            'birth_cert_no',
            'mykid',
            'pos_in_family',
            'race',
            'nationality',
            'prev_kindy',
            'no_years',
            'religion',
            'home_add',
            'poscode',
            'state',
            'country',
            'district',
            'home_lang',
            'home_tel',
            'father',
            'mother',
            'e_contact',
            'e_contact_hp',
            'e_contact2',
            'e_contact2_hp',
            'fam_doc',
            'fam_doc_hp',
            'allergies',
            'others',
            'potential',
            'j1_class',
            'j2_class',
            'j3_class',
            'aft_j1_class',
            'aft_j2_class',
            'aft_j3_class',
            'time_to_sch',
            'carplate',
            'status',
            'chinese_name',
            'signature'
    ];

   
}
