<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Classe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ClasseController extends CommonController
{
    // 班级列表 admin/classe_exists(classe_name)
    public function index() {
        $data = Classe::orderBy('classe_id', 'asc')->paginate(8);
        // dd($data);
        return view('admin.classe.index', compact('data'));
    }

    //添加班级信息 admin/classe_exists(classe_name)/create
    public function create() {
        return view('admin.classe.add');
    }

    public function store() {
        $input = Input::except('_token');
        // dd($input);

        $rules = [
              'classe_id'=>'required',
              'classe_name'=>'required',
            ];

            $message = [
                'classe_id.required' => '班级编号不能为空',
                'classe_name.required' => '班级名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = Classe::create($input);
                if($re){
                    return redirect('admin/classe');
                } else{
                    return back()->with('errors','班级信息添加失败，请稍后重试');
                }

            } else{


                return back()->withErrors($validator);
            }
    }

    public function edit($cla_id){
        $field = Classe::find($cla_id);
        return view('admin.classe.edit', compact('field'));
    }

    // 更新班级信息
    public function update($cla_id){
        $input = Input::except('_token','_method');
        $re = Classe::where('cla_id', $cla_id)->update($input);
        if($re){
            // echo "<script>alert('信息更新成功');</script>";
            return redirect('admin/classe');
        } else{
            return back()->with('errors','班级信息更新失败，请稍后重试！');
        }
    }

    public function show() {
        return view('admin.classe.index');
    }

    // 删除班级信息
    public function destroy($cla_id){

        $re = Classe::where('cla_id', $cla_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '班级信息删除成功！'
            ];
        } else{
            $data = [
                'status' => 1,
                'msg' => '班级信息删除失败，请稍后重试！'
            ];
        }
        return $data;
    }
}
