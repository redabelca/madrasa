<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('preinscriptions', 'PreinscriptionsController');
    Route::apiResource('inscriptions', 'InscriptionsController');
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('user-actions', 'UserActionsController');
    Route::apiResource('anneescolaires', 'AnneescolairesController');
    Route::apiResource('cycles', 'CyclesController');
    Route::apiResource('niveaux', 'NiveauxController');
    Route::apiResource('branches', 'BranchesController');
    Route::apiResource('classes', 'ClassesController');
    Route::apiResource('quartiers', 'QuartiersController');
    Route::apiResource('vehicules', 'VehiculesController');
    Route::apiResource('circuits', 'CircuitsController');
    Route::apiResource('eleves', 'ElevesController');
    Route::apiResource('familles', 'FamillesController');
    Route::apiResource('tuteurs', 'TuteursController');
    Route::apiResource('lienparentes', 'LienparentesController');
    Route::apiResource('communes', 'CommunesController');
});
