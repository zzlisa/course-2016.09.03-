<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class TeacherController extends CommonController
{
    // 教师列表 admin/teacher
    public function index() {
        $data = Teacher::orderBy('teacher_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.teacher.index', compact('data'));
    }

    //添加教师信息 admin/teacher/create
    public function create() {
        return view('admin.teacher.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'teacher_id'=>'required',
              'teacher_name'=>'required',
              'college_id'=>'required',
            ];

            $message = [
                'teacher_id.required' => '教师编号不能为空',
                'teacher_name.required' => '教师姓名不能为空',
                'college_id.required' => '学院编号不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Teacher::create($input);
                if($re){
                    return redirect('admin/teacher');
                } else{
                    return back()->with('errors','教师信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($teach_id){
        $field = Teacher::find($teach_id);
        return view('admin.teacher.edit', compact('field'));
    }

    // 更新教师信息
    public function update($teach_id){
        $input = Input::except('_token','_method');
        $re = Teacher::where('teach_id', $teach_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/teacher');
        } else{
            return back()->with('errors','教师信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.teacher.index');
    }

    // 删除教师信息
    public function destroy($teach_id){

        $re = Teacher::where('teach_id', $teach_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '教师信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '教师信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
