<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ClassRoom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'level_education', 'serie', 'shift', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function studentClassRoom()
    {
        return $this->hasMany(StudentClassRoom::class);
    }

    public static function listAll()
    {
        return [
            'success' => 'true',
            'entity'=> ClassRoom::with('school')->get(),
            'msg' => 'success!'
        ];
    }

    public static function toCreate($request)
    {

        $validator = FacadesValidator::make($request, [
            'year' => 'required',
            'level_education' => 'required',
            'serie' => 'required',
            'shift' => 'required',
            'school_id' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $new_class = new ClassRoom();
        $new_class->year = $request['year'];
        $new_class->level_education = $request['level_education'];
        $new_class->serie = $request['serie'];
        $new_class->shift = $request['shift'];
        $new_class->school_id = $request['school_id'];
        $new_class->save();

        return [
            'success' => 'true',
            'entity'=> $new_class,
            'msg' => 'success!'
        ];
    }

    public static function up($request, $id)
    {

        $validator = FacadesValidator::make($request, [
            'year' => 'required',
            'level_education' => 'required',
            'serie' => 'required',
            'shift' => 'required',
            'school_id' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $class['id'] = $id;
        $class['year'] = $request['year'];
        $class['level_education'] = $request['level_education'];
        $class['serie'] = $request['serie'];
        $class['shift'] = $request['shift'];
        $class['school_id'] = $request['school_id'];

        ClassRoom::whereId($id)->update($class);

        return [
            'success' => 'true',
            'entity'=> $class,
            'msg' => 'updated successfully!'
        ];
    }

    public static function del($id)
    {
        $class_room = ClassRoom::find($id);
        $class_room->delete();

        return [
            'success' => 'true',
            'entity'=> $class_room,
            'msg' => 'deleted successfully'
        ];
    }

    public static function findById($id)
    {
        $class_room = ClassRoom::with('school', 'studentClassRoom')->find($id);
        $student_class_room = StudentClassRoom::with('student')->where('class_room_id', $id)->get();

        return [
            'success' => 'true',
            'entity'=> $class_room,
            'student_class_room' =>$student_class_room,
            'msg' => 'show successfully'
        ];
    }

    public static function findByName($name)
    {
        $class_room = ClassRoom::with('school')->where('year', 'like', '%'.$name.'%')->get();

        if(!empty($class_room[0])){
            return [
                'success' => 'true',
                'entity'=> $class_room,
                'msg' => 'search successfully'
            ];
        }else{
            return [
                'success' => 'true',
                'entity'=> $class_room,
                'msg' => 'not found'
            ];
        }

    }

    public static function findByIdSchoolClass($school_id)
    {
        $student_class_room = ClassRoom::where('school_id', $school_id)->get();

        return [
            'success' => 'true',
            'entity'=> $student_class_room,
            'msg' => 'show successfully'
        ];
    }
}
