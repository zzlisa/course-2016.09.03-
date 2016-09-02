<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Model\Classroom;
use App\Http\Model\Student;
use App\Http\Model\Teacher;
use App\Http\Model\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends ScommonController
{
    public function classroom() {
        $input = Input::except('_token');
        $classroomlist = Classroom::all();
        $classroom_id = '';
        // dd($classroomlist);
        if($input) {
            // echo $input['classroom_id'];
            // dd($input);
            $classroom_id = $input['classroom_id'];

            $classroom = DB::table('classroom')->where('classroom_name', '=', $classroom_id)->get();
            // dd($classroom);
            if(!empty($classroom)) {
                $classroomlist = DB::table('classroom')
                                ->join('sche', 'classroom.classroom_id', '=', 'sche.classroom_id')
                                ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                                ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                                ->join('profess', 'classe.profess_id', '=', 'profess.profess_id')
                                ->join('course', 'sche.course_id', '=', 'course.course_id')
                                ->join('college', 'profess.college_id', '=', 'college.college_id')
                                ->where('classroom.classroom_name', '=', $classroom_id)
                                ->get();
        // dd($classroomlist);
            return view ('home.sclassroom', compact('classroomlist', 'classroom_id'));
        }

        else {
            return back()->with('msg', '没有此教室信息');
        }
    }
        return view ('home.sclassroom', compact('classroomlist', 'classroom_id'));
    }

    public function student() {
        $input = Input::except('_token');
        // dd($input);
        $studentlist = Student::all();
        // dd($studentlist);
        $student_id = '';

        if($input) {
            $student_id = $input['student_id'];
            // echo $student_id;
            // dd($input);
            $student = DB::table('student')->where('student_name', '=', $student_id)->get();
            // dd($student);
            if(!empty($student)) {
                $studentlist = DB::table('student')
                                ->join('classe', 'student.classe_id', '=', 'classe.classe_id')
                                ->join('sche', 'classe.classe_id', '=', 'sche.classe_id')
                                ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                                ->join('course', 'sche.course_id', '=', 'course.course_id')
                                ->join('profess', 'classe.profess_id', '=', 'profess.profess_id')
                                ->join('college', 'profess.college_id', '=', 'college.college_id')
                                ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                                ->where('student.student_name', '=', $student_id)
                                ->get();
                // dd($studentlist);
                return view ('home.sstudent', compact('studentlist', 'student_id'));
            }

            else {
                return back()->with('msg', '没有此学生信息');
            }
        }

        return view ('home.sstudent', compact('studentlist', 'student_id'));
    }

    public function teacher() {
        $input = Input::except('_token');
        // dd($input);
        $teacherlist = Teacher::all();
        // dd($teacherlist);
        $teacher_id = '';

        if($input) {
            $teacher_id = $input['teacher_id'];
            // echo $teacher_id;
            // dd($input);
            $teacher = DB::table('teacher')->where('teacher_name', '=', $teacher_id)->get();
            // dd($teacher);
            if(!empty($teacher)) {
                $teacherlist = DB::table('teacher')
                                ->join('sche', 'teacher.teacher_id', '=', 'sche.teacher_id')
                                ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                                ->join('course', 'sche.course_id', '=', 'course.course_id')
                                ->join('profess', 'classe.profess_id', '=', 'profess.profess_id')
                                ->join('college', 'teacher.college_id', '=', 'college.college_id')
                                ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                                ->where('teacher.teacher_name', '=', $teacher_id)
                                ->get();
                // dd($teacherlist);
                return view ('home.steacher', compact('teacherlist', 'teacher_id'));
            }

            else {
                return back()->with('msg', '没有此教师信息');
            }
        }

        return view ('home.steacher', compact('teacherlist', 'teacher_id'));
    }

    public function course() {
        $input = Input::except('_token');
        // dd($input);
        $courselist = Course::all();
        // dd($teacherlist);
        $course_id = '';

        if($input) {
            $course_id = $input['course_id'];
            // echo $course_id;
            // dd($input);
            $course = DB::table('course')->where('course_name', '=', $course_id)->get();
            // dd($course);
            if(!empty($course)) {
                $courselist = DB::table('course')
                                ->join('sche', 'course.course_id', '=', 'sche.course_id')
                                ->join('classe', 'sche.classe_id', '=', 'classe.classe_id')
                                ->join('teacher', 'sche.teacher_id', '=', 'teacher.teacher_id')
                                ->join('profess', 'classe.profess_id', '=', 'profess.profess_id')
                                ->join('college', 'profess.college_id', '=', 'college.college_id')
                                ->join('classroom', 'sche.classroom_id', '=', 'classroom.classroom_id')
                                ->where('course.course_name', '=', $course_id)
                                ->get();
                // dd($courselist);
                return view ('home.scourse', compact('courselist', 'course_id'));
            }

            else {
                return back()->with('msg', '没有此课程信息');
            }
        }

        return view ('home.scourse', compact('courselist', 'course_id'));
    }
}