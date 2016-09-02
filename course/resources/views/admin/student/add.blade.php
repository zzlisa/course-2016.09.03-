@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加学生信息</h3>
<h5>
    <a href="{{url('admin/student')}}">学生信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/student')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>学号:</label>
        <input class="form-control" type="text" name="student_id" placeholder="学号不能为空">
        <label>姓名:</label>
        <input class="form-control" type="text" name="student_name" placeholder="姓名不能为空">
        <br/><br/>
        <label>性别:</label>
        <input type="radio" name="student_sex" value="男" checked>男　
        <input type="radio" name="student_sex" value="女">女　　　　　　　&nbsp;&nbsp;
        <label>籍贯:</label>
        <input class="form-control" type="text" name="student_jg">
        <br/><br/>
        <label>出生日期:</label>
        <input class="form-control" type="date" name="student_csrq">
        <br/><br/>
        <label>入学年份:</label>
        <input class="form-control" type="date" name="student_year">
        <br/><br/>
        <label>身份证号:</label>
        <input class="form-control" type="text" name="student_iid">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection