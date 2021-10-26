<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'total_students'
    ];

    public function classRoom()
    {
        return $this->hasMany(ClassRoom::class);
    }

    public static function listAll()
    {
        return [
            'success' => 'true',
            'entity'=> School::all(),
            'msg' => 'success!'
        ];
    }

    public static function toCreate($request)
    {

        $validator = FacadesValidator::make($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $new_school = new School;
        $new_school->name = $request['name'];
        $new_school->address = $request['address'];
        $new_school->total_students = 0;
        $new_school->save();

        return [
            'success' => 'true',
            'entity'=> $new_school,
            'msg' => 'success!'
        ];
    }

    public static function up($request, $id)
    {

        $validator = FacadesValidator::make($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => 'false',
                'msg' => $validator->errors()
            ];
        }

        $school['id'] = $id;
        $school['name'] = $request['name'];
        $school['address'] = $request['address'];

        School::whereId($id)->update($school);

        return [
            'success' => 'true',
            'entity'=> $school,
            'msg' => 'updated successfully!'
        ];
    }

    public static function del($id)
    {
        $school = School::find($id);
        $school->delete();

        return [
            'success' => 'true',
            'entity'=> $school,
            'msg' => 'deleted successfully'
        ];
    }

    public static function findById($id)
    {
        $school = School::find($id);

        return [
            'success' => 'true',
            'entity'=> $school,
            'msg' => 'show successfully'
        ];
    }

    public static function findByName($name)
    {
        $school = School::where('name', 'like', '%'.$name.'%')->get();
        
        if(!empty($school[0])){
            return [
                'success' => 'true',
                'entity'=> $school,
                'msg' => 'search successfully'
            ];
        }else{
            return [
                'success' => 'true',
                'entity'=> $school,
                'msg' => 'not found'
            ];
        }

    }

}
