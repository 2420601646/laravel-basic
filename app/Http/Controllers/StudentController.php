<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function test1(){

          //新增
//        $bool = DB::insert('insert into student(name,age) values( ? , ? )',['mukk',19]);
//        var_dump($bool);

          //更新
//        $num = DB::update('update student set age = ? where name = ?',[20,'sean']);
//        var_dump($num);

          //查询
//        $students = DB::select('select * from student where id > ?',[1]);
//        dd($students);

          //删除
        $num = DB::delete('delete from student where id > ?',[1]);
        var_dump($num);

    }

    //使用查询构造器添加数据
    public function query1()
    {
//        $bool = DB::table('student')->insert(
//            ['name' => 'imooc' , 'age' => 18]
//        );
//        var_dump($bool);

//       $id =  DB::table('student')->insertGetId(
//            ['name' => 'sean','age' => 18]
//        );
//       var_dump($id);

        $bool = DB::table('student')->insert([
            ['name' => 'name1','age' => 20],
            ['name' => 'name2','age' => 22]
        ]);
        var_dump($bool);


    }

    //使用查询构造器更新数据
    public function query2()
    {
//
//        $num = DB::table('student')
//            ->where('id',1)
//            ->update(
//            ['age' => 30]);
//        var_dump($num);

//        $num = DB::table('student')
//            ->increment('age',3);
//        var_dump($num);

//        $num = DB::table('student')
//            ->where('id',3)
//            ->decrement('age',3);
//        var_dump($num);

        $num = DB::table('student')
            ->where('id',3)
            ->decrement('age',3,['name' => 'iimooc']);
        var_dump($num);


    }
    //使用查询构造器删除数据
    public function query3()
    {
//        $num = DB::table('student')
//            ->where('id',3)
//            ->delete();
//        var_dump($num);

//        $num = DB::table('student')
//            ->where('id','>=',3)
//            ->delete();
//        var_dump($num);

        DB::table('student')->truncate();

    }

    //使用查询构造器查询数据
    public function query4()
    {
//        $bool = DB::table('student')->insert([
//            ['name' => 'name1','age' => 20],
//            ['name' => 'name2','age' => 21],
//            ['name' => 'name3','age' => 20],
//            ['name' => 'name4','age' => 21],
//            ['name' => 'name5','age' => 20],
//        ]);
//        var_dump($bool);


        //get()

        //$students = DB::table('student')->get();

        //first()
//        $students = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();
//        dd($students);

        //where
//        $students = DB::table('student')
//            ->where('id','>=',4)
//            ->get();
//        dd($students);
//
//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age > ?',[4,18])
//            ->get();
//        dd($students);

        //pluck 5.2方法
//        $students = DB::table('student')
//            ->pluck('name');
//        var_dump($students);

        //lists 可以指定某个键作为下标:id
//        $names = DB::table('student')
//            ->lists('name','id');
//        dd($names);

        //select
//        $names = DB::table('student')
//            ->select('id','name','age')
//            ->get();
//        dd($names);

        //chunk

        echo '<pre>';
        DB::table('student')->chunk(2,function($students){
            var_dump($students);
            if(条件){
                return false;
            }
        });


    }

    //聚合函数
    public function query5()
    {
//        $num = DB::table('student')->count();

//        $max = DB::table('student')->max('age');

//        $min = DB::table('student')->min('age');

//        $avg = DB::table('student')->avg('age');

        $sum = DB::table('student')->sum('age');


        var_dump($sum);

    }

    //ORM
    public function orm1()
    {
          //all()
//        $students = Student::all();
//        dd($students);

          //find()
//        $students = Student::find(3);
//        dd($students);

          //findOrFail 根据主键查找，查询为空则抛出异常
//        $student = Student::findOrFail(8);
//        dd($student);

          //查询构造器在orm使用
//        $students = Student::get();
//        dd($students);

//        $students = Student::where('id','>','3')
//            ->orderBy('age','desc')
//            ->first();
//        dd($students);

//        $students = Student::chunk(2,function ($students){
//            var_dump($students);
//        });

        //聚合函数
//        $num = Student::count();
        $num = Student::where('id','>','2')->max('age');
        dd($num);



    }

    public function orm2()
    {
        //使用模型新增数据
//        $studnets = new Student();
//        $studnets->name = 'sean2';
//        $studnets->age = 17;
//        $bool = $studnets->save();
//        dd($bool);

//        $students = Student::find(8);
//        echo $students->created_at;

        //使用模型的create方法新增数据
//        $student = Student::create([
//            'name' => 'imooc','age'=>18
//        ]);
//        dd($student);

        //firstOrCreate() 以属性查找新的实例，若没有，则新增并返回新的实例
//        $student = Student::firstOrCreate([
//            'name' => 'imoocs'
//        ]);
//        dd($student);

        //firstOrNew() 以属性查找新的实例，如没有,则建立新的实例，若保存，则自己调用save()
        $student = Student::firstOrNew([
            'name' => 'imoocss'
        ]);
        $bool = $student->save();
        dd($bool);



    }

    public function orm3()
    {
        //通过model更新
//        $student = Student::find(3);
//        $student->name = 'kitty';
//        $bool = $student->save();
//        dd($bool);

        $num = Student::where('id','>',3)
            ->update(['age'=> 30]);
        dd($num);


    }

    public function orm4()
    {
        //通过模型删除
//        $student = Student::find(3);
//        $bool = $student->delete();
//        dd($bool);
        //通过主键删除
//        $num = Student::destroy([11,12]);
//        dd($num);
        //删除指定条件的数据
//        $num = Student::where('id','>',3)->delete();
//        dd($num);


    }

    public function section1()
    {
        $students = Student::get();

        $name = 'sean';
        $arr = ['sean','immoc'];
        return view('student.section1',['name' => $name,'students'=>$students,'arr'=>$arr]);

    }

    public function urlTest()
    {
        return 'urlTest';

    }


    //表单

    public function request1(Request $request)
    {
        //1.取值
//        echo $request->input('name');
//        echo $request->input('sex','未知');

//        if($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo '无该参数';
//        }

//        $res = $request->all();
//        dd($res);

        //2.判断请求类型

        //echo $request->method();

//        if($request->isMethod('GET')){
//            echo 'Yes';
//        }else{
//            echo "NO";
//        }

//        $res = $request->ajax();
//        var_dump($res);

        //判断请求的路径是否符合请求
//        $res = $request->is('student/*');
//        var_dump($res);

        //获取当前的url
        echo $request->url();


    }

    public function session1(Request $request)
    {
        //1.HTTP request session();

//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');

        //2.session
//        session()->put('key2','value2');
//        echo session()->get('key2');

        //3.Session类

        //存储数据到session
//        Session::put('key3','value3');
//
//        //获取session的值
//        echo Session::get('key3');
//
//        //不存在则取默认值
//        echo Session::get('key4','default');

        //以数组的形式存储数据
        Session::put(['key4' => 'value4']);

        //把数据放到Session的数组中
//        Session::push('student','sean');
//        Session::push('student','imooc');
//        $res =  Session::get('student','default');
//        var_dump($res);

        //取出Session的之后删除
//        $res =  Session::pull('student','default');
//        var_dump($res);

//        //取出所有的值
//        $res =  Session::all();
//        dd($res);

        //判断Session中某个key是否存在
//        if(Session::has('key1')){
//            $res =  Session::all();
//            dd($res);
//        }else{
//            echo '你们老大不在';
//        }

//        //删除session中指定的值
//        Session::forget('key1');
//
//        //清空所有session信息
//        Session::flush();

        //暂存数据,只有第一次访问有数据
//        Session::flash('key-flash','val-flash');
//        echo Session::get('key-flash');


    }

    public function session2(Request $request)
    {
        //        echo Session::get('key-flash');
        return Session::get('message','暂无信息');
//        return 'session2';


    }

    public function response()
    {
        //响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg'  => 'success',
//            'date'    => 'sean',
//        ];
//        return response()->json($data);

        //重定向
//        return redirect('session2')->with('message','我是快闪数据');

//        return redirect()->action('StudentController@session2')->with('message','我是快闪数据');

//        return redirect()->route('session2')->with('message','我是快闪数据');

         //返回上一页
        return redirect()->back();

    }


    //有个活动，在指定日期后开始，如果活动没开始，只能访问宣传页面

    //活动的宣传页面
    public function activity0()
    {
        return '活动快要开始了，敬请期待';

    }

    public function activity1()
    {
        return '互动进行中，谢谢你的参与1';

    }

    public  function activity2()
    {
        return '互动进行中，谢谢你的参与2';
    }



}
