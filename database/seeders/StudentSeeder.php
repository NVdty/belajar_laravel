<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


class StudentSeeder extends Seeder
{
    /**
      * Run the database seeds.
     */
    public function run(): void
    {
//        Schema::disableForeignKeyConstraints();
//        Student::truncate();
//        Schema::enableForeignKeyConstraints();

//        $data = [
//            ['name' => 'aiu', 'gender'=> 'P', 'nis'=>'0101001', 'class_id'=>'2'],
//            ['name' => 'bayu', 'gender'=> 'L', 'nis'=>'0101002', 'class_id'=>'2'],
//            ['name' => 'siti', 'gender'=> 'P', 'nis'=>'0101003', 'class_id'=>'1'],
//            ['name' => 'tono', 'gender'=> 'L', 'nis'=>'0101004', 'class_id'=>'3'],
//        ];

//        foreach($data as $value){
//         Student::insert([
//                'name'=> $value['name'],
//                'gender'=> $value['gender'],
//                'nis'=> $value['nis'],
//                'class_id'=> $value['class_id'],
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),

//            ]);
//    }
        Student::factory()->count(30)->create();
  }
}