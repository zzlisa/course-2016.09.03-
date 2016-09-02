<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SelectController extends Controller
{

    //查询教室
    public function classroom() {
        $input = Input::except('_token');
        $sche_week = '';
        $schelist = DB::table('sche')
                        ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                        ->select('sche.*', 'classroom.*')
                        ->get();
        $classroom_id = '';
        // dd($schelist);
        $classroomlist = DB::table('classroom')->get();

        if(!empty($input)) {
            $sche_week = $input['sche'];
            // echo $sche_week;
            $classroom_id = $input['classroom'];
            // echo $classroom_id;
            // dd($input);
            $schelist=DB::table('sche')
                        ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                        ->select('sche.*', 'classroom.*')
                        ->where('sche_week', '=', $sche_week)
                        ->get();
            // dd($schelist);
            $classroomlist=DB::table('sche')
                            ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                            ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                            ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                            ->join('course', 'sche.course_id', '=', 'course.course_id')
                            ->join('college', 'teacher.college_id', '=', 'college.college_id')
                            ->select('sche.*', 'classroom.*', 'teacher.*', 'classe.*', 'course.*', 'college.*')
                            ->where('sche.classroom_id', '=', $classroom_id)
                            ->get();
            // dd($classroomlist);
            return view('home.classroom', compact('schelist', 'sche_week', 'classroomlist', 'classroom_id'));
        }
        return view('home.classroom', compact('schelist', 'sche_week', 'classroomlist', 'classroom_id'));
    }

    //查询教师
    public function teacher() {
        $input = Input::except('_token');
        $sche_week = '';
        $schelist = DB::table('sche')
                        ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                        ->select('sche.*', 'teacher.*')
                        ->get();
        // dd($schelist);
        $teacher_id = '';
        $teacherlist = DB::table('teacher')->get();
        if(!empty($input)) {
            $sche_week = $input['sche'];
            // echo $sche_week;
            $teacher_id = $input['teacher'];
            // echo $classroom_id;
            // dd($input);
            $schelist=DB::table('sche')
                        ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                        ->select('sche.*', 'teacher.*')
                        ->where('sche_week', '=', $sche_week)
                        ->get();
            // dd($schelist);
            $teacherlist=DB::table('sche')
                            ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                            ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                            ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                            ->join('course', 'sche.course_id', '=', 'course.course_id')
                            ->join('college', 'teacher.college_id', '=', 'college.college_id')
                            ->select('sche.*', 'classroom.*', 'teacher.*', 'classe.*', 'course.*', 'college.*')
                            ->where('sche.teacher_id', '=', $teacher_id)
                            ->get();
            // dd($teacherlist);
            return view('home.teacher', compact('schelist', 'sche_week', 'teacherlist', 'teacher_id'));
        }
        return view('home.teacher', compact('schelist', 'sche_week', 'teacherlist', 'teacher_id'));
    }

    //查询课程
    public function course() {
        $input = Input::except('_token');
        $sche_week = '';
        $schelist = DB::table('sche')
                        ->join('course', 'sche.course_id', '=', 'course.course_id')
                        ->select('sche.*', 'course.*')
                        ->get();
        // dd($schelist);
        $course_id = '';
        $courselist = DB::table('course')->get();
        if(!empty($input)) {
            $sche_week = $input['sche'];
            // echo $sche_week;
            $course_id = $input['course'];
            // echo $classroom_id;
            // dd($input);
            $schelist=DB::table('sche')
                        ->join('course', 'sche.course_id', '=', 'course.course_id')
                        ->select('sche.*', 'course.*')
                        ->where('sche_week', '=', $sche_week)
                        ->get();
            // dd($schelist);
            $courselist=DB::table('sche')
                            ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                            ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                            ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                            ->join('course', 'sche.course_id', '=', 'course.course_id')
                            ->join('college', 'teacher.college_id', '=', 'college.college_id')
                            ->select('sche.*', 'classroom.*', 'teacher.*', 'classe.*', 'course.*', 'college.*')
                            ->where('sche.course_id', '=', $course_id)
                            ->get();
            // dd($courselist);
            return view('home.course', compact('schelist', 'sche_week', 'courselist', 'course_id'));
        }
        return view('home.course', compact('schelist', 'sche_week', 'courselist', 'course_id'));
    }

    //查询班级
    public function classe() {
        $input = Input::except('_token');
        $sche_week = '';
        $schelist = DB::table('sche')
                        ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                        ->select('sche.*', 'classe.*')
                        ->get();
        // dd($schelist);
        $classe_id = '';
        $classelist = DB::table('classe')->get();
        if(!empty($input)) {
            $sche_week = $input['sche'];
            // echo $sche_week;
            $classe_id = $input['classe'];
            // echo $classroom_id;
            // dd($input);
            $schelist=DB::table('sche')
                        ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                        ->select('sche.*', 'classe.*')
                        ->where('sche_week', '=', $sche_week)
                        ->get();
            // dd($schelist);
            $classelist=DB::table('sche')
                            ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                            ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                            ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                            ->join('course', 'sche.course_id', '=', 'course.course_id')
                            ->join('college', 'teacher.college_id', '=', 'college.college_id')
                            ->select('sche.*', 'classroom.*', 'teacher.*', 'classe.*', 'course.*', 'college.*')
                            ->where('sche.classe_id', '=', $classe_id)
                            ->get();
            // dd($classelist);
            return view('home.classe', compact('schelist', 'sche_week', 'classelist', 'classe_id'));
        }
        return view('home.classe', compact('schelist', 'sche_week', 'classelist', 'classe_id'));
    }
}

