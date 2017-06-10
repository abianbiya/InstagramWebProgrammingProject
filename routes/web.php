
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('halaman_test');
});

Route::get('/admin', function () {
    return view('admin/index');
});

Auth::routes();

//Show
Route::get('/home', 'HomeController@index')
	->name('home');

Route::get('/menu', 'HomeController@menu')
	->name('menu');

Route::get('/grup-menu', 'HomeController@grupMenu')
	->name('grup-menu');

Route::get('/user', 'HomeController@user')
	->name('user');

Route::get('/peran', 'HomeController@peran')
	->name('peran');

//Input - Form
Route::get('/menu/insert', 'HomeController@menuInsert')
	->name('menu.insert');

Route::get('/grup-menu/insert', 'HomeController@grupMenuInsert')
	->name('grup-menu.insert');

Route::get('/peran/insert', 'HomeController@peranInsert')
	->name('peran.insert');

//Input - Process

Route::post('/menu/insert/process', 'HomeController@menuInsertProcess')
	->name('menu.insert.process');

Route::post('/grup-menu/insert/process', 'HomeController@grupMenuInsertProcess')
	->name('grup-menu.insert.process');

Route::post('/peran/insert/process', 'HomeController@peranInsertProcess')
	->name('peran.insert.process');

//User Peran

Route::get('/user/peran/{id}', 'HomeController@userPeran')
	->name('user.peran');

Route::post('/user/peran/process', 'HomeController@userPeranProcess')
	->name('user.peran.update.process');

//Menu Kewenangan

Route::get('/menu/kewenangan/{id}', 'HomeController@menuKewenangan')
	->name('menu.kewenangan');

Route::post('/menu/kewenangan/process', 'HomeController@menuKewenanganProcess')
	->name('menu.kewenangan.update.process');

//Delete

Route::get('/menu/delete/{id}', 'HomeController@deleteMenu')
	->name('menu.delete');

Route::get('/grup-menu/delete/{id}', 'HomeController@deleteGrupMenu')
	->name('grup-menu.delete');

Route::get('/peran/delete/{id}', 'HomeController@deletePeran')
	->name('peran.delete');

//List Menu

Route::get('/menu/admin/create', 'HomeController@menuAdminCreate')
	->name('menu.admin.create');

Route::get('/menu/admin/read', 'HomeController@menuAdminRead')
	->name('menu.admin.read');

Route::get('/menu/admin/update', 'HomeController@menuAdminUpdate')
	->name('menu.admin.update');

Route::get('/menu/admin/delete', 'HomeController@menuAdminDelete')
	->name('menu.admin.delete');



Route::get('/menu/root/read', 'HomeController@menuRootRead')
	->name('menu.root.read');

Route::get('/menu/root/create', 'HomeController@menuRootCreate')
	->name('menu.root.create');

Route::get('/menu/root/update', 'HomeController@menuRootUpdate')
	->name('menu.root.update');

Route::get('/menu/root/delete', 'HomeController@menuRootDelete')
	->name('menu.root.delete');