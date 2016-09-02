@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加班级信息</h3>
<h5>
    <a href="{{url('admin/classe')}}">班级信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/classe')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>班级编号:</label>
        <input class="form-control" type="text" name="classe_id" placeholder="班级编号不能为空">
        <label>班级名称:</label>
        <input class="form-control" type="text" name="classe_name" placeholder="班级名称不能为空">
        <br/><br/>
        <label>人　数:　</label>
        <input class="form-control" type="text" name="classe_rens">
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id">
        <br/><br/>
        <label>入学年份:</label>
        <input class="form-control" type="text" name="classe_year">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection