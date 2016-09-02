@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>课程表列表</h3>
    <h5>
        <a  class="t_name s_name" href="{{url('admin/course/create')}}">添加课程信息</a>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>课程编号</th>
            <th>课程名称</th>
            <th>课程性质</th>
            <th>考试形式</th>
            <th>周学时</th>
            <th>学分</th>
            <th class="s_name t_name">操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->course_id}}</td>
            <td>{{$v->course_name}}</td>
            <td>{{$v->course_xingz}}</td>
            <td>{{$v->course_testxs}}</td>
            <td>{{$v->course_zxs}}</td>
            <td>{{$v->course_xuef}}</td>
            <td class="t_name s_name">
                <a href="{{url('admin/course/'.$v->cour_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delCourse({{$v->cour_id}})">删除</a>
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
        function delCourse(cour_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/course/')}}/"+cour_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
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