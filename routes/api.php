<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ログイン中のみ処理を実行する
Route::group(['middleware' => ['auth']], function () {
   // api関連の処理をまとめる（urlに自動的に/apiが加わる）
  Route::group(['middleware' => ['api']], function(){
      // 表示
      Route::get('/', 'Api\TasksController@index');
      // 登録
      Route::post('/tasks', 'Api\TasksController@store');
      // 削除
      Route::post('/task/{task}', 'Api\TasksController@destroy');
  });
});
