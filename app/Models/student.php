<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    //syarat mass asignment
    protected $fillable= [
        'name',
        'gender',
        'nis',
        'class_id',
        'image',
        'slug',
    ];


    public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'name'
            ]
            ];
    }
    
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
