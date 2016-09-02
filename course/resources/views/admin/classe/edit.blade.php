@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改班级信息</h3>
<h5>
    <a href="{{url('admin/classe')}}">班级信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/classe/'.$field->cla_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>班级编号:</label>
        <input class="form-control" type="text" name="classe_id" placeholder="班级编号不能为空" value="{{$field->classe_id}}">
        <label>班级名称:</label>
        <input class="form-control" type="text" name="classe_name" value="{{$field->classe_name}}">
        <br/><br/>
        <label>人　数:　</label>
        <input class="form-control" type="text" name="classe_rens" value="{{$field->classe_rens}}">
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id" value="{{$field->profess_id}}">
        <br/><br/>
        <label>入学年份:</label>
        <input class="form-control" type="text" name="classe_year" value="{{$field->classe_year}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection