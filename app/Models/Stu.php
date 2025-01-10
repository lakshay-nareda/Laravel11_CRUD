<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stu extends Model
{
    // Specify the table associated with the model (optional if it matches the plural of the model name)
    protected $table = 'stu';

    // Specify the attributes that are mass assignable
    protected $fillable = ['stu_name', 'stu_email', 'stu_contact'];

    // (Optional) Disable timestamps if you don't need them
    // public $timestamps = false;
}
