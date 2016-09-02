<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Classroom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class classroomController extends CommonController
{
    // 教室列表 admin/classroom
    public function index() {
        $data = Classroom::orderBy('classroom_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.classroom.index', compact('data'));
    }

    //添加教室信息 admin/classroom/create
    public function create() {
        return view('admin.classroom.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'classroom_id'=>'required',
              'classroom_name'=>'required',
            ];

            $message = [
                'classroom_id.required' => '教室编号不能为空',
                'classroom_name.required' => '教室名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Classroom::create($input);
                if($re){
                    return redirect('admin/classroom');
                } else{
                    return back()->with('errors','教室信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($clar_id){
        $field = Classroom::find($clar_id);
        return view('admin.classroom.edit', compact('field'));
    }

    // 更新教室信息
    public function update($clar_id){
        $input = Input::except('_token','_method');
        $re = Classroom::where('clar_id', $clar_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/classroom');
        } else{
            return back()->with('errors','教室信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.classroom.index');
    }

    // 删除教室信息
    public function destroy($clar_id){

        $re = Classroom::where('clar_id', $clar_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '教室信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '教室信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
