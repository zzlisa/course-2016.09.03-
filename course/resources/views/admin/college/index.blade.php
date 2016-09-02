@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>学院表列表</h3>
    <h5>
        <a  class="t_name s_name" href="{{url('admin/college/create')}}">添加学院信息</a>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>学院编号</th>
            <th>学院名称</th>
            <th class="s_name t_name">操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->college_id}}</td>
            <td>{{$v->college_name}}</td>
            <td class="t_name s_name">
                <a href="{{url('admin/college/'.$v->col_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delCollege({{$v->col_id}})">删除</a>
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
        function delCollege(col_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/college/')}}/"+col_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
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