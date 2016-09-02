@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>修改学生信息</h3>
<h5>
    <a href="{{url('admin/classroom')}}">教室信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
    <form class="form-inline" action="{{url('admin/classroom/'.$field->clar_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <label>教室编号:</label>
        <input class="form-control" type="text" name="classroom_id" placeholder="学号不能为空" value="{{$field->classroom_id}}">
        <label>教室名称:</label>
        <input class="form-control" type="text" name="classroom_name" value="{{$field->classroom_name}}">
        <br/><br/>
        <label>教室类型:</label>
        <input type="radio" name="classroom_type" value="机房" {{$field->classroom_type=='机房'?'checked':''}}>机房　
             <input type="radio" name="classroom_type" value="教室" {{$field->classroom_type=='机房'?'':'checked'}}>教室　　　　　　　&nbsp;&nbsp;
        <label>楼号:</label>
        <input class="form-control" type="text" name="classroom_lh" value="{{$field->classroom_lh}}">
        <br/><br/>
        <label>容纳人数:</label>
        <input class="form-control" type="text" name="classroom_rs" value="{{$field->classroom_rs}}">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
    </form>
    <hr/>
    </div></div></div>
@endsection