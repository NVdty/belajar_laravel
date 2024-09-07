<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;
    
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    // // protected $table = 'students';
    // protected $fillable = [
    //     'name', 'gender', 'nis', 'class_id'
    // ];
}
