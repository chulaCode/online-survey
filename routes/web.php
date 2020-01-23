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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userlogout', 'HomeController@userlogout')->name('home.userlogout');
Route::post('/survey/{id}', 'SurveyController@store')->name('survey.store');
Route::get('/survey/{id}', 'SurveyController@index')->name('survey.index');



Route::prefix('director')->group(function(){
   Route::get('/login','Auth\DirectorLoginController@showLoginForm')->name('director.login');
   Route::post('/login','Auth\DirectorLoginController@login')->name('director.login.submit');
   Route::get('/logout','Auth\DirectorLoginController@logout')->name('director.logout');
   //password reset routes
   Route::post('password/email','Auth\DirectorForgotPasswordController@sendResetLinkEmail')->name('director.password.email');
   Route::get('/password/reset','Auth\DirectorForgotPasswordController@showLinkedRequestForm')->name('director.password.request');
   Route::get('/password/reset','Auth\DirectorForgotPasswordController@reset');
   Route::get('/password/reset/{token}','Auth\DirectorForgotPasswordController@showResetForm')->name('director.password.reset');
  
});
Route::prefix('Director')->group(function(){
   Route::get('/director', 'DirectorController@index')->name('dept.show');
   Route::get('/dept-chairs', 'DepartmentController@index')->name('dept-chair.show');
   Route::get('/survey', 'DirectorController@show')->name('survey.show');
   
   Route::get('/dept-chair', 'DepartmentController@create')->name('dept-chair.create');
   Route::get('/department', 'DirectorController@create')->name('dept.create');

   Route::post('/dept-chair', 'DepartmentController@store')->name('dept-chair.store');
   Route::post('/department', 'DirectorController@store')->name('dept.store');

   Route::patch('/dept-chair{id}', 'DepartmentController@update')->name('dept-chair.update');
   Route::patch('/department{id}', 'DirectorController@update')->name('dept.update');

   Route::delete('/dept-chair{id}', 'DepartmentController@destroy')->name('dept-chair.destroy');
   Route::delete('/department{id}', 'DirectorController@destroy')->name('dept.destroy');

   Route::get('/dept-chair{id}', 'DepartmentController@edit')->name('dept-chair.edit');
   Route::get('/department{id}', 'DirectorController@edit')->name('dept.edit');
  
  
  
  
});
Route::prefix('chair')->group(function(){
   Route::get('/login','Auth\ChairLoginController@showLoginForm')->name('chair.login');
   Route::post('/login','Auth\ChairLoginController@login')->name('chair.login.submit');
   Route::get('/logout','Auth\ChairLoginController@logout')->name('chair.logout');
     //password reset routes
   Route::post('password/email','Auth\ChairForgotPasswordController@sendResetLinkEmail')->name('chair.password.email');
   Route::get('/password/reset','Auth\ChairForgotPasswordController@showLinkedRequestForm')->name('chair.password.request');
   Route::get('/password/reset','Auth\ChairForgotPasswordController@reset');
   Route::get('/password/reset/{token}','Auth\ChairForgotPasswordController@showResetForm')->name('chair.password.reset');
   
   Route::get('/', 'ChairController@index')->name('chair.show');
   Route::get('/semesters','SemesterController@index')->name('semester.show');
   Route::get('/teachers','TeacherController@index')->name('teacher.show');

   Route::get('/semester','SemesterController@create')->name('semester.create');
   Route::get('/teacher','TeacherController@create')->name('teacher.create');

   Route::post('/semester','SemesterController@store')->name('semester.store');
   Route::post('/teacher','TeacherController@store')->name('teacher.store');


   Route::patch('/semester{id}','SemesterController@update')->name('semester.update');
   Route::patch('/teacher{id}','TeacherController@update')->name('teacher.update');


   Route::delete('/semester{id}','SemesterController@destroy')->name('semester.destroy');
   Route::delete('/teacher{id}','TeacherController@destroy')->name('teacher.destroy');

   Route::get('/teacher{id}/edit','TeacherController@edit')->name('teacher.edit');
   Route::get('/semester{id}/edit','SemesterController@edit')->name('semester.edit');
 });

 Route::prefix('instructor')->group(function(){
    Route::get('/login','Auth\InstructorLoginController@showLoginForm')->name('instructor.login');
    Route::post('/login','Auth\InstructorLoginController@login')->name('instructor.login.submit');
    Route::get('/logout','Auth\InstructorLoginController@logout')->name('instructor.logout');
     //password reset routes
    Route::post('password/email','Auth\InstructorForgotPasswordController@sendResetLinkEmail')->name('instructor.password.email');
    Route::get('/password/reset','Auth\InstructorForgotPasswordController@showLinkedRequestForm')->name('instructor.password.request');
    Route::get('/password/reset','Auth\InstructorForgotPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\InstructorForgotPasswordController@showResetForm')->name('instructor.password.reset');
   
    Route::get('/', 'InstructorController@index')->name('instructor.show');//survey
    Route::get('/course', 'CourseController@index')->name('course.show');
    Route::get('/assessments', 'AssessmentController@index')->name('assessment.show');
    Route::get('/student', 'StudentController@index')->name('student.show');
    Route::get('/actions', 'ActionsController@index')->name('action.show');
    Route::get('/survey', 'SurveyOutcomeController@index')->name('survey.print');
    Route::get('assigns','AssignController@index')->name('assign.show');
    Route::get('/action-survey', 'ActionsController@show')->name('action.index');
    Route::get('/display/{id}', 'InstructorController@show')->name('display.index');


    Route::get('/assessment', 'AssessmentController@create')->name('assessment.create');
    Route::get('/course-create', 'CourseController@create')->name('course.create');
    Route::get('/studentCreate','StudentController@create')->name('student.create');
    Route::get('/create','SurveyOutcomeController@create')->name('survey.create');
    Route::get('assign','AssignController@create')->name('assign.create');
   


    Route::post('/assessment', 'AssessmentController@store')->name('assessment.store');
    Route::post('/course', 'CourseController@store')->name('course.store');
    Route::post('/student','StudentController@store')->name('student.store');
    Route::post('/question', 'SurveyOutcomeController@store')->name('question.store');
    Route::post('assign','AssignController@store')->name('assign.store');
    Route::post('/action', 'ActionsController@store')->name('action.store');
    
    Route::patch('/assessment{id}', 'AssessmentController@update')->name('assessment.update');
    Route::patch('/surveys/{question}', 'SurveyOutcomeController@update')->name('survey.update');
    Route::patch('/students/{student}', 'StudentController@update')->name('student.update');
    Route::patch('/course/{course}', 'CourseController@update')->name('course.update');
    Route::patch('assign/{id}','AssignController@update')->name('assign.update');
    Route::patch('/action/{id}', 'ActionsController@update')->name('action.update');
    Route::get('/action/{id}', 'ActionsController@create')->name('action.create');
    
   

    Route::delete('/assessment{id}', 'AssessmentController@destroy')->name('assessment.destroy');
    Route::delete('/surveys/{question}', 'SurveyOutcomeController@destroy')->name('survey.destroy');
    Route::delete('/students/{student}', 'StudentController@destroy')->name('student.destroy');
    Route::delete('/course/{course}', 'CourseController@destroy')->name('course.destroy');
    Route::delete('/action{id}', 'ActionsController@destroy')->name('action.destroy');

    Route::get('/assessment{id}/edit', 'AssessmentController@edit')->name('assessment.edit');
    Route::get('/surveys/{question}/edit', 'SurveyOutcomeController@edit')->name('survey.edit');
    Route::get('/students/{student}/edit', 'StudentController@edit')->name('student.edit');
    Route::get('/course/{course}/edit', 'CourseController@edit')->name('course.edit');
    Route::get('assign/{id}/edit','AssignController@edit')->name('assign.edit');
    Route::get('/action/{id}/edit', 'ActionsController@edit')->name('action.edit');

   });




