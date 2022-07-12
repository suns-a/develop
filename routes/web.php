<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\PaymentGateway\Payment;

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

// Route::get('/{locale}', function ($locale) {
//     App::setLocale($locale);
//     return view('welcome');
// });

// Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/home/{name?}', [HomeController::class, 'index'])->name('home.index');

Route::get('/user', [UserController::class,'index'])->name('user.index');

Route::get('/posts', [ClientController::class,'getAllPost'])->name('posts.getallpost');

Route::get('/posts/{id}', [ClientController::class,'getPostById'])->name('posts.getpostbyid');

Route::get('/add-post', [ClientController::class,'addPost'])->name('posts.addpost');

Route::get('/update-post', [ClientController::class,'updatePost'])->name('posts.updatepost');

Route::get('/delete-post/{id}', [ClientController::class,'deletePost'])->name('posts.deletepost');

Route::get('/fluent-string', [FluentController::class,'index'])->name('fluents.index');

Route::get('/login', [LoginController::class,'index'])->name('login.index')->middleware('checkuser');

Route::post('/login', [LoginController::class,'loginSubmit'])->name('login.submit');

Route::get('/session/get', [SessionController::class,'getSessionData'])->name('session.get');

Route::get('/session/set', [SessionController::class,'storeSessionData'])->name('session.store');

Route::get('/session/remove', [SessionController::class,'deleteSessionData'])->name('session.delete');

Route::get('/posts', [PostController::class,'getAllPost'])->name('post.getallpost');

Route::get('/add-post', [PostController::class,'addPost'])->name('post.add');

Route::post('/add-post', [PostController::class,'addPostSubmit'])->name('post.addsubmit');

Route::get('/posts/{id}', [PostController::class,'getPostById'])->name('post.getbyid');

Route::get('/delete-post/{id}', [PostController::class,'deletePost'])->name('post.delete');

Route::get('/edit-post/{id}', [PostController::class,'editPost'])->name('post.edit');

Route::post('/update-post', [PostController::class,'updatePost'])->name('post.update');

Route::get('/inner-join', [PostController::class,'innerJoinClause'])->name('post.innerjoin');

Route::get('/left-join', [PostController::class,'leftJoinClause'])->name('post.leftjoin');

Route::get('/right-join', [PostController::class,'rightJoinClause'])->name('post.rightjoin');

Route::get('/all-posts', [PostController::class,'getAllPostsUsingModel'])->name('post.getAllPostsUsingModel');

Route::get('/test', function () {
    return view('test');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', [PaginationController::class,'allUsers']);

Route::get('/upload', [UploadController::class,'uploadForm']);

Route::post('/upload', [UploadController::class,'uploadFile'])->name('upload.uploadfile');

Route::get('/payment', function () {
    return Payment::process();
});

Route::get('/send-email', [MailController::class,'sendEmail']);

Route::get('/students', [StudentController::class,'fetchStudents']);

Route::get('/add-student', [StudentController::class,'addStudent']);

Route::post('/add-student', [StudentController::class,'storeStudent'])->name('student.store');

Route::get('/all-student', [StudentController::class,'students']);

Route::get('/edit-student/{id}', [StudentController::class,'editStudent']);

Route::post('/update-student', [StudentController::class,'updateStudent'])->name('student.update');

Route::get('/delete-student/{id}', [StudentController::class,'deleteStudent']);

Route::get('/add-user', [UserController::class,'insertRecord']);

Route::get('/get-phone/{id}', [UserController::class,'fetchPhoneByUser']);

Route::get('/add-post', [PostController::class,'addPost']);

Route::get('/add-comment/{id}', [PostController::class,'addComment']);

Route::get('/get-comments/{id}', [PostController::class,'getCommentsByPost']);

Route::get('/add-roles', [RoleController::class,'addRole']);

Route::get('/add-users', [RoleController::class,'addUser']);

Route::get('/rolesbyuser/{id}', [RoleController::class,'getAllRolesByUser']);

Route::get('/usersbyrole/{id}', [RoleController::class,'getAllUsersByRole']);

Route::get('/add-employee', [EmployeeController::class,'addEmployee']);

Route::get('/export-excel', [EmployeeController::class,'exportIntoExcel']);

Route::get('/export-csv', [EmployeeController::class,'exportIntoCSV']);

Route::get('/get-all-employee', [EmpController::class,'getAllEmployees']);

Route::get('/download-pdf', [EmpController::class,'downloadPDF']);

Route::get('/import-form', [EmployeeController::class,'importForm']);

Route::post('/import', [EmployeeController::class,'import'])->name('employee.import');

Route::get('/resize-image', [ImageController::class,'resizeImage']);

Route::post('/resize-image', [ImageController::class,'resizeImageSubmit'])->name('image.resize');

Route::get('/dropzone', [DropzoneController::class,'dropzone']);

Route::post('/dropzone-store', [DropzoneController::class,'dropzoneStore'])->name('dropzone.store');

Route::get('/gallery', [GalleryController::class,'gallery']);

Route::get('/editor', [EditorController::class, 'editor']);

Route::get('/contact-us', [ContactController::class, 'contact']);

Route::post('/send-message', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/get-name', [TestController::class,'getFirstLastName']);

Route::get('/add-product', [ProductController::class, 'addProducts']);

Route::get('/search', [ProductController::class, 'search']);

Route::get('/autocomplete', [ProductController::class, 'autocomplete'])->name('autocomplete');
