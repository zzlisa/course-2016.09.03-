@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加课程信息</h3>
<h5>
    <a href="{{url('admin/course')}}">课程信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/course')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>课程编号:</label>
        <input class="form-control" type="text" name="course_id" placeholder="课程编号不能为空">
        <label>课程名称:</label>
        <input class="form-control" type="text" name="course_name" placeholder="课程名称不能为空">
        <br/><br/>
        <label>课程性质:</label>
        <input class="form-control" type="text" name="course_xingz">
        <label>考试形式:</label>
        <input class="form-control" type="text" name="course_testxs">
        <br/><br/>
        <label>周学时:</label>
        <input class="form-control" type="text" name="course_zxs">
        <br/><br/>
        <label>学　分:</label>
        <input class="form-control" type="text" name="course_xuef">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection