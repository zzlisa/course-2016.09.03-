<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\profess;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class professController extends CommonController
{
    // 专业列表 admin/profess
    public function index() {
        $data = profess::orderBy('profess_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.profess.index', compact('data'));
    }

    //添加专业信息 admin/profess/create
    public function create() {
        return view('admin.profess.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'profess_id'=>'required',
              'profess_name'=>'required',
            ];

            $message = [
                'profess_id.required' => '专业编号不能为空',
                'profess_name.required' => '专业名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = profess::create($input);
                if($re){
                    return redirect('admin/profess');
                } else{
                    return back()->with('errors','专业信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($pro_id){
        $field = profess::find($pro_id);
        return view('admin.profess.edit', compact('field'));
    }

    // 更新专业信息
    public function update($pro_id){
        $input = Input::except('_token','_method');
        $re = profess::where('pro_id', $pro_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/profess');
        } else{
            return back()->with('errors','专业信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.profess.index');
    }

    // 删除专业信息
    public function destroy($pro_id){

        $re = profess::where('pro_id', $pro_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '专业信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '专业信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
