@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>教室表列表</h3>
    <h5>
        <a class="t_name s_name" href="{{url('admin/classroom/create')}}">添加教室信息</a>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>教室编号</th>
            <th>教室名称</th>
            <th>教室类型</th>
            <th>楼号</th>
            <th>容纳人数</th>
            <th class="s_name t_name">操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->classroom_id}}</td>
            <td>{{$v->classroom_name}}</td>
            <td>{{$v->classroom_type}}</td>
            <td>{{$v->classroom_lh}}</td>
            <td>{{$v->classroom_rs}}</td>
            <td class="t_name s_name">
                <a href="{{url('admin/classroom/'.$v->clar_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delClassroom({{$v->clar_id}})">删除</a>
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
        function delClassroom(clar_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/classroom/')}}/"+clar_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
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