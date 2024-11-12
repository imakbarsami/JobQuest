<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\JobApplicationController;
use App\Http\Controllers\admin\JobController as AdminJobController;
use App\Http\Controllers\admin\JobTypeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/job-details/{id}', [JobController::class, 'job_details'])->name('account.job_details');
Route::get('/jobs', [FrontController::class, 'jobs'])->name('jobs');
Route::post('/job-applied', [JobController::class, 'apply_job'])->name('apply-job');
Route::get('/forget-password/{token}', [AccountController::class, 'new_password_form'])->name('forget-password-token');
Route::post('/forget-password/updated', [AccountController::class, 'update_password_reset_form'])->name('forget-password-updated');



Route::prefix('admin')->group(function () {
    
    Route::group(['middleware'=>'check_role'],function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.add');
        Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('/user/delete', [UserController::class, 'delete'])->name('admin.user.delete');

        //job
        Route::get('/jobs', [AdminJobController::class, 'index'])->name('admin.jobs');
        Route::get('/job/edit/{id}', [AdminJobController::class, 'edit'])->name('admin.job.edit');
        Route::post('/job/update/{id}', [AdminJobController::class, 'update'])->name('admin.job.update');
        Route::post('/job/delete', [AdminJobController::class, 'delete'])->name('admin.job.delete');

        //job application
        Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('admin.job_applications');
        Route::post('/application/delete', [JobApplicationController::class, 'delete'])->name('admin.job_applications.delete');

         //category
         Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
         Route::get('/categories/add', [CategoryController::class, 'create'])->name('admin.categories.add');
         Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
         Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
         Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
         Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');

         //job type
         Route::get('/job-types', [JobTypeController::class, 'index'])->name('admin.job_types');
         Route::get('/job-types/add', [JobTypeController::class, 'create'])->name('admin.job_types.add');
         Route::post('/job-types/store', [JobTypeController::class, 'store'])->name('admin.job_types.store');
         Route::get('/job-types/edit/{id}', [JobTypeController::class, 'edit'])->name('admin.job_types.edit');
         Route::post('/job-types/update/{id}', [JobTypeController::class, 'update'])->name('admin.job-types.update');
         Route::post('/job-types/delete', [JobTypeController::class, 'delete'])->name('admin.job-types.delete');
    });
});


Route::prefix('account')->group(function () {

    Route::group(['middleware'=>'guest'],function(){

        Route::get('/register', [AccountController::class, 'registation'])->name('account.register');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/register-process', [AccountController::class, 'register_process'])->name('account.register_process');
        Route::post('/login-process', [AccountController::class, 'login_process'])->name('account.login_process');
        Route::get('/forget-password', [AccountController::class, 'forget_password'])->name('forget-password');     
        Route::post('/forget-password-process', [AccountController::class, 'forget_password_process'])->name('forget-password-process');
    });

    //protected route
    Route::group(['middleware'=>'auth'],function(){

        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile-update', [AccountController::class, 'profile_update'])->name('account.profile_update');
        Route::post('/profile-pic_update', [AccountController::class, 'update_profile_pic'])->name('account.profile_pic_update');
        Route::post('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
        Route::get('/logout', [AccountController::class, 'logout'])->name(name: 'account.logout');

        //job
        Route::get('/add-job', [JobController::class, 'add_job'])->name('account.add_job');
        Route::get('/my-job/edit/{id}', [JobController::class, 'edit_job'])->name('account.edit_job');
        Route::post('/job-store', [JobController::class, 'store'])->name('account.job_store');
        Route::post('/job-update/{id}', [JobController::class, 'update'])->name('account.job_update');
        Route::delete('/job-delete', [JobController::class, 'delete'])->name('account.job_delete');
        Route::get('/my-jobs', [JobController::class, 'my_jobs'])->name('account.myjobs');
        Route::get('/my-application', [JobController::class, 'my_application'])->name('account.my-application');
        Route::post('/delete-application', [JobController::class, 'delete_application'])->name('account.delete-application');
        Route::get('/save-job', [JobController::class, 'save_job'])->name('account.save-job');
        Route::post('/save-job-process', [JobController::class, 'save_job_process'])->name('account.save-job-process');
        Route::post('/delete-save-post', [JobController::class, 'delete_save_post'])->name('account.delete-save-post');

    });
});
