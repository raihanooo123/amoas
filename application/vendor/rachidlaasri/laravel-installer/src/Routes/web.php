<?php

Route::group(['prefix' => 'install','as' => 'LaravelInstaller::','namespace' => 'RachidLaasri\LaravelInstaller\Controllers','middleware' => ['web', 'install']], function() {
    Route::get('/', [
        'as' => 'welcome',
        'uses' => 'WelcomeController@welcome'
    ]);


    Route::get('verify-purchase', [
        'as' => 'verifyPurchase',
        'uses' => 'verifyPurchaseController@index'
    ]);

    Route::post('verify-purchase-post', [
        'as' => 'verifyPurchasePost',
        'uses' => 'verifyPurchaseController@verify'
    ]);

    Route::get('app/configure', [
        'as' => 'environmentWizard',
        'uses' => 'EnvironmentController@environmentWizard'
    ]);

    Route::post('app/configuration/save', [
        'as' => 'environmentSaveWizard',
        'uses' => 'EnvironmentController@saveWizard'
    ]);


    Route::get('requirements', [
        'as' => 'requirements',
        'uses' => 'RequirementsController@requirements'
    ]);

    Route::get('permissions', [
        'as' => 'permissions',
        'uses' => 'PermissionsController@permissions'
    ]);

    Route::get('database', [
        'as' => 'database',
        'uses' => 'DatabaseController@database'
    ]);

    Route::get('settings', [
        'as' => 'settings',
        'uses' => 'settingsController@load'
    ]);

    Route::post('settings/save', [
        'as' => 'saveSettings',
        'uses' => 'settingsController@save'
    ]);

    Route::get('setup-completed', [
        'as' => 'final',
        'uses' => 'FinalController@finish'
    ]);

});
