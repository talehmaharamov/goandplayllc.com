<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\HomeController as BHome;
use App\Http\Controllers\Backend\UserController as BUser;
use App\Http\Controllers\Backend\TeamsController as BTeams;
use App\Http\Controllers\Backend\BlogController as BBlog;
use App\Http\Controllers\Backend\PagesController as BPages;
use App\Http\Controllers\Backend\ContactController as BContact;
use App\Http\Controllers\Backend\TeamMembers as BTeamMember;
use App\Http\Controllers\Backend\SettingsController as BSettings;
use App\Http\Controllers\LanguageController as BLangugage;

use App\Http\Controllers\Frontend\HomeController as FHome;
use App\Http\Controllers\Frontend\LanController as FLan;

//Route::get('lang/{lang}',[BLangugage::class,'switchLang'])->name('switchLang');

Route::get('/langg/{lang}',[FLan::class,'switchLang'])->name('switchLang');

Route::group(['prefix'=>'/admin','as'=> 'backend.','middleware' => 'auth:sanctum','language'], function(){
    Route::get('/',[BHome::class,'index']);
    Route::get('/dashboard',[BHome::class,'index'])->name('dashboard');
    Route::get('/change-password',[BUser::class,'index'])->name('passForm');
    Route::post('/changepassword',[BUser::class,'changePass'])->name('changePass');
    Route::resource('/pages',BPages::class);
    Route::resource('/blogs',BBlog::class);
    Route::post('/page/{id}/createElement',[BPages::class,'createElement'])->name('createElement');
    Route::get('/blog/{id}/edit',[BBlog::class,'editBlog'])->name('editBlog');
    Route::get('/blog/{id}/delete',[BBlog::class,'delBlog'])->name('delBlog');
    Route::get('/page/{id}/delete',[BPages::class,'delPage'])->name('delPage');
    Route::get('/blog/change-status',[BBlog::class,'setStatus'])->name('setStatus');
    Route::get('/page/change-status',[BPages::class,'pageStatus'])->name('pageStatus');
    Route::get('/page/element/change-status',[BPages::class,'elementStatus'])->name('elementStatus');
    Route::post('/page/element/{id}/update',[BPages::class,'updateElement'])->name('updateElement');
    Route::get('/page/{id}/elements',[BPages::class,'elementForm'])->name('elementForm');
    Route::get('/page/elements/{id}/edit',[BPages::class,'editElement'])->name('editElement');
    Route::get('/page/{id}/create-element',[BPages::class,'createElementForm'])->name('createElementForm');
    Route::get('/contact-us',[BContact::class,'index'])->name('contactForm');
    Route::get('/contact/{id}/delete',[BContact::class,'delContact'])->name('delContact');
    Route::get('/team-element/{id}/delete',[BTeams::class,'delTeamElement'])->name('delTeamElement');
    Route::post('/teams-details-update',[BTeams::class,'teamsDetails'])->name('teamsDetails');
    Route::resource('/teams',BTeams::class);
    Route::resource('/teams-members',BTeamMember::class);
    Route::get('/team/members/{id}/delete',[BTeamMember::class,'delMember'])->name('delMember');
    Route::get('/teams/element/{id}/change-status',[BTeams::class,'teamStatus'])->name('teamStatus');
    Route::resource('/settings',BSettings::class);
    Route::get('/settings/{id}/delete',[BSettings::class,'delSetting'])->name('delSetting');
    Route::get('/settings/{id}/change-status',[BSettings::class,'settingStatus'])->name('settingStatus');

});

Route::group(['prefix'=>'/','as'=> 'frontend.'], function(){
    Route::get('/',[FHome::class,'index'])->name('index');
    Route::get('pages/{slug}',[FHome::class,'toPage'])->name('toPage');
    Route::get('/contact',[FHome::class,'contactForm'])->name('contactForm');
    Route::post('/add-contact',[FHome::class,'addContact'])->name('addContact');
    Route::get('/team',[FHome::class,'teamsForm'])->name('teamsForm');
});


