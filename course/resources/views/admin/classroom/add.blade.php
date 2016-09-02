@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-2">
<h3>添加教室信息</h3>
<h5>
    <a href="{{url('admin/classroom')}}">教室信息列表</a>　
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
    <form class="form-inline" action="{{url('admin/classroom')}}" method="post">
    <div class="form-group">
        {{csrf_field()}}
        <label>教室编号:</label>
        <input class="form-control" type="text" name="classroom_id" placeholder="教室编号不能为空">
        <label>教室名称:</label>
        <input class="form-control" type="text" name="classroom_name" placeholder="教室名称不能为空">
        <br/><br/>
        <label>类型:</label>
        <input type="radio" name="classroom_type" value="机房" checked>机房　
        <input type="radio" name="classroom_type" value="教室">教室　　　　　　　&nbsp;&nbsp;
        <br/><br/>
        <label>楼　号:　</label>
        <input class="form-control" type="text" name="classroom_lh">
        <br/><br/>
        <label>容纳人数:</label>
        <input class="form-control" type="text" name="classroom_rs">
        <br/><br/>
        　　　　　　　　　　　　<input class="form-control" type="submit" name="" value="提交">
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>
@endsection