<?php
use App\Task;
use Illuminate\Http\Request;

// 表示処理の作成
// Route::get('/', function () {
//     $tasks = Task::orderBy('deadline', 'asc')->get();
//   return view('tasks', [
//       'tasks' => $tasks
//   ]);
// });
Route::get('/', 'TasksController@index');

// 登録処理の作成
// Route::post('/tasks', function (Request $request) {
    //バリデーション
//   $validator = Validator::make($request->all(), [
//       'task' => 'required|max:191',
//       'deadline' => 'required'
//   ]);
    //バリデーション:エラー
//   if ($validator->fails()) {
//       return redirect('/')
//           ->withInput()
//           ->withErrors($validator);
//   }
   
    // Eloquentモデル
//   $task = new Task;
//   $task->task = $request->task;
//   $task->deadline = $request->deadline;
//   $task->comment = $request->comment;
//   $task->save();
    //「/」ルートにリダイレクト
//   return redirect('/');
// });
Route::post('/tasks', 'TasksController@store');

// 削除処理の作成
// Route::post('/task/{task}', function (Task $task) {
//     $task->delete();
//   return redirect('/');
// });
Route::post('/task/{task}', 'TasksController@destroy');

//更新画面
// Route::post('/tasksedit/{task}', function(Task $task) {
   //{task}id 値を取得 => Task $task id 値の1レコード取得
//   return view('tasksedit', ['task' => $task]);
// });
Route::post('/tasksedit/{task}', 'TasksController@edit');

//更新処理
// Route::post('/tasks/update', function(Request $request){
   //バリデーション

//     $validator = Validator::make($request->all(), [
//       'id' => 'required',
//       'task' => 'required|max:255',
//       'deadline' => 'required'
//   ]);
//バリデーション:エラー
//   if ($validator->fails()) {
//       return redirect('/')
//           ->withInput()
//           ->withErrors($validator);
//   }
   //データ更新処理
//   $task = Task::find($request->id);
//   $task->task   = $request->task;
//   $task->deadline = $request->deadline;
//   $task->comment = $request->comment;
//   $task->save();
//   return redirect('/');
// });

Route::post('/tasks/update', 'TasksController@update');
//apiページ表示処理
Route::get('/api_ajax', 'TasksController@api_ajax');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'TasksController@index')->name('home');
