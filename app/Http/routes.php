<?php

/** Front-end */
//Route::get('test', function() {
//    return view('backend.schedule.test');
//});

Route::group(['middleware' => ['web'], 'prefix' => ''], function () {

    Route::get('', 'FrontEnd\HomeController@index');

    Route::group(['middleware' => ['web'], 'prefix' => 'section'], function () {

        Route::get('show_seat/{available_id}/{theatre_id}', ['as' => 'section/show_seat', 'uses' => 'FrontEnd\Section\SectionController@show_seat']);
        Route::post('show_section', ['as' => 'section/show_section', 'uses' => 'FrontEnd\Section\SectionController@show_section']);
        Route::get('show_by_theatre/{theatre_id}', ['as' => 'section/show_by_theatre', 'uses' => 'FrontEnd\Section\SectionController@show_by_theatre']);
        Route::get('show_by_movie/{movie_id}', ['as' => 'section/show_by_movie', 'uses' => 'FrontEnd\Section\SectionController@show_by_movie']);
        Route::get('show_by_genre/{genre_id}', ['as' => 'section/show_by_genre', 'uses' => 'FrontEnd\Section\SectionController@show_by_genre']);
    });

    //get all list by left menu bar;
    Route::get('theatre', ['as' => 'theatre', 'uses' => 'FrontEnd\HomeController@get_theatre']);
    Route::get('location', ['as' => 'location', 'uses' => 'FrontEnd\HomeController@get_city']);
    Route::get('trailer', ['as' => 'trailer', 'uses' => 'FrontEnd\HomeController@get_trailer']);
    Route::get('genre', ['as' => 'genre', 'uses' => 'FrontEnd\HomeController@get_genre']);
    Route::get('movie', ['as' => 'movie', 'uses' => 'FrontEnd\HomeController@get_movie']);
    Route::get('help', ['as' => 'help', 'uses' => 'FrontEnd\HomeController@get_help']);
    Route::get('about_us', ['as' => 'about_us', 'uses' => 'FrontEnd\HomeController@get_about_us']);
    Route::get('contact_us', ['as' => 'contact_us', 'uses' => 'FrontEnd\HomeController@get_contact_us']);


    // show thank you after booking success;
    Route::get('thankyou', ['as' => 'thankyou', 'uses' => 'FrontEnd\Booking\BookingController@index']);

});

Route::resource('section', 'FrontEnd\Section\SectionController');

Route::group(['middleware' => ['web'], 'prefix' => 'booking'], function () {
});
Route::resource('booking', 'FrontEnd\Booking\BookingController');



/** Back-end */

Route::get('back/login', ['as' => 'back/login', 'uses' => 'Auth\AdminAuthController@getLogin']);
Route::post('back/postLogin', ['as' => 'back/postLogin', 'uses' => 'Auth\AdminAuthController@postLogin']);
Route::get('back/logout', ['as' => 'back/logout', 'uses' => 'Auth\AdminAuthController@logout']);


