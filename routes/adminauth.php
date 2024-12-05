<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MetaController;
use App\Http\Controllers\Admin\MultiImageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;

use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;

Route::middleware('guest:admin')->group(function () {

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
        ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');
});


//Admin DashBOard
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');
});

//Admin Profile
Route::middleware(['auth:admin', 'verified'])->group(function () {

    //Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    //Admin Password
    Route::get('/admin-password', [AdminController::class, 'AdminPasswordPage'])->name('admin.password.page');
    Route::post('/admin/password/update/submit', [AdminController::class, 'AdminPasswordUpdateSubmit'])->name('admin.password.update.submit');
});


// Role In Permission
Route::middleware(['auth:admin'])->group(function () {

    Route::controller(RoleController::class)->group(function () {

        //Permission
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Role
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        //Role In Permission
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('store.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');

        //Admin Role Permission
        Route::get('/admin-all', 'AdminPermission')->name('all.admin.permission');
        Route::post('/admin-store', 'StoreAdminPermission')->name('store.admin.permission');
        Route::get('/admin-edit/{id}', 'EditAdminPermission')->name('edit.admin.permission');
        Route::post('/admin-update/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/admin-delete/{id}', 'DeleteAdmin')->name('delete.admin');

        Route::get('/admin-inactive/{id}', 'InactiveAdmin')->name('admin.inactive');
        Route::get('/admin-active/{id}', 'ActiveAdmin')->name('admin.active');
    });

    //Deffernet Work

    //Send Team Mail
    Route::post('/admin/team/sendEmail', [TeamController::class, 'sendEmail'])->name('admin.team.sendEmail');
});


Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    //Crud Operation
    Route::resources(
        [
            'banner' => BannerController::class,
            'project' => ProjectController::class,
            'multiImage' => MultiImageController::class,

            'about' => AboutController::class,

            'team'   => TeamController::class,
            'testimonial' => TestimonialController::class,
            'contact' => ContactController::class,

        ],

    );

    //Setting Section
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'updateOrcreateSetting'])->name('settings.updateOrCreate');

    //Meta Section
    Route::get('/meta', [MetaController::class, 'indexMeta'])->name('meta.indexMeta');
    Route::put('/meta', [MetaController::class, 'updateOrcreateMeta'])->name('meta.updateOrCreateMeta');

    //Backup
    Route::get('/backup', [AdminController::class, 'downloadBackup'])->name('meta.download');
});
