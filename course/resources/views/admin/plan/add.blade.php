@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加教学计划信息</h3>
<h5>
    <a href="{{url('admin/plan')}}">教学计划信息列表</a>　
    <a href="{{url('admin/index')}}">回到首页</a>
</h5>
<hr/>
        @if(count($errors)>0)
            <div>
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p style="color:red">{{$error}}</p>
                    @endforeach
                @else
                    <p style="color:red">{{$errors}}</p>
                @endif
            </div>
        @endif
    <form class="form-inline" action="{{url('admin/plan')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>教学计划编号:</label>
        <input class="form-control" type="text" name="plan_id" placeholder="教学计划编号不能为空">
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id" placeholder="教学计划名称不能为空">
        <br/><br/>
        <label>计划学期:</label>
        <input class="form-control" type="text" name="plan_xq">
        <br/><br/>
        <label>课程编号:</label>
        <input class="form-control" type="text" name="course_id">
        <br/><br/>
        <label>计划周数:</label>
        <input class="form-control" type="text" name="plan_week">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection