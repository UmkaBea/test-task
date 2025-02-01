<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'birth_date', 'class_id'];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}
