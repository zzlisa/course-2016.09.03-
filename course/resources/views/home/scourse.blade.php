@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9 index_mbody">
    <h3>查询课程信息</h3>
    <h5>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
    <br/>
    <form class="form-inline" action="{{url('home/scourse')}}" method="post" id="croom">
    {{csrf_field()}}
        <label>请输入要查询的课程:</label>
        <input class="form-control" type="text" name="course_id" value=""">
        <input class="form-control" type="submit" name="" value="查询" onclick="submit()">
        <br/><br/><br/>
        <div class="table-responsive">
        <table class="table" border="0">
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>课程性质</th>
                <th>开课时间</th>
                <th>起始节次</th>
                <th>结束节次</th>
                <th>上课班级</th>
                <th>上课教室</th>
                <th>任课老师</th>
                <th>所属学院</th>
            </tr>

            <tr>
                 @if(session('msg'))
                    <p style="color:red">{{session('msg')}}</p>
                @endif
            </tr>
        @if(!empty($course_id))
                @foreach($courselist as $b)
                <tr>
                    <td>{{$b->course_id}}</td>
                    <td>{{$b->course_name}}</td>
                    <td>{{$b->course_xingz}}</td>
                    <td>星期{{$b->sche_week}}</td>
                    <td>{{$b->sche_jstart}}</td>
                    <td>{{$b->sche_jend}}</td>
                    <td>{{$b->classe_name}}</td>
                    <td>{{$b->classroom_name}}</td>
                    <td>{{$b->teacher_name}}</td>
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
            document.getElementById("croom").action="{{url('home/scourse/'.$course_id)}}";
            document.getElementById("croom").submit();
        }
    </script>
    <br/><br/><br/><br/>
@endsection