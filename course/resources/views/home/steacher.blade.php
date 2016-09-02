@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9 index_mbody">
    <h3>查询教师信息</h3>
    <h5>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
    <br/>
    <form class="form-inline" action="{{url('home/scourse')}}" method="post" id="croom">
    {{csrf_field()}}
        <label>请输入要查询的教师:</label>
        <input class="form-control" type="text" name="teacher_id" value=""">
        <input class="form-control" type="submit" name="" value="查询" onclick="submit()">
        <br/><br/><br/>
        <div class="table-responsive">
        <table class="table" border="0">
            <tr>
                <th>教师编号</th>
                <th>教师姓名</th>
                <th>性别</th>
                <th>教师职称</th>
                <th>上课时间</th>
                <th>起始节次</th>
                <th>结束节次</th>
                <th>所带班级</th>
                <th>入学年份</th>
                <th>所上课程</th>
                <th>任课老师</th>
                <th>所在教室</th>
                <th>教师所属学院</th>
            </tr>

            <tr>
                 @if(session('msg'))
                    <p style="color:red">{{session('msg')}}</p>
                @endif
            </tr>
        @if(!empty($teacher_id))
                @foreach($teacherlist as $b)
                <tr>
                    <td>{{$b->teacher_id}}</td>
                    <td>{{$b->teacher_name}}</td>
                    <td>{{$b->teacher_sex}}</td>
                    <td>{{$b->teacher_zc}}</td>
                    <td>星期{{$b->sche_week}}</td>
                    <td>{{$b->sche_jstart}}</td>
                    <td>{{$b->sche_jend}}</td>
                    <td>{{$b->classe_name}}</td>
                    <td>{{$b->classe_year}}</td>
                    <td>{{$b->course_name}}</td>
                    <td>{{$b->teacher_name}}</td>
                    <td>{{$b->classroom_name}}</td>
                    <th>{{$b->college_name}}</th>
                </tr>
                @endforeach
            @endif
        </table>
        </div>
    </form>
    </div>
    </div>
    </div>
    <script>
        function submit() {
            document.getElementById("croom").action="{{url('home/steacher/'.$teacher_id)}}";
            document.getElementById("croom").submit();
        }
    </script>
    <br/><br/><br/><br/>
@endsection