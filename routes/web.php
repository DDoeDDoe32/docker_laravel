<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

Route::resource('articles', 'ArticlesController');

Route::get('auth/login', function() {
	$credentials = [
		'email' => 'john@example.com',
		'password' => 'password'
	];

	if (! auth()->attempt($credentials)) {
		return '로그인 정보가 정확하지 않습니다.';
	}

	return redirect('protected');
});

Route::get('protected', ['middleware' => 'auth', function() {
	dump(session()->all());

	/*if (! auth()->check()) {
		return '누구세요?';
	}*/
	return '어서오세요' . auth()->user()->name;
}]);

Route::get('auth/logout', function() {
	auth()->logout();

	return '또 봐요~';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
DB::listen(function ($query) {
	avar_dump($query->sql);
});
*/

/*
Event::listen('article.created', function ($article) {
	var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
	var_dump($article->toArray());
});
*/
