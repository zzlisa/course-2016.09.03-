<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class courseController extends CommonController
{
    // 课程列表 admin/course
    public function index() {
        $data = Course::orderBy('course_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.course.index', compact('data'));
    }

    //添加课程信息 admin/course/create
    public function create() {
        return view('admin.course.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'course_id'=>'required',
              'course_name'=>'required',
            ];

            $message = [
                'course_id.required' => '课程编号不能为空',
                'course_name.required' => '课程名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Course::create($input);
                if($re){
                    return redirect('admin/course');
                } else{
                    return back()->with('errors','课程信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($cour_id){
        $field = Course::find($cour_id);
        return view('admin.course.edit', compact('field'));
    }

    // 更新课程信息
    public function update($cour_id){
        $input = Input::except('_token','_method');
        $re = Course::where('cour_id', $cour_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/course');
        } else{
            return back()->with('errors','课程信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.course.index');
    }

    // 删除课程信息
    public function destroy($cour_id){

        $re = Course::where('cour_id', $cour_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '课程信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
