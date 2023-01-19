<?php
Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {

   Route::get('user_accounts', [\ParthShukla\UserManagement\Http\Controllers\UserAccountController::class, 'index'])
       ->name('accountList');
   Route::put('user_accounts/status/change', [\ParthShukla\UserManagement\Http\Controllers\UserAccountController::class, 'changeStatus'])
       ->name('changeAccountStatus');

});
