<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'dt_birth', 'genre'
    ];

    public function studentClassRoom()
    {
        return $this->hasMany(StudentClassRoom::class);
    }

    public static function listAll()
    {
        return [
            'success' => 'true',
            'entity'=> Student::all(),
            'msg' => 'success!'
        ];
    }

    public static function toCreate($request)
    {

        $validator = FacadesValidator::make($request, [
            'name' => 'required',
            //'phone' => 'required',
            'email' => 'required',
            //'dt_birth' => 'required',
            //'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $new_class = new Student();
        $new_class->name = $request['name'];
        $new_class->phone = !empty($request['phone']) ? $request['phone'] : '';
        $new_class->email = $request['email'];
        $new_class->dt_birth = !empty($request['dt_birth'] ) ? $request['dt_birth'] : '';
        $new_class->genre = !empty($request['genre']) ? $request['genre'] : '';
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
            'name' => 'required',
            //'phone' => 'required',
            'email' => 'required',
            //'dt_birth' => 'required',
            //'genre' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $class['id'] = $id;
        $class['name'] = $request['name'];
        $class['phone'] = !empty($request['phone']) ? $request['phone'] : '';
        $class['email'] = $request['email'];
        $class['dt_birth'] = !empty($request['dt_birth']) ? $request['dt_birth'] : '';
        $class['genre'] = !empty($request['genre']) ? $request['genre'] : '';

        Student::whereId($id)->update($class);

        return [
            'success' => 'true',
            'entity'=> $class,
            'msg' => 'updated successfully!'
        ];
    }

    public static function del($id)
    {
        $student = Student::find($id);
        $student->delete();

        return [
            'success' => 'true',
            'entity'=> $student,
            'msg' => 'deleted successfully'
        ];
    }

    public static function findById($id)
    {
        $student = Student::find($id);

        return [
            'success' => 'true',
            'entity'=> $student,
            'msg' => 'show successfully'
        ];
    }

    public static function findByName($name)
    {
        $student = Student::where('name', 'like', '%'.$name.'%')->get();

        if(!empty($student)){
            return [
                'success' => 'true',
                'entity'=> $student,
                'msg' => 'search successfully'
            ];
        }else{
            return [
                'success' => 'true',
                'entity'=> $student,
                'msg' => 'not found'
            ];
        }

    }
}
