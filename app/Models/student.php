<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;

    //syarat mass asignment
    protected $fillable= [
        'name',
        'gender',
        'nis',
        'class_id',
    ];
    
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    //many to many relation
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
    // // protected $table = 'students';
    // protected $fillable = [
    //     'name', 'gender', 'nis', 'class_id'
    // ];
}
