<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>模板继承--@yield('title')</title>
    <style>
        .header{
            width: 1000px;
            height:150px;
            margin:0 auto;
            background: #F5F5F5;
            border:1px solid #ddd;
            text-align: center;
            line-height: 150px;

        }
        .main{
            width: 1000px;
            height:300px;
            margin:0 auto;
            margin-top:15px;
            display: flex;
            text-align: center;
        }
        .sidebar{
            flex:1;
            background: #F5F5F5;
            border:1px solid #ddd;
            border-right:0px;
        }
        .content{
            flex:2;
            background: #F5F5F5;
            border:1px solid #ddd;
        }
        .footer{
            width:1000px;
            height:300px;
            background: #F5F5F5;
            border:1px solid #ddd;
            margin:0 auto;
            margin-top:15px;
            line-height: 300px;
            text-align: center;

        }

    </style>
</head>
<body>
    <div class="header">
        @section('header')
        头部
        @show
    </div>

    <div class="main">
        <div class="sidebar">
            @section('sidebar')
            侧边栏
            @show
        </div>

        <div class="content">
            @yield('content','主要内容区域')
        </div>
    </div>

    <div class="footer">
        @section('footer')
        底部
        @show
    </div>
</body>
</html>