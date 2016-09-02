@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加教师信息</h3>
<h5>
    <a href="{{url('admin/teacher')}}">教师信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/teacher')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>教师编号:</label>
        <input class="form-control" type="text" name="teacher_id" placeholder="教师编号不能为空">
        <label>姓名:</label>
        <input class="form-control" type="text" name="teacher_name" placeholder="姓名不能为空">
        <br/><br/>
        <label>性　别:</label>　
        <input type="radio" name="teacher_sex" value="男" checked>男　
        <input type="radio" name="teacher_sex" value="女">女　　　　　　　&nbsp;&nbsp;
        <label>职称:</label>
        <input class="form-control" type="text" name="teacher_zc">
        <br/><br/>
        <label>出生日期:</label>
        <input class="form-control" type="date" name="teacher_csrq">
        <br/><br/>
        <label>教师学历:</label>
        <input class="form-control" type="text" name="teacher_xl">
        <br/><br/>
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection