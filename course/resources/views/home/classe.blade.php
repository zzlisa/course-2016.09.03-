@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9 index_mbody">
    <h3>查询班级信息</h3>
    <h5>
        <a href="{{url('admin/index')}}">回到首页</a>
    </h5>
    <br/>
    <form class="form-inline" action="{{url('home/classe')}}" method="post" id="croom">
    {{csrf_field()}}
        <select class="form-control" name="sche" onchange="submit1()">
            <option value="">请选择星期</option>
                <option value="1" {{$sche_week==1?'selected':''}}>星期一</option>
                <option value="2" {{$sche_week==2?'selected':''}}>星期二</option>
                <option value="3" {{$sche_week==3?'selected':''}}>星期三</option>
                <option value="4" {{$sche_week==4?'selected':''}}>星期四</option>
                <option value="5" {{$sche_week==5?'selected':''}}>星期五</option>
        </select>

        <select class="form-control" name="classe">
            <option value="0">请选择课程</option>
            @foreach($schelist as $a)
                <option value="{{$a->classe_id}}" {{$a->sche_week==$sche_week?'selected':''}}>{{$a->classe_name}}</option>
            @endforeach
        </select>

        <input class="form-control" type="submit" name="" value="查找" onclick = "submit2()"><br/><br/>

        <h3>信息列表显示</h3>
        <div class="table-responsive">
        <table class="table" border="0">
            <tr>
                <th>班级编号</th>
                <th>班级名称</th>
                <th>班级人数</th>
                <th>所上课程</th>
                <th>节次开始</th>
                <th>节次结束</th>
                <th>任课老师</th>
                <th>所在教室</th>
                <th>所属学院</th>
            </tr>

            @if(!empty($classe_id))
                @foreach($classelist as $b)
                <tr>
                    <td>{{$b->classe_id}}</td>
                    <td>{{$b->classe_name}}</td>
                    <td>{{$b->classe_rens}}</td>
                    <td>{{$b->course_name}}</td>
                    <td>{{$b->sche_jstart}}</td>
                    <td>{{$b->sche_jend}}</td>
                    <td>{{$b->teacher_name}}</td>
                    <td>{{$b->classroom_name}}</td>
                    <td>{{$b->college_name}}</td>
                </tr>
                @endforeach
            @endif
        </table>
        </div>
    </form>
    <hr/>
    </div>
    </div>
    </div>

    <script>
        function submit1() {
            document.getElementById("croom").action="{{url('home/classe')}}";
            document.getElementById("croom").submit();
        }

        function submit2() {
            document.getElementById("croom").action="{{url('home/classe/'.$classe_id)}}";
            document.getElementById("croom").submit();
        }
    </script>
@endsection