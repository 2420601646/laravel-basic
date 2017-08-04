<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('basic1',function(){
    return "Hello World";
});

Route::post('basic2',function(){
   return "Basic2";
});

//多请求路由
Route::match(['get','post'],'multy1',function(){
   return "multy1";
});

Route::any('multy2',function(){
   return "multy2";
});

//路由参数

//Route::get('user/{id}',function($id){
//    return 'User-id-'.$id;
//});
//
//Route::get('user/{name?}',function($name = 'sean'){
//    return 'User-name-'.$name;
//});

//Route::get('user/{name?}',function($name = 'sean'){
//    return 'User-name-'.$name;
//})->where('name','[A-Za-z]+');

//Route::get('user/{id}/{name?}',function($id,$name = 'sean'){
//    return 'User-id-' .$id . 'User-name-' .$name;
//})->where(['id' => '[0-9]+','name' => '[A-Za-z]+']);

//路由别名

//Route::get('user/member-center',['as' => 'center',function(){
//    return route('center');
//}]);

//路由群组

Route::group(['prefix' => 'member'],function(){

    Route::any('multy2',function(){
        return "member-multy2";
    });

    Route::get('user/center',['as' => 'center',function(){
    return route('center');

}]);
});

//路由中输出视图

Route::get('view', function () {
    return view('welcome');
});



//Route::get('member/info',"MemberController@info");

//Route::get('member/info',['uses' => 'MemberController@info']);

//Route::get('member/info',['as' => 'memberinfo','uses' => 'MemberController@info']);

//Route::get('member/{id}',['as' => 'memberinfo','uses' => 'MemberController@info'])->where('id','[0-9]+');

Route::any('test1',['uses' => 'StudentController@test1']);

Route::any('query1',['uses' => 'StudentController@query1']);

Route::any('query2',['uses' => 'StudentController@query2']);

Route::any('query3',['uses' => 'StudentController@query3']);

Route::any('query4',['uses' => 'StudentController@query4']);

Route::any('query5',['uses' => 'StudentController@query5']);

Route::any('orm1',['uses' => 'StudentController@orm1']);

Route::any('orm2',['uses' => 'StudentController@orm2']);

Route::any('orm3',['uses' => 'StudentController@orm3']);

Route::any('orm4',['uses' => 'StudentController@orm4']);

Route::any('section1',['uses' => 'StudentController@section1']);

Route::any('url',['uses' => 'StudentController@urlTest','as' => 'url']);

Route::any('student/request1',['uses' => 'StudentController@request1']);




Route::any('session1',['uses' => 'StudentController@session1']);

Route::any('session2',['uses' => 'StudentController@session2','as' => 'session2']);


Route::any('response',['uses' => 'studentController@response']);



//活动

//宣传页面
Route::any('activity0',['uses' => 'studentController@activity0']);

Route::group(['middleware' => ['activity']],function(){

    Route::any('activity1',['uses' => 'studentController@activity1']);

    Route::any('activity2',['uses' => 'studentController@activity2']);

});














