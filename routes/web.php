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
Route::get('/','FrontController@welcome');
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
    Route::post('/update-product/{product_id}',[
        'uses'=>'Admin\NewsController@postUpdateProduct',
        'as'=>'admin-news.update',
        ]);  
    Route::get('/delete-product/{product_id}',[
        'uses'=>'Admin\NewsController@getDeleteProduct',
        'as'=>'admin-news.delete',
        ]);
    //User
    Route::get('/user-profile',[
        'uses'=>'Admin\UserLoginController@getUserProfile',
        'as'=>'admin-user.profile',
        ]); 
        Route::get('/edit-user-account/{user_id}',[
            'uses'=>'Admin\UserLoginController@getEditUserAccount',
            'as'=>'admin-account.edit',
            ]); 
            Route::post('/update-user-account/{user_id}',[
                'uses'=>'Admin\UserLoginController@postUpdateUserAccount',
                'as'=>'admin-account.update',
                ]);     
    Route::get('/edit-user/{user_id}',[
        'uses'=>'Admin\UserLoginController@getEditUser',
        'as'=>'admin-user.edit',
        ]); 
    Route::post('/update-user/{user_id}',[
        'uses'=>'Admin\UserLoginController@postUpdateUser',
        'as'=>'admin-user.update',
        ]);
    Route::get('/users',[
        'uses'=>'Admin\UserLoginController@getUsers',
        'as'=>'admin-users',
        ]);  
    Route::get('/view-user/{user_id}',[
        'uses'=>'Admin\UserLoginController@getViewUser',
        'as'=>'admin-user.show',
        ]); 
    Route::get('/change-to-author/{user_id}',[
        'uses'=>'Admin\UserLoginController@getChangeToAuthor',
        'as'=>'admin-change-to-author',
        ]);
    Route::get('/change-to-admin/{user_id}',[
        'uses'=>'Admin\UserLoginController@getChangeToAdmin',
        'as'=>'author-change-to-admin',
        ]);
    Route::get('/delete-user/{user_id}',[
        'uses'=>'Admin\UserLoginController@getDeleteUser',
        'as'=>'admin-user.destroy',
        ]);
    //Category
    Route::post('/toggle-categories/{categories_id}',[
        'uses'=>'Admin\CategoryController@toggleCategories',
        'as'=>'toggle.categories'
        ]);	
    Route::get('/category-delete/{category_id}',[
        'uses'=>'Admin\CategoryController@getDeleteCategory',
        'as'=>'admin-category.delete'
        ]);	
    Route::post('/category-update/{category_id}',[
        'uses'=>'Admin\CategoryController@postUpdateCategory',
        'as'=>'admin-category.update'
        ]);
    
    Route::get('/test', function() {
        $notifications=auth()->user()->unreadNotifications;
        foreach($notifications as $notification){
            dd($notification->data['user']['name']);
        } 
        });   
    //comment
    Route::get('/comment-index',[
        'uses'=>'Admin\ActionController@getComments',
        'as'=>'admin-comment.index'
        ]); 	   
    Route::post('/comment-save/{comment_id}',[
        'uses'=>'Admin\ActionController@postSaveComment',
        'as'=>'comment.store'
        ]);
    Route::get('/comment-page/{news_id}',[
        'uses'=>'Admin\ActionController@getshowFrontComment',
        'as'=>'comment.show'
        ]);   
    Route::get('/comment-edit/{comment_id}',[
        'uses'=>'Admin\ActionController@getEditComment',
        'as'=>'admin-comment.edit'
        ]);
    Route::post('/comment-update/{comment_id}',[
        'uses'=>'Admin\ActionController@postUpdateComment',
        'as'=>'admin-comment.update'
        ]);
    Route::get('/comment-delete/{comment_id}',[
        'uses'=>'Admin\ActionController@getCommentDelete',
        'as'=>'admin-comment.delete'
        ]);	
      
            
    });

    
    


Route::get('signin-page',[
    'uses'=>'UserLoginController@getSignInPage',
    'as'=>'signin-page',
    ]); 
Route::get('signin',[
    'uses'=>'UserLoginController@getLogin',
    'as'=>'signin',
    ]); 
Route::get('signup-page',[
    'uses'=>'UserLoginController@getSignUpPage',
    'as'=>'signup-page',
    ]);   
Route::get('signup',[
    'uses'=>'UserLoginController@getSignup',
    'as'=>'signup',
    ]); 
Route::post('search',[
    'uses'=>'FrontController@postSerchNews',
    'as'=>'search.news',
    ]);

Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
Route::get('/', 'HomeController@index')->name('dashboard');
//News
Route::resource('/news','NewsController');
Route::resource('/categories','CategoryController');


Route::post('/update-product/{product_id}',[
    'uses'=>'NewsController@postUpdateProduct',
    'as'=>'news.update',
    ]);  
Route::get('/delete-product/{product_id}',[
    'uses'=>'NewsController@getDeleteProduct',
    'as'=>'news.delete',
    ]);
//User
Route::get('/user-profile',[
    'uses'=>'UserLoginController@getUserProfile',
    'as'=>'user.profile',
    ]); 
Route::get('/edit-user/{user_id}',[
    'uses'=>'UserLoginController@getEditUser',
    'as'=>'user.edit',
    ]); 
