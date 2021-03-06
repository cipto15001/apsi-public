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
    return auth()->check() ? redirect('/workspaces') : redirect('/login');
});

Auth::routes();

Route::group([
    'middleware' => 'auth',
], function () {
    Route::resource('simulations', 'SimulationsController');
    Route::resource('users', 'UsersController')->middleware('admin');
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    // Workspace
    Route::get('workspaces', 'WorkspacesController@index')->name('workspaces.index');
    Route::post('workspaces/store', 'WorkspacesController@store')->name('workspaces.store');
    Route::get('workspaces/{workspace}', 'WorkspacesController@show')->name('workspaces.show');
    Route::delete('workspaces/{workspace}/delete', 'WorkspacesController@delete')->name('workspaces.delete');
    Route::get('workspaces/file/fileManager', 'WorkspacesController@fileManager')->name('workspaces.fileManager');

    Route::put('simulations/{simulation}/update_simul', 'SimulationsController@update_simulation_parameters');
    Route::put('simulations/{simulation}/{id}/detach_simul', 'SimulationsController@detach_simulation_parameter');

    Route::get('workspaces/{workspace}/output', 'OutputController@index')->name('workspaces.output.index');

    // Job Create
    {
        Route::get('workspaces/{workspace}/jobs', 'JobsController@index')->name('workspaces.jobs.index');
        Route::get('workspaces/{workspace}/jobs/new', 'JobsController@createEmpty')->name('workspaces.jobs.create_empty');
        Route::get('workspaces/{workspace}/jobs/new/{slug}', 'JobsController@editTemplate')->name('workspaces.jobs.edit_template');
        Route::get('workspaces/{workspace}/jobs/new/{slug}/editor', 'JobsController@editInEditor')->name('workspaces.jobs.edit_in_editor');
        Route::get('workspaces/{workspace}/jobs/new/{slug}/gui', 'JobsController@create')->name('workspaces.jobs.create_gui');
        Route::post('workspace/{workspace}/jobs', 'JobsController@store')->name('workspaces.jobs.store');
    }

    // Job Update
    {
        Route::get('workspaces/{workspace}/jobs/{job}/edit', 'JobsController@edit')->name('workspaces.jobs.edit');
        Route::put('workspaces/{workspace}/jobs/{job}/update', 'JobsController@update')->name('workspaces.jobs.update');
    }

    // Job Delete, Job Run, Job Log
    {
        Route::delete('workspaces/{workspace}/jobs/{job}/delete', 'JobsController@deleteJob')->name('workspaces.jobs.delete');
        Route::get('workspaces/{workspace}/jobs/{job}/run', 'JobsController@run')->name('workspaces.jobs.run');
        Route::get('workspaces/{workspace}/jobs/{job}/log', 'JobsController@log')->name('workspaces.jobs.log');
    }

    Route::get('workspaces/{workspace}/files/image', 'FilesController@image')->name('workspaces.files.image');
    Route::get('workspaces/{workspace}/files/video', 'FilesController@video')->name('workspaces.files.video');

    /* PNG2CVT */
    {
        Route::get('workspaces/{workspace}/png2cvt', 'PNG2CVTController@index')->name('workspaces.png2cvt.index');
        Route::get('workspaces/{workspace}/jobs/{job}/getFiles', 'PNG2CVTController@getFiles')->name('workspaces.png2cvt.get_files');
        Route::post('workspaces/{workspace}/png2cvt/{job}/doConvert', 'PNG2CVTController@doConvert')->name('workspaces.png2cvt.do_convert');
        Route::get('workspaces/{workspace}/cli', 'WebCLIController@index')->name('workspaces.cli');
    }

    Route::post('workspace/{workspace}/jobs/confirm/{slug}', 'JobsController@confirm')->name('jobs.confirm');
    Route::get('jobs/{key}', 'JobsController@show')->name('jobs.show');
    Route::get('jobs/refresh/{key}', 'JobsController@refresh')->name('jobs.refresh');
    Route::delete('jobs/{job}', 'JobsController@destroy')->name('jobs.destroy');
    Route::get('workspaces/{workspace}/log', 'LogsController@index')->name('workspaces.logs');

    // Render
    Route::get('workspaces/{workspace}/render', 'RenderController@index')->name('render.index');
    Route::post('workspaces/{workspace}/render', 'RenderController@doRender')->name('render.do_render');

    // User
    Route::put('/user/change_email', 'UsersController@changeEmail')->name('users.change_email');
    Route::get('/user/check_old_password', 'UsersController@checkOldPassword')->name('users.check_old_password');
    Route::put('/user/change_password', 'UsersController@changePassword')->name('users.change_password');
    Route::post('/user/add_new_user', 'UsersController@store')->name('users.add_new_user');
    Route::get('/user/check_email', 'UsersController@checkEmail')->name('users.check_email');
});
Route::post('api/webcli/{workspace}/do_command', 'WebCLIController@doCommand');

Route::post('api/file_manager/list', 'FilesManagerController@list');
Route::post('api/file_manager/rename', 'FilesManagerController@rename');
Route::post('api/file_manager/createFolder', 'FilesManagerController@createFolder');
Route::post('api/file_manager/remove', 'FilesManagerController@remove');
Route::post('api/file_manager/move', 'FilesManagerController@move');
Route::post('api/file_manager/compress', 'FilesManagerController@compress');
Route::post('api/file_manager/extract', 'FilesManagerController@extract');
Route::post('api/file_manager/upload', 'FilesManagerController@upload');
Route::post('api/file_manager/copy', 'FilesManagerController@copy');
Route::post('api/file_manager/getContent', 'FilesManagerController@getContent');
Route::post('api/file_manager/edit', 'FilesManagerController@edit');
Route::get('api/file_manager/download', 'FilesManagerController@download');
