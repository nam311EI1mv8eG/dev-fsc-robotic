<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);
Route::get('/testvue', 'TestVueController@index')->name('testvue.home');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Season
    Route::delete('seasons/destroy', 'SeasonController@massDestroy')->name('seasons.massDestroy');
    Route::post('seasons/parse-csv-import', 'SeasonController@parseCsvImport')->name('seasons.parseCsvImport');
    Route::post('seasons/process-csv-import', 'SeasonController@processCsvImport')->name('seasons.processCsvImport');
    Route::resource('seasons', 'SeasonController');

    // Match
    Route::delete('matches/destroy', 'MatchController@massDestroy')->name('matches.massDestroy');
    Route::post('matches/parse-csv-import', 'MatchController@parseCsvImport')->name('matches.parseCsvImport');
    Route::post('matches/process-csv-import', 'MatchController@processCsvImport')->name('matches.processCsvImport');
    Route::resource('matches', 'MatchController');
    Route::get('matches/calculate-score/{match}', 'MatchController@calculateScore')->name('matches.calculateScore');
    Route::post('matches/send-score', 'MatchController@sendScore')->name('matches.sendScore');

    

    // Score Detail
    Route::delete('score-details/destroy', 'ScoreDetailController@massDestroy')->name('score-details.massDestroy');
    Route::post('score-details/parse-csv-import', 'ScoreDetailController@parseCsvImport')->name('score-details.parseCsvImport');
    Route::post('score-details/process-csv-import', 'ScoreDetailController@processCsvImport')->name('score-details.processCsvImport');
    Route::resource('score-details', 'ScoreDetailController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');

    // Match Team
    Route::delete('match-teams/destroy', 'MatchTeamController@massDestroy')->name('match-teams.massDestroy');
    Route::post('match-teams/parse-csv-import', 'MatchTeamController@parseCsvImport')->name('match-teams.parseCsvImport');
    Route::post('match-teams/process-csv-import', 'MatchTeamController@processCsvImport')->name('match-teams.processCsvImport');
    Route::resource('match-teams', 'MatchTeamController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Season
    Route::delete('seasons/destroy', 'SeasonController@massDestroy')->name('seasons.massDestroy');
    Route::resource('seasons', 'SeasonController');

    // Match
    Route::delete('matches/destroy', 'MatchController@massDestroy')->name('matches.massDestroy');
    Route::resource('matches', 'MatchController');

    // Score Detail
    Route::delete('score-details/destroy', 'ScoreDetailController@massDestroy')->name('score-details.massDestroy');
    Route::resource('score-details', 'ScoreDetailController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Match Team
    Route::delete('match-teams/destroy', 'MatchTeamController@massDestroy')->name('match-teams.massDestroy');
    Route::resource('match-teams', 'MatchTeamController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
