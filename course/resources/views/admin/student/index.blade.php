@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <h3>学生表列表</h3>
    <h5>
        <a class="t_name" href="{{url('admin/student/create')}}">添加学生信息</a>　
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
        <div class="col-md-9 index_mbody">
        <div class="table-responsive">
            <table class="table" border="0">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>出生日期</th>
            <th>籍贯</th>
            <th>入学年份</th>
            <th>身份证号</th>
            <th class="t_name">操作</th>
        </tr>
        <tr>
        @foreach($data as $v)
            <td>{{$v->student_id}}</td>
            <td>{{$v->student_name}}</td>
            <td>{{$v->student_sex}}</td>
            <td>{{$v->student_csrq}}</td>
            <td>{{$v->student_jg}}</td>
            <td>{{$v->student_year}}</td>
            <td>{{$v->student_iid}}</td>
            <td class="t_name">
                <a href="{{url('admin/student/'.$v->stu_id.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="delStudent({{$v->stu_id}})">删除</a>
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
        function delStudent(stu_id){
        layer.confirm('您确定要删除这条信息吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/student/')}}/"+stu_id, {'_method':'delete', '_token':"{{csrf_token()}}"}, function(data){
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