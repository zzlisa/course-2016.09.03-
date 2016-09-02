@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学生信息</h3>
<h5>
    <a href="{{url('admin/student')}}">学生信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/student/'.$field->stu_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>学号:</label>
        <input class="form-control" type="text" name="student_id" placeholder="学号不能为空" value="{{$field->student_id}}">
        <label>姓名:</label>
        <input class="form-control" type="text" name="student_name" value="{{$field->student_name}}">
        <br/><br/>
        <label>性别:</label>
        <input type="radio" name="student_sex" value="男" {{$field->student_sex=='男'?'checked':''}}>男　
             <input type="radio" name="student_sex" value="女" {{$field->student_sex=='男'?'':'checked'}}>女　　　　　　　&nbsp;&nbsp;
        <label>籍贯:</label>
        <input class="form-control" type="text" name="student_jg" value="{{$field->student_jg}}">
        <br/><br/>
        <label>出生日期:</label>
        <input class="form-control" type="date" name="student_csrq" value="{{$field->student_csrq}}">
        <br/><br/>
        <label>入学年份:</label>
        <input class="form-control" type="date" name="student_year" value="{{$field->student_year}}">
        <br/><br/>
        <label>身份证号:</label>
        <input class="form-control" type="text" name="student_iid" value="{{$field->student_iid}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection