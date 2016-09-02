@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学生信息</h3>
<h5>
    <a href="{{url('admin/plan')}}">教学计划信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/plan/'.$field->pl_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>教学计划编号:</label>
        <input class="form-control" type="text" name="plan_id" placeholder="学号不能为空" value="{{$field->plan_id}}">
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id" value="{{$field->profess_id}}">
        <br/><br/>
        <label>计划学期:</label>
        <input class="form-control" type="text" name="plan_xq" value="{{$field->plan_xq}}">
        <label>课程编号:</label>
        <input class="form-control" type="text" name="course_id" value="{{$field->course_id}}">
        <br/><br/>
        <label>计划周数:</label>
        <input class="form-control" type="text" name="plan_week" value="{{$field->plan_week}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection