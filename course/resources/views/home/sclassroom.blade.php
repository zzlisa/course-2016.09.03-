@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9 index_mbody">
    <h3>查询教室信息</h3>
    <h5>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
    <br/>
    <form class="form-inline" action="{{url('home/sclassroom')}}" method="post" id="croom">
    {{csrf_field()}}
        <label>请输入要查询的教室:</label>
        <input class="form-control" type="text" name="classroom_id" value=""">
        <input class="form-control" type="submit" name="" value="查询" onclick="submit()">
        <br/><br/><br/>
        <div class="table-responsive">
        <table class="table" border="0">
            <tr>
                <th>教室名称</th>
                <th>教室类型</th>
                <th>上课日期</th>
                <th>课程名称</th>
                <th>节次起始</th>
                <th>节次结束</th>
                <th>上课老师</th>
                <th>上课班级</th>
                <th>所属学院</th>
            </tr>

            <tr>
                 @if(session('msg'))
                    <p style="color:red">{{session('msg')}}</p>
                @endif
            </tr>
        @if(!empty($classroom_id))
                @foreach($classroomlist as $b)
                <tr>
                    <td>{{$b->classroom_name}}</td>
                    <td>{{$b->classroom_type}}</td>
                    <td>星期{{$b->sche_week}}</td>
                    <td>{{$b->course_name}}</td>
                    <td>{{$b->sche_jstart}}</td>
                    <td>{{$b->sche_jend}}</td>
                    <td>{{$b->teacher_name}}</td>
                    <td>{{$b->classe_name}}</td>
                    <td>{{$b->college_name}}</td>
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
            document.getElementById("croom").action="{{url('home/sclassroom/'.$classroom_id)}}";
            document.getElementById("croom").submit();
        }
    </script>
    <br/><br/><br/><br/>
@endsection