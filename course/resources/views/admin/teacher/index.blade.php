@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>教师表列表</h3>
    <h5>
        <a href="{{url('admin/teacher/create')}}">添加教师信息</a>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>教师编号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>职称</th>
            <th>出生日期</th>
            <th>教师学历</th>
            <th>学院编号</th>
            <th>操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->teacher_id}}</td>
            <td>{{$v->teacher_name}}</td>
            <td>{{$v->teacher_sex}}</td>
            <td>{{$v->teacher_zc}}</td>
            <td>{{$v->teacher_csrq}}</td>
            <td>{{$v->teacher_xl}}</td>
            <td>{{$v->college_id}}</td>
            <td>
                <a href="{{url('admin/teacher/'.$v->teach_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delTeacher({{$v->teach_id}})">删除</a>
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
    ?>

    <script>
        function delTeacher(teach_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/teacher/')}}/"+teach_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
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