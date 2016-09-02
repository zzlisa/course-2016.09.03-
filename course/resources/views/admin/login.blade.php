<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/login.css')}}"/>
    <link rel="stylesheet" href="{{asset('resources/org/bootstrap/dist/css/bootstrap.min.css')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: url('../resources/views/admin/images/bg.jpg');
            background-repeat:no-repeat;
            background-size: 100%;
            overflow-x: hidden;
            font-family: "微软雅黑";
        }

        @media only screen and (max-width: 768px) {
            body {
                background: rgba(232, 239, 181, 0.42);
                overflow-x: hidden;
                font-family: "微软雅黑";
                font-size: 8px;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <img src="{{url('resources/views/admin/images/head.png')}}" class="img-responsive" alt="郑州师范学院">
        </div>
    </div>
</div>

<div class="container">
<div class="row">
<form class="form-inline" action="{{url('admin/login')}}" method="post">
<div class="col-md-7 col-sm-7 col-xs-8 col-xs-offset-2 login_mbody">
    <h2>欢迎登录课表查询系统</h2>
    <hr/>
    @if(session('msg'))
        <p style="color:red">{{session('msg')}}</p>
    @endif
    {{csrf_field()}}
    <label>用户名:</label>
    <input class="form-control" type="text" name="username" placeholder="请输入用户名">
    <br/><br/>
    <label>密&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
    <input type="password" name="userpass" class="form-control login_form" placeholder="请输入密码">
    <br/><br/>
    <label>请选择身份:</label>
    <input type="radio" name="user" value="u_name" checked>管理员　
    <input type="radio" name="user" value="t_name">教师　
    <input type="radio" name="user" value="s_name">学生
    <br/><br/>
    <input class="btn btn-default" type="submit" name="" value="登录">
</div>
</form>
</div>
</body>
</html>