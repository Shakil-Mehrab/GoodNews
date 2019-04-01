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
Route::get('/','layout\FrontController@welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});

Route::group(['prefix'=>'super-admin','middleware'=>['admin']],function(){
    //News
    Route::resource('/admin-news','Admin\NewsController');
    Route::resource('/admin-categories','Admin\CategoryController');
    Route::post('/update-product/{product_id}','Admin\NewsController@postUpdateProduct')->name('admin-news.update');  
    Route::get('/delete-product/{product_id}','Admin\NewsController@getDeleteProduct')->name('admin-news.delete');
    //User
    Route::get('/user-profile','Admin\UserLoginController@getUserProfile')->name('admin-user.profile'); 
    Route::get('/edit-user-account/{user_id}','Admin\UserLoginController@getEditUserAccount')->name('admin-account.edit'); 
    Route::post('/update-user-account/{user_id}','Admin\UserLoginController@postUpdateUserAccount')->name('admin-account.update');     
    Route::get('/edit-user/{user_id}','Admin\UserLoginController@getEditUser')->name('admin-user.edit'); 
    Route::post('/update-user/{user_id}','Admin\UserLoginController@postUpdateUser')->name('admin-user.update');
    Route::get('/users','Admin\UserLoginController@getUsers')->name('admin-users');  
    Route::get('/view-user/{user_id}','Admin\UserLoginController@getViewUser')->name('admin-user.show'); 
    Route::get('/change-to-author/{user_id}','Admin\UserLoginController@getChangeToAuthor')->name('admin-change-to-author');
    Route::get('/change-to-admin/{user_id}','Admin\UserLoginController@getChangeToAdmin')->name('author-change-to-admin');
    Route::get('/delete-user/{user_id}','Admin\UserLoginController@getDeleteUser')->name('admin-user.destroy');
    //Category
    Route::post('/toggle-categories/{categories_id}','Admin\CategoryController@toggleCategories')->name('toggle.categories');	
    Route::get('/category-delete/{category_id}','Admin\CategoryController@getDeleteCategory')->name('admin-category.delete');	
    Route::post('/category-update/{category_id}','Admin\CategoryController@postUpdateCategory')->name('admin-category.update');
    
    Route::get('/test', function() {
        $notifications=auth()->user()->unreadNotifications;
        foreach($notifications as $notification){
            dd($notification->data['user']['name']);
        } 
        });   
    //comment
    Route::get('/comment-index','Admin\ActionController@getComments')->name('admin-comment.index'); 	   
    Route::post('/comment-save/{comment_id}','Admin\ActionController@postSaveComment')->name('comment.store');
    Route::get('/comment-page/{news_id}','Admin\ActionController@getshowFrontComment')->name('comment.show');   
    Route::get('/comment-edit/{comment_id}','Admin\ActionController@getEditComment')->name('admin-comment.edit');
    Route::post('/comment-update/{comment_id}','Admin\ActionController@postUpdateComment')->name('admin-comment.update');
    Route::get('/comment-delete/{comment_id}','Admin\ActionController@getCommentDelete')->name('admin-comment.delete');	
           
    });


Route::get('signin-page','UserLoginController@getSignInPage')->name('signin-page');
Route::get('signin','UserLoginController@getLogin')->name('signin');
Route::get('signup-page','UserLoginController@getSignUpPage')->name('signup-page');   
Route::get('signup','UserLoginController@getSignup')->name('signup'); 

Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
    Route::get('/', 'HomeController@index')->name('dashboard');
    //News
    Route::resource('/news','Layouts\NewsController');
    Route::resource('/categories','Layouts\CategoryController');
    Route::post('/update-product/{product_id}','Layouts\NewsController@postUpdateProduct')->name('news.update');  
    Route::get('/delete-product/{product_id}','Layouts\NewsController@getDeleteProduct')->name('news.delete');
    Route::get('/share/{news_id}','Layouts\NewsShareController@index')->name('news.share.index');
    Route::post('/store-share/{news_id}','Layouts\NewsShareController@store')->name('news.share.store');

    //User
    Route::get('/user-profile','UserLoginController@getUserProfile')->name('user.profile'); 
    Route::get('/edit-user/{user_id}','UserLoginController@getEditUser')->name('user.edit'); 
    Route::post('/update-user/{user_id}','UserLoginController@postUpdateUser')->name('user.update');
    Route::get('/users','UserLoginController@getUsers')->name('users');  
    Route::get('/view-user/{user_id}','UserLoginController@getViewUser')->name('user.show'); 
    Route::get('/delete-user/{user_id}','UserLoginController@getDeleteUser')->name('user.destroy');
    //Category
    Route::post('/toggle-categories/{categories_id}','CategoryController@toggleCategories')->name('toggle.categories');	
    Route::get('/category-delete/{category_id}','Layouts\CategoryController@getDeleteCategory')->name('category.delete');	
    Route::post('/category-update/{category_id}','Layouts\CategoryController@postUpdateCategory')->name('category.update');
    Route::get('/test', function() {
        $notifications=auth()->user()->unreadNotifications;
        foreach($notifications as $notification){
            dd($notification->data['user']['name']);
        } 
        });   
    //comment
    Route::get('/comment-index','Layouts\ActionController@getComments')->name('comment.index'); 	   
    Route::post('/comment-save/{news_id}','Layouts\ActionController@postSaveComment')->name('comment.store');
    Route::get('/comment-page/{news_id}','Layouts\ActionController@getshowFrontComment')->name('comment.show');   
    Route::get('/comment-edit/{comment_id}','Layouts\ActionController@getEditComment')->name('comment.edit');
    Route::post('/comment-update/{comment_id}','Layouts\ActionController@postUpdateComment')->name('comment.update');
    Route::get('/comment-delete/{comment_id}','Layouts\ActionController@getCommentDelete')->name('comment.delete');	
    //Reply
     //comment
    Route::get('/reply-index','Layouts\ReplyController@getComments')->name('reply.index');        
    Route::post('/reply-save/{comment_id}','Layouts\ReplyController@postSaveReply')->name('reply.store');
    Route::get('/reply-page/{news_id}','Layouts\ReplyController@getshowFrontComment')->name('reply.show');   
    Route::get('/reply-edit/{comment_id}','Layouts\ReplyController@getEditComment')->name('reply.edit');
    Route::post('/reply-update/{comment_id}','Layouts\ReplyController@postUpdateComment')->name('reply.update');
    Route::get('/reply-delete/{comment_id}','Layouts\ReplyController@getCommentDelete')->name('reply.delete'); 
        
});
//single news
Route::get('/top-news','Layout\Single\TopNewsController@getToplNews')->name('top.index');
Route::get('/latest-news','Layout\Single\LatestNewsController@getLatestNews')->name('latest.index');     
Route::get('/national-news','Layout\Single\NationalNewsController@getNationalNews')->name('national.index');    
Route::get('/international-news','Layout\Single\InternationalNewsController@getInternationalNews')->name('international.index');     
Route::get('/science-news','Layout\Single\ScienceNewsController@getScienceNews')->name('science.index');
Route::get('/latestsports-news','Layout\Single\SportsNewsController@getLatestsportsNews')->name('latestsports.index');        
Route::get('/sports-news','Layout\Single\SportsNewsController@getSportsNews')->name('sports.index');        
Route::get('/politics-news','Layout\Single\PoliticsNewsController@getPoliticsNews')->name('politics.index'); 
Route::get('/district-news','Layout\Single\DistrictNewsController@getDistrictNews')->name('district.index'); 
Route::get('/education-news','Layout\Single\EducationNewsController@getEducationNews')->name('education.index');
Route::get('/campus-news','Layout\Single\CampusNewsController@getCampusNews')->name('campus.index');      
Route::get('/economics-news','Layout\Single\EconomicsNewsController@getEconomicsNews')->name('economics.index');  
Route::get('/literature-news','Layout\Single\LiteratureNewsController@getLiteratureNews')->name('literature.index');         
Route::get('/recreation-news','Layout\Single\RecreationNewsController@getRecreationNews')->name('recreation.index'); 
Route::get('/bandmusic-news','Layout\Single\BandMusicNewsController@geBandmusictNews')->name('bandmusic.index'); 
Route::get('/healthfitnes-news','Layout\Single\HealthFitnessNewsController@getHealthfitnesNews')->name('healthfitnes.index');
Route::get('/lifestyle-news','Layout\Single\LifestyleNewsController@getLifestyleNews')->name('lifestyle.index');  
Route::get('/final-news','Layout\Single\FinalNewsController@getFinalNews')->name('final.index');
Route::get('/single-news/{new_id}','Layout\FrontController@getSingleNews')->name('new.single'); 
Route::get('/bussiness-news','Layout\NewsController@getBussinessNews')->name('bussiness.index');
Route::get('/holiday-news','Layout\NewsController@getHolidayNews')->name('holiday.index');   
Route::post('/subcriber','Layout\Single\SubscriberNewsController@postSaveSubscriber')->name('subscribe.save');   
Route::post('/search','Layout\SearchController@postSerchNews')->name('search.news');     
 