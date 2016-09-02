<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Student;

class LoginController extends CommonController
{
    public function login() {
        $input = Input::All();

        if($input) {
            $username = $input['username'];
            $password = $input['userpass'];
            $_name = $input['user'];
            echo $_name;

            if($_name == 'u_name') {
                $userer = DB::select("select * from user where user_pass='$password' and user_name='$username'");
                // dd($student);
                if(empty($userer)) {
                    return back()->with('msg', '用户名密码错误');
                }

                session(['username'=>$username,
                        'uname'=>$_name,
                    ]);
                // dd(session('username'));
                return redirect('admin/index');
            }

            if($_name == 't_name') {
                $teacher = DB::select("select * from teacher where teacher_id='$password' and teacher_name='$username'");
                // dd($student);
                if(empty($teacher)) {
                    return back()->with('msg', '用户名密码错误');
                }

                session(['username'=>$username,
                        'uname'=>$_name,
                    ]);
                // dd(session('username'));
                return redirect('admin/index');
            }

            if($_name == 's_name') {
                $student = DB::select("select * from student where student_id='$password' and student_name='$username'");
                // dd($student);
                if(empty($student)) {
                    return back()->with('msg', '用户名密码错误');
                }

                session(['username'=>$username,
                        'uname'=>$_name,
                    ]);
                // dd(session('username'));
                return redirect('admin/index');
            }

            else {
                echo "cuowu";
            }
        }

        else {
            session(['username'=>null]);
            return view('admin.login');
        }
    }
}
