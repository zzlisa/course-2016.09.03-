<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class StudentController extends CommonController
{
    // 学生列表 admin/student
    public function index() {
        $data = Student::orderBy('student_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.student.index', compact('data'));
    }

    //添加学生信息 admin/student/create
    public function create() {
        return view('admin.student.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'student_id'=>'required',
              'student_name'=>'required',
              'student_iid'=>'required',
            ];

            $message = [
                'student_id.required' => '学生学号不能为空',
                'student_name.required' => '学生姓名不能为空',
                'student_iid.required' => '身份证号不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Student::create($input);
                if($re){
                    return redirect('admin/student');
                } else{
                    return back()->with('errors','学生信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($stu_id){
        $field = Student::find($stu_id);
        return view('admin.student.edit', compact('field'));
    }

    // 更新学生信息
    public function update($stu_id){
        $input = Input::except('_token','_method');
        $re = Student::where('stu_id', $stu_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/student');
        } else{
            return back()->with('errors','学生信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.student.index');
    }

    // 删除学生信息
    public function destroy($stu_id){

        $re = Student::where('stu_id', $stu_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '学生信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '学生信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
