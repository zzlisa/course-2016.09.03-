@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>专业表列表</h3>
    <h5>
        <a  class="t_name s_name" href="{{url('admin/profess/create')}}">添加专业信息</a>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>专业编号</th>
            <th>专业名称</th>
            <th>学制</th>
            <th>性质</th>
            <th>文理</th>
            <th>学院编号</th>
            <th>设置年份</th>
            <th class="s_name t_name">操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->profess_id}}</td>
            <td>{{$v->profess_name}}</td>
            <td>{{$v->profess_xuez}}</td>
            <td>{{$v->profess_xingz}}</td>
            <td>{{$v->profess_wl}}</td>
            <td>{{$v->college_id}}</td>
            <td>{{$v->profess_year}}</td>
            <td class="t_name s_name">
                <a href="{{url('admin/profess/'.$v->pro_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delprofess({{$v->pro_id}})">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    </div>
    </div>
    </div>
    <nav class="container">
  <ul class="pagination">
    {{$data->links()}}
  </ul>
</nav>
    <?php
        if ((session('uname'))=='t_name') {
            echo "<style>";
            echo ".t_name {display:none}";
            echo "</style>";
        };
        if ((session('uname'))=='s_name') {
            echo "<style>";
            echo ".s_name {display:none}";
            echo "</style>";
        };
    ?>

    <script>
        function delprofess(pro_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/profess/')}}/"+pro_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon:6});
                } else{
                    layer.msg(data.msg, {icon:5});
                }
            });
        }, function(){
        });
    }
    </script>
@endsection