<?php

use Illuminate\Support\Facades\Route;
use EburonMedia\EcmaCore\Http\Controllers\AuthController;
use EburonMedia\EcmaCore\Http\Controllers\AdminsController;
use EburonMedia\EcmaCore\Http\Controllers\DashboardController;
use EburonMedia\EcmaCore\Http\Controllers\MaintenanceController;
use EburonMedia\EcmaCore\Http\Controllers\EcmaInstallerController;

Route::group(
    [
        'middleware' => 'web'
    ],
    function () {
        Route::get(config('ecma-core.route_name').'/login', [AuthController::class, 'login'])->name('ecma.login');
        Route::post(config('ecma-core.route_name').'/login', [AuthController::class, 'doLogin'])->name('ecma.do_login');

        Route::get(config('ecma-core.route_name').'/installer', [EcmaInstallerController::class, 'installer'])->name('ecma.installer');
        Route::post(config('ecma-core.route_name').'/installer', [EcmaInstallerController::class, 'doInstall'])->name('ecma.do_install');

        Route::group(
            [
                'prefix' => config('ecma-core.route_name'),
                'middleware' => 'ecma.admin'
            ],
            function () {
                Route::get('logout', [AuthController::class, 'logout'])->name('ecma.logout');
                Route::get('profile', [AdminsController::class, 'profile'])->name('ecma.profile');
                Route::post('update_profile', [AdminsController::class, 'updateProfile'])->name('ecma.update_profile');

                Route::group(
                    [
                        'prefix' => 'settings'
                    ],
                    function () {
                        Route::group(
                            [
                                'prefix' => 'admins'
                            ],
                            function () {
                                Route::get('/', [AdminsController::class, 'index'])->name('ecma.admins');
                                Route::post('store', [AdminsController::class, 'store'])->name('ecma.admins.store');
                                Route::get('edit/{user_id}', [AdminsController::class, 'edit'])->name('ecma.admins.edit');
                                Route::post('update/{user_id}', [AdminsController::class, 'update'])->name('ecma.admins.update');
                                Route::post('email_add', [AdminsController::class, 'emailAdd'])->name('ecma.admins.email_add');
                                Route::post('email_update/{user_id}', [AdminsController::class, 'emailUpdate'])->name('ecma.admins.email_update');
                            }
                        );
                        Route::group(
                            [
                                'prefix' => 'maintenance'
                            ],
                            function () {
                                Route::get('/', [MaintenanceController::class, 'index'])->name('ecma.maintenance');
                                Route::post('update', [MaintenanceController::class, 'update'])->name('ecma.maintenance.update');
                                Route::post('store_ip', [MaintenanceController::class, 'storeIp'])->name('ecma.maintenance.store_ip');
                                Route::post('delete_ip', [MaintenanceController::class, 'deleteIp'])->name('ecma.maintenance.delete_ip');
                            }
                        );
                    }
                );
            }
        );
    }
);
