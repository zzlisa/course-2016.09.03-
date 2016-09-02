<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Plan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class planController extends CommonController
{
    // 教学计划列表 admin/plan
    public function index() {
        $data = Plan::orderBy('plan_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.plan.index', compact('data'));
    }

    //添加教学计划信息 admin/plan/create
    public function create() {
        return view('admin.plan.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'plan_id'=>'required',
            ];

            $message = [
                'plan_id.required' => '教学计划编号不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Plan::create($input);
                if($re){
                    return redirect('admin/plan');
                } else{
                    return back()->with('errors','教学计划信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($pl_id){
        $field = Plan::find($pl_id);
        return view('admin.plan.edit', compact('field'));
    }

    // 更新教学计划信息
    public function update($pl_id){
        $input = Input::except('_token','_method');
        $re = Plan::where('pl_id', $pl_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/plan');
        } else{
            return back()->with('errors','教学计划信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.plan.index');
    }

    // 删除教学计划信息
    public function destroy($pl_id){

        $re = Plan::where('pl_id', $pl_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '教学计划信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '教学计划信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
