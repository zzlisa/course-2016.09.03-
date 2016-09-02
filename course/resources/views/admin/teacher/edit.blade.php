@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改教师信息</h3>
<h5>
    <a href="{{url('admin/teacher')}}">教师信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/teacher/'.$field->teach_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>教师编号:</label>
        <input class="form-control" type="text" name="teacher_id" placeholder="教师编号不能为空" value="{{$field->teacher_id}}">
        <label>姓名:</label>
        <input class="form-control" type="text" name="teacher_name" value="{{$field->teacher_name}}">
        <br/><br/>
        <label>性别:</label>
        <input type="radio" name="teacher_sex" value="男" {{$field->teacher_sex=='男'?'checked':''}}>男　
             <input type="radio" name="teacher_sex" value="女" {{$field->teacher_sex=='男'?'':'checked'}}>女　　　　　　　&nbsp;&nbsp;
        <label>职称:</label>
        <input class="form-control" type="text" name="teacher_zc" value="{{$field->teacher_zc}}">
        <br/><br/>
        <label>出生日期:</label>
        <input class="form-control" type="date" name="teacher_csrq" value="{{$field->teacher_csrq}}">
        <br/><br/>
        <label>教师学历:</label>
        <input class="form-control" type="date" name="teacher_xl" value="{{$field->teacher_xl}}">
        <br/><br/>
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id" value="{{$field->college_id}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection