@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学院信息</h3>
<h5>
    <a href="{{url('admin/college')}}">学院信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/college/'.$field->col_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id" placeholder="学号不能为空" value="{{$field->college_id}}">
        <br/><br/>
        <label>学院名称:</label>
        <input class="form-control" type="text" name="college_name" value="{{$field->college_name}}">
        <br/><br/>
        　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection