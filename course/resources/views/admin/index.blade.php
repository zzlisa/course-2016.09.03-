@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
                <tr>
                    <th><h3>Look</h3></th>
                    <th><h3>Select</h3></th>
                </tr>
                <tr>
                    <td>
                        <div><a href="{{url('admin/classe')}}">查看班级表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/classe')}}">按照星期查询班级信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div><a href="{{url('admin/classroom')}}">查看教室表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/classroom')}}">按照星期查询教室信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div><a href="{{url('admin/college')}}">查看学院表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/teacher')}}">按照星期查询教师信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div><a href="{{url('admin/course')}}">查看课程表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/course')}}">按照星期查询课程信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div><a href="{{url('admin/profess')}}">查看专业表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/sclassroom')}}">搜索查询教室信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="s_name">
                        <div><a href="{{url('admin/student')}}">查看学生表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/sstudent')}}">搜索查询学生信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="s_name t_name">
                        <div><a href="{{url('admin/plan')}}">查看教学计划表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/scourse')}}">搜索查询课程信息</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="s_name t_name">
                        <div><a href="{{url('admin/teacher')}}">查看教师表信息</a></div>
                    </td>
                    <td>
                        <div><a href="{{url('home/steacher')}}">搜索查询教师信息</a></div>
                    </td>
                </tr>
            </table>
            </div>
        </div>

        <!-- <div class="col-md-4 index_right">
            <div class="row">
            <div class="col-md-12">
                查询助手
                <hr/>
            </div>
            </div>

            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <img src="{{url('resources/views/admin/images/index_01.png')}}" class="img-responsive img-circle" alt="郑州师范学院">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <p>
                    如果你是郑州师范学院的学生，你可以查看班级信息，以及你自己的课表信息教室信息等，具体内容请以显示为准！
                </p>
            </div>
            </div>
            <hr/>

            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <img src="{{url('resources/views/admin/images/index_01.png')}}" class="img-responsive img-circle" alt="郑州师范学院">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <p>
                    如果你是郑州师范学院的老师，你可以查看班级信息，以及你自己的课表信息教室信息等，具体内容请以显示为准！
                </p>
            </div>
            </div>
            <hr/>

            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <img src="{{url('resources/views/admin/images/index_01.png')}}" class="img-responsive img-circle" alt="郑州师范学院">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8">
                <p>
                    如果你是郑州师范学院的管理员，你可以查看班级信息，以及你自己的课表信息教室信息等，具体内容请以显示为准！
                </p>
            </div>
            </div>
            <hr/>
        </div> -->
    </div>
</div>
<hr/>
<?php
    if ((session('uname'))=='s_name') {
        echo "<style>";
        echo ".s_name {display:none}";
        echo "</style>";
    }

    if ((session('uname'))=='t_name') {
        echo "<style>";
        echo ".t_name {display:none}";
        echo "</style>";
    }
?>
@endsection