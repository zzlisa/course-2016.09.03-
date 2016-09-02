@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学生信息</h3>
<h5>
    <a href="{{url('admin/profess')}}">专业信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/profess/'.$field->pro_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id" placeholder="学号不能为空" value="{{$field->profess_id}}">
        <label>专业名称:</label>
        <input class="form-control" type="text" name="profess_name" value="{{$field->profess_name}}">
        <br/><br/>
        <label>学　制:</label>
        <input class="form-control" type="text" name="profess_xuez" value="{{$field->profess_xuez}}">
        <br/><br/>
        <label>性　制:</label>
        <input class="form-control" type="text" name="profess_xingz" value="{{$field->profess_xingz}}">
        <br/><br/>
        <label>文　理:</label>
        <input type="radio" name="profess_wl" value="文" {{$field->profess_type=='文'?'checked':''}}>文　
             <input type="radio" name="profess_wl" value="理" {{$field->profess_type=='文'?'':'checked'}}>理　　　　　　　&nbsp;&nbsp;
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id" value="{{$field->college_id}}">
        <br/><br/>
        <label>设置年份:</label>
        <input class="form-control" type="text" name="profess_year" value="{{$field->profess_year}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection