@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加专业信息</h3>
<h5>
    <a href="{{url('admin/profess')}}">专业信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/profess')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>专业编号:</label>
        <input class="form-control" type="text" name="profess_id" placeholder="专业编号不能为空">
        <label>专业名称:</label>
        <input class="form-control" type="text" name="profess_name" placeholder="专业名称不能为空">
        <br/><br/>
        <label>学　制:　</label>
        <input class="form-control" type="text" name="profess_xuez">
        <br/><br/>
        <label>性　制:　</label>
        <input class="form-control" type="text" name="profess_xingz">
        <br/><br/>
        <label>文理:</label>
        <input type="radio" name="profess_wl" value="文" checked>文　
        <input type="radio" name="profess_wl" value="理">理　　　　　　　&nbsp;&nbsp;
        <label>学院编号:</label>
        <input class="form-control" type="text" name="college_id">
        <br/><br/>
        <label>设置年份:</label>
        <input class="form-control" type="text" name="profess_year">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection