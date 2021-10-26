<?php

use App\model\ClassRoom;
use App\model\School;
use App\model\Student;
use App\model\StudentClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            //code...
            DB::beginTransaction();

            $school = factory(School::class, 5)->make()->toArray();

            print_r($school);

            foreach ($school as $key => $value) {
                $new_school = School::create($value);

                print_r($new_school);

                for ($i=0; $i < 10; $i++) { 
                    $class = factory(ClassRoom::class)->make()->toArray();
                    $new_class = ClassRoom::create($class);
                    ClassRoom::whereId($new_class->id)->update(['school_id'=> $new_school->id]);

                    for ($i=0; $i < 20; $i++) { 
                        $student = factory(Student::class)->make()->toArray();
                        $new_student = Student::create($student);

                        StudentClassRoom::create([
                           'class_room_id'=> $new_class->id,
                           'student_id'=> $new_student->id
                        ]);
  
                    }
                }
            }
  
    
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}