Route::group(['middleware' => ['web','admin'], 'prefix' => '/back'], function () {

    Route::get('', ['as' => 'back', 'uses' => 'Schedule\ScheduleController@index']);

    Route::group(['middleware' => ['web'], 'prefix' => '/city'], function () {

        Route::get('', ['as' => 'back/city', 'uses' => 'Location\CityController@index']);
        Route::get('destroy/{id}', ['as' => 'back/city/destroy', 'uses' => 'Location\CityController@destroy']);
    });
    Route::resource('city', 'Location\CityController');

    Route::group(['middleware' => ['web'], 'prefix' => '/township'], function () {

        Route::get('', ['as' => 'back/township', 'uses' => 'Location\TownshipController@index']);
        Route::get('destroy/{id}', ['as' => 'back/township/destroy', 'uses' => 'Location\TownshipController@destroy']);
    });
    Route::resource('township', 'Location\TownshipController');


    Route::group(['middleware' => ['web'], 'prefix' => '/genre'], function () {

        Route::get('', ['as' => 'back/genre', 'uses' => 'MovieFeatures\GenreController@index']);
        Route::get('destroy/{id}', ['as' => 'back/genre/destroy', 'uses' => 'MovieFeatures\GenreController@destroy']);
    });
    Route::resource('genre', 'MovieFeatures\GenreController');


    Route::group(['middleware' => ['web'], 'prefix' => '/movie'], function () {
        Route::get('', ['as' => 'back/movie', 'uses' => 'MovieFeatures\moviesController@index']);
        Route::get('new', ['as' => 'back/movie/new', 'uses' => 'MovieFeatures\moviesController@create']);
        Route::get('destroy/{id}', ['as' => 'back/movie/destroy', 'uses' => 'MovieFeatures\moviesController@destroy']);
        Route::post('show_section', ['as' => 'back/movie/show_section', 'uses' => 'MovieFeatures\moviesController@show_section']);

        Route::resource('movie', 'MovieFeatures\moviesController');
    });



    Route::group(['middleware' => ['web'], 'prefix' => '/theatre'], function () {
        Route::get('', ['as' => 'back/theatre', 'uses' => 'TheatreFeatures\TheatreController@index']);
        Route::get('new', ['as' => 'back/theatre/new', 'uses' => 'TheatreFeatures\TheatreController@create']);
        Route::get('destroy/{id}', ['as' => 'back/theatre/destroy', 'uses' => 'TheatreFeatures\TheatreController@destroy']);
    });
    Route::resource('theatre', 'TheatreFeatures\TheatreController');


    //Route::group(['middleware' => ['web'], 'prefix' => '/theatre_class'], function() {
    //    Route::get('', 'TheatreFeatures\TheatreClassController@index');
    //    Route::get('new','TheatreFeatures\TheatreController@create');
    //    Route::get('destroy/{id}', ['as' => 'theatre/destroy', 'uses' => 'TheatreFeatures\TheatreController@destroy']);
    //});
    Route::resource('theatre_class', 'TheatreFeatures\TheatreClassController');


    Route::group(['middleware' => ['web'], 'prefix' => '/user_type'], function () {
        Route::get('', ['as' => 'back/user_type', 'uses' => 'User\UserTypeController@index']);
        Route::get('destroy/{id}', ['as' => 'back/user_type/destroy', 'uses' => 'User\UserTypeController@destroy']);
    });
    Route::resource('user_type', 'User\UserTypeController');


    Route::group(['middleware' => ['web'], 'prefix' => '/user'], function () {
        Route::get('', ['as' => 'back/user', 'uses' => 'User\UserController@index']);
        Route::get('destroy/{id}', ['as' => 'user/destroy', 'uses' => 'User\UserController@destroy']);
    });
    Route::resource('user', 'User\UserController');


    Route::group(['middleware' => ['web'], 'prefix' => '/member_type'], function () {
        Route::get('', ['as' => 'back/member_type', 'uses' => 'Client\MemberTypeController@index']);
        Route::get('destroy/{id}', ['as' => 'back/member_type/destroy', 'uses' => 'Client\MemberTypeController@destroy']);
    });
    Route::resource('member_type', 'Client\MemberTypeController');


    //timetable
    Route::group(['middleware' => ['web'], 'prefix' => '/timetable'], function () {
        Route::get('', 'Schedule\TimeTableController@index');
        Route::get('destroy/{id}', ['as' => 'back/timetable/destroy', 'uses' => 'Schedule\TimeTableController@destroy']);
    });
    Route::resource('timetable', 'Schedule\TimeTableController');

    // schedule
    Route::group(['middleware' => ['web'], 'prefix' => '/schedule'], function () {
        Route::get('', ['as' => 'back/schedule', 'uses'=> 'Schedule\ScheduleController@index']);
        Route::get('create', ['as' => 'back/schedule/create', 'uses' => 'Schedule\ScheduleController@create']);
        Route::get('destroy/{id}', ['as' => 'back/schedule/destroy', 'uses' => 'Schedule\ScheduleController@destroy']);
    });
    Route::resource('schedule', 'Schedule\ScheduleController');

    Route::get('map', 'HomeController@index');


    // Available
    Route::group(['middleware' => ['web'], 'prefix' => '/available'], function () {
        Route::get('', ['as' => 'back/available', 'uses' => 'Schedule\AvailableController@index']);
        Route::get('create', ['as' => 'back/available/create', 'uses' => 'Schedule\AvailableController@create']);
        Route::get('edit/{available_id}', ['as' => 'back/available/edit', 'uses' => 'Schedule\AvailableController@edit']);
        Route::get('destroy/{id}', ['as' => 'back/available/destroy', 'uses' => 'Schedule\AvailableController@destroy']);
        Route::post('store_data', ['as' => 'back/available/store_data', 'uses' => 'Schedule\AvailableController@store_data']);
    });

    Route::resource('available', 'Schedule\AvailableController');

    // Booking
    Route::group(['middleware' => ['web'], 'prefix' => '/booking'], function() {
        Route::get('', ['as' => 'back/booking', 'uses' => 'Booking\BookingController@index']);
        Route::get('create', ['as' => 'back/available/create', 'uses' => 'Booking\BookingController@create']);
//        Route::get('edit/{available_id}', ['as' => 'back/booking/edit', 'uses' => 'Booking\BookingController@edit']);
        Route::get('detail/{id}', ['as' => 'back/booking/detail', 'uses' => 'Booking\BookingController@detail']);
        Route::get('destroy/{id}', ['as' => 'back/booking/destroy', 'uses' => 'Booking\BookingController@destroy']);
    });

    Route::resource('back/booking', 'Booking\BookingController');

});