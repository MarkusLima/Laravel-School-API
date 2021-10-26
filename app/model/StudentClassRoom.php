<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class StudentClassRoom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_room_id', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public static function listAll()
    {
        return StudentClassRoom::with('student', 'classRoom')->get();
    }

    public static function toCreate($request)
    {

        $validator = FacadesValidator::make($request, [
            'class_room_id' => 'required',
            'student_id' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }
        $verification = StudentClassRoom::where('class_room_id', $request['class_room_id'])->where('student_id', $request['student_id'])->first();
        if (!empty($verification)) {
            $class['id'] = $verification->id;
            $class['class_room_id'] = $request['class_room_id'];
            $class['student_id'] = $request['student_id'];

            StudentClassRoom::whereId($verification->id)->update($class);

            return [
                'success' => 'true',
                'entity' => $class,
                'msg' => 'updated successfully!'
            ];
        }

        $new_student_classes = new StudentClassRoom();
        $new_student_classes->class_room_id = $request['class_room_id'];
        $new_student_classes->student_id = $request['student_id'];
        $new_student_classes->save();

        return [
            'success' => 'true',
            'entity' => $new_student_classes,
            'msg' => 'success!'
        ];
    }

    public static function up($request, $id)
    {

        $validator = FacadesValidator::make($request, [
            'class_room_id' => 'required',
            'student_id' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $class['id'] = $id;
        $class['class_room_id'] = $request['class_room_id'];
        $class['student_id'] = $request['student_id'];

        StudentClassRoom::whereId($id)->update($class);

        return [
            'success' => 'true',
            'entity' => $class,
            'msg' => 'updated successfully!'
        ];
    }

    public static function del($id)
    {
        $class_room = StudentClassRoom::find($id);
        $class_room->delete();

        return [
            'success' => 'true',
            'entity' => $class_room,
            'msg' => 'deleted successfully'
        ];
    }

    public static function findById($id)
    {
        $class_room = StudentClassRoom::with('student', 'classRoom')->find($id);

        return [
            'success' => 'true',
            'entity' => $class_room,
            'msg' => 'show successfully'
        ];
    }
}