Route::post('/update-user/{user_id}',[
    'uses'=>'UserLoginController@postUpdateUser',
    'as'=>'user.update',
    ]);
Route::get('/users',[
    'uses'=>'UserLoginController@getUsers',
    'as'=>'users',
    ]);  
Route::get('/view-user/{user_id}',[
    'uses'=>'UserLoginController@getViewUser',
    'as'=>'user.show',
    ]); 
Route::get('/delete-user/{user_id}',[
    'uses'=>'UserLoginController@getDeleteUser',
    'as'=>'user.destroy',
    ]);
//Category
Route::post('/toggle-categories/{categories_id}',[
    'uses'=>'CategoryController@toggleCategories',
    'as'=>'toggle.categories'
    ]);	
Route::get('/category-delete/{category_id}',[
    'uses'=>'CategoryController@getDeleteCategory',
    'as'=>'category.delete'
    ]);	
Route::post('/category-update/{category_id}',[
    'uses'=>'CategoryController@postUpdateCategory',
    'as'=>'category.update'
    ]);

Route::get('/test', function() {
    $notifications=auth()->user()->unreadNotifications;
    foreach($notifications as $notification){
        dd($notification->data['user']['name']);
    } 
    });   
//comment
Route::get('/comment-index',[
    'uses'=>'ActionController@getComments',
    'as'=>'comment.index'
    ]); 	   
Route::post('/comment-save/{comment_id}',[
    'uses'=>'ActionController@postSaveComment',
    'as'=>'comment.store'
    ]);
Route::get('/comment-page/{news_id}',[
    'uses'=>'ActionController@getshowFrontComment',
    'as'=>'comment.show'
    ]);   
Route::get('/comment-edit/{comment_id}',[
    'uses'=>'ActionController@getEditComment',
    'as'=>'comment.edit'
    ]);
Route::post('/comment-update/{comment_id}',[
    'uses'=>'ActionController@postUpdateComment',
    'as'=>'comment.update'
    ]);
Route::get('/comment-delete/{comment_id}',[
    'uses'=>'ActionController@getCommentDelete',
    'as'=>'comment.delete'
    ]);	
  
        
});
//news
//top
Route::get('/top-news',[
    'uses'=>'FrontController@getToplNews',
    'as'=>'top.index'
    ]);
    //latest
Route::get('/latest-news',[
    'uses'=>'FrontController@getLatestNews',
    'as'=>'latest.index'
    ]);
 //national      
Route::get('/national-news',[
    'uses'=>'FrontController@getNationalNews',
    'as'=>'national.index'
    ]);
 //international     
Route::get('/international-news',[
    'uses'=>'FrontController@getInternationalNews',
    'as'=>'international.index'
    ]);
 //science        
Route::get('/science-news',[
    'uses'=>'FrontController@getScienceNews',
    'as'=>'science.index'
    ]);
  //sports 
  Route::get('/latestsports-news',[
    'uses'=>'FrontController@getLatestsportsNews',
    'as'=>'latestsports.index'
    ]);        
Route::get('/sports-news',[
    'uses'=>'FrontController@getSportsNews',
    'as'=>'sports.index'
    ]);
  //politics         
Route::get('/politics-news',[
    'uses'=>'FrontController@getPoliticsNews',
    'as'=>'politics.index'
    ]); 
Route::get('/district-news',[
    'uses'=>'FrontController@getDistrictNews',
    'as'=>'district.index'
    ]);
 //education     
Route::get('/education-news',[
    'uses'=>'FrontController@getEducationNews',
    'as'=>'education.index'
    ]);
Route::get('/campus-news',[
    'uses'=>'FrontController@getCampusNews',
    'as'=>'campus.index'
    ]);      
Route::get('/economics-news',[
    'uses'=>'FrontController@getEconomicsNews',
    'as'=>'economics.index'
    ]);  
Route::get('/literature-news',[
    'uses'=>'FrontController@getLiteratureNews',
    'as'=>'literature.index'
    ]);      
  //recreation    
Route::get('/recreation-news',[
    'uses'=>'FrontController@getRecreationNews',
    'as'=>'recreation.index'
    ]); 
Route::get('/bandmusic-news',[
    'uses'=>'FrontController@geBandmusictNews',
    'as'=>'bandmusic.index'
    ]); 
Route::get('/healthfitnes-news',[
    'uses'=>'FrontController@getHealthfitnesNews',
    'as'=>'healthfitnes.index'
    ]);
Route::get('/lifestyle-news',[
    'uses'=>'FrontController@getLifestyleNews',
    'as'=>'lifestyle.index'
    ]);  
  //final 
Route::get('/final-news',[
    'uses'=>'FrontController@getFinalNews',
    'as'=>'final.index'
    ]);
    // sgl
Route::get('/single-news/{new_id}',[
    'uses'=>'FrontController@getSingleNews',
    'as'=>'new.single'
    ]); 
 //sidebar   
 Route::get('/bussiness-news',[
    'uses'=>'NewsController@getBussinessNews',
    'as'=>'bussiness.index'
    ]);
Route::get('/holiday-news',[
    'uses'=>'NewsController@getHolidayNews',
    'as'=>'holiday.index'
    ]);   
Route::post('/subcriber',[
    'uses'=>'FrontController@postSaveSubscriber',
    'as'=>'subscribe.save'
    ]);   
    
 