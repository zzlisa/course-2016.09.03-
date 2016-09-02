<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\College;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CollegeController extends Controller
{
    // 学院列表 admin/college
    public function index() {
        $data = College::orderBy('college_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.college.index', compact('data'));
    }

    //添加学院信息 admin/college/create
    public function create() {
        return view('admin.college.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'college_id'=>'required',
              'college_name'=>'required',
            ];

            $message = [
                'college_id.required' => '学院编号不能为空',
                'college_name.required' => '学院名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = College::create($input);
                if($re){
                    return redirect('admin/college');
                } else{
                    return back()->with('errors','学院信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($col_id){
        $field = College::find($col_id);
        return view('admin.college.edit', compact('field'));
    }

    // 更新学院信息
    public function update($col_id){
        $input = Input::except('_token','_method');
        $re = College::where('col_id', $col_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/college');
        } else{
            return back()->with('errors','学院信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.college.index');
    }

    // 删除学院信息
    public function destroy($col_id){

        $re = College::where('col_id', $col_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '学院信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '学院信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
