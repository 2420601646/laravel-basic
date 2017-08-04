@extends('layouts')

@section('title')
   我是标题
@stop

@section('header')
    @parent
    header
@stop

@section('sidebar')
    @parent
    sidebar

@stop

@section('content')
    @parent
    content

     {{--1.模板中输出php变量--}}

    {{--{{$name}}--}}

     {{--2.模板中调用php代码--}}
    {{--<p>{{time()}}</p>--}}

    {{--<p>{{date('Y-m-d H:i:s',time())}}</p>--}}

    {{--<p>{{in_array($name,$arr) ? 'true' : 'false'}}</p>--}}

    {{--<p>{{dump($arr)}}</p>--}}

    {{--<p>{{isset($name) ? $name : 'default'}}</p>--}}

    {{--<p>{{$name1 or 'default'}}</p>--}}

     {{--3.原样输出--}}
    {{--<p>@{{$name}}}</p>--}}

    {{--4.模板注释在浏览器中无法看见，html注释可以看见--}}

    {{--5.引入子视图 include--}}
    {{--@include('student.comment1',['message'=>'我是错误信息'])--}}


    <br>
    @if($name == 'sean')

    I'm sean
    @elseif($name == 'imooc')

    I'imooc
    @else
    who am I?
    @endif

    <br>
    @if(in_array($name,$arr))
    true
    @else
    false
    @endif

    <br>
    @unless($name != 'sean')
    I'm sean
    @endunless

    {{--<br>--}}
    {{--@for($i=0;$i<10;$i++)--}}

    {{--<p>{{$i}}</p>--}}

    {{--@endfor--}}

    @foreach($students as $student)
    <p>{{$student->name}}</p>
    @endforeach


    @forelse($students as $student)
        <p>{{$student->name}}</p>
    @empty
        <p>null</p>
    @endforelse
    {{--url 通过路由生成url--}}
    <a href="{{url('url')}}">url()</a>

    {{--action--}}
    <br>
    <a href="{{action('StudentController@urlTest')}}">action()</a>

    {{--route--}}
    <br>
    <a href="{{route('url')}}">route()</a>









@stop

