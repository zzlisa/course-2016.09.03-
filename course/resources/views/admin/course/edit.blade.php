@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学生信息</h3>
<h5>
    <a href="{{url('admin/course')}}">课程信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/course/'.$field->cour_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>课程编号:</label>
        <input class="form-control" type="text" name="course_id" placeholder="学号不能为空" value="{{$field->course_id}}">
        <label>课程名称:</label>
        <input class="form-control" type="text" name="course_name" value="{{$field->course_name}}">
        <br/><br/>
        <label>课程性质:</label>
        <input class="form-control" type="text" name="course_xingz" value="{{$field->course_xingz}}">
        <label>考试形式</label>
        <input class="form-control" type="text" name="course_testxs" value="{{$field->course_testxs}}">
        <br/><br/>
        <label>周学时:</label>
        <input class="form-control" type="text" name="course_zxs" value="{{$field->course_zxs}}">
        <br/><br/>
        <label>学　分:</label>
        <input class="form-control" type="text" name="course_xuef" value="{{$field->course_xuef}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection