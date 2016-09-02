<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
        <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/index.css')}}"/>
        <link rel="stylesheet" href="{{asset('resources/org/bootstrap/dist/css/bootstrap.min.css')}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}"/>
        <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
        <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
        <style>
        body {
            background: url('/course/resources/views/admin/images/bg.jpg');
            background-repeat:no-repeat;
            background-size: 100%;
            overflow-x: hidden;
            font-family: "微软雅黑";
        }

        @media only screen and (max-width: 970px) and (min-width: 768px) {
            body {
                background: url('/course/resources/views/admin/images/bg.jpg');
                background-repeat:repeat-y;
                background-size: 150%;
                overflow-x: hidden;
                font-family: "微软雅黑";
                font-size: 8px;
            }
        }

        @media only screen and (max-width: 767px) {
            body {
                background: rgba(232, 239, 181, 0.42);
                overflow-x: hidden;
                font-family: "微软雅黑";
                font-size: 8px;
            }
            .index_addr {
                display: none;
            }
        }

    </style>
    </head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-6">
                <img src="{{url('resources/views/admin/images/head.png')}}" class="img-responsive" alt="郑州师范学院">
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 col-md-offset-1 index_iid">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        在线人员:<?php echo (session('username'));?>&nbsp;
                        身份:<?php
                                if((session('uname'))=='u_name') {
                                    echo "管理员";
                                }

                                if ((session('uname'))=='t_name') {
                                    echo "教师";
                                }

                                if ((session('uname'))=='s_name') {
                                    echo "学生";
                                }
                            ?>

                            　<a href="{{url('admin/login')}}">退出</a>
                    </div>
                </div>
                <div class="row index_addr">
                    <div class="col-md-12 col-sm-12 col-xs-12 index_addr">
                        电话:0371-8888 8888<br/>
                        qq邮箱:1525883944@qq.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container-fluid">
        <div class="row index_we">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>欢迎使用郑州师范学院课表查询系统</h3>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="container-fluid">
        <div class="row index_footer">
            <div class="col-md-12">
                <h4>信院众创工作室版权所有</h4>
            </div>
            <div class="col-md-12">
                <h4>期待您的加入......</h4>
            </div>
            <div class="col-md-2 col-md-offset-10">更多请咨询>></div>
        </div>
    </div>
</body>
</html>