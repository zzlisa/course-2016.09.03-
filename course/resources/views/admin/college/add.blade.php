@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加学院信息</h3>
<h5>
    <a href="{{url('admin/college')}}">学院信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/college')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id" placeholder="学院编号不能为空">
        <br/><br/>
        <label>学院名称:</label>
        <input class="form-control" type="text" name="college_name" placeholder="学院名称不能为空">
        <br/><br/>
        　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection