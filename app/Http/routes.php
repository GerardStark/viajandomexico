<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Landing Page
 */

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('about', [
    'uses' => 'HomeController@about',
    'as'   => 'home'
]);

Route::get('testimonials', [
    'uses' => 'HomeController@testimonials',
    'as'   => 'home'
]);

Route::get('contacto', [
    'uses' => 'HomeController@contacto',
    'as'   => 'home'
]);

Route::get('controlpanel', [
    'uses' => 'HomeController@panel',
    'as'   => 'controlpanel'
]);

// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

// Registration routes...
Route::get('registernew', [
    'uses'  => 'HomeController@newRegister',
    'as'    => 'registernew'
]);
Route::get('registeruser', [
    'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'registeruser'
]);
Route::get('registerprovider', [
    'uses' => 'Auth\AuthController@getRegisterProvider',
    'as'   => 'registerprovider'
]);
Route::post('registeruser', 'Auth\AuthController@postRegister');
Route::post('registerprovider', 'Auth\AuthController@postRegisterProvider');


Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation',
    'as'   => 'confirmation'
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {

    Route::get('account', function () {
        return view('account');
    });

    Route::get('account/password', 'AccountController@getPassword');
    Route::post('account/password', 'AccountController@postPassword');

    Route::get('account/edit-profile', 'AccountController@editProfile');
    Route::put('account/edit-profile', 'AccountController@updateProfile');

    Route::get('account/verify', 'AccountController@verify');
    Route::put('account/verify', 'AccountController@resend');

    Route::group(['middleware' => ['verified', 'role:user']], function () {

        Route::get('historial}', [
            'uses' => 'UsersController@history',
            'as'   => 'historial'
        ]);

    });
    Route::group(['middleware' => ['verified', 'role:provider']], function () {

        Route::get('mis_servicios', [
            'uses' => 'ProvidersController@servicios',
            'as'   => 'mis_servicios'
        ]);

        Route::get('divisas', [
            'uses' => 'ProvidersController@divisas',
            'as'   => 'divisas'
        ]);

        Route::get('createnewservice',[
            'uses' => 'ProvidersController@createnewservice',
            'as'   => 'createnewservice'
        ]);

        Route::get('createhotel',[
            'uses'  => 'ProvidersController@createhotel',
            'as'    => 'createhotel'
        ]);

        Route::get('createtour',[
            'uses'  => 'ProvidersController@createtour',
            'as'    => 'createtour'
        ]);

        Route::get('createtransport',[
            'uses'  => 'ProvidersController@createtransport',
            'as'    => 'createtransport'
        ]);

        Route::get('createservtur',[
            'uses'  => 'ProvidersController@createservtour',
            'as'    => 'createservtur'
        ]);

        Route::get('createrestaurant',[
            'uses'  => 'ProvidersController@createrestaurant',
            'as'    => 'createrestaurant'
        ]);

        Route::get('createbar',[
            'uses'  => 'ProvidersController@createbar',
            'as'    => 'createbar'
        ]);

        Route::get('createspa',[
            'uses'  => 'ProvidersController@createspa',
            'as'    => 'createspa'
        ]);

        Route::post('registerhabitacion', [
            'uses'  => 'HabitacionesController@registerhabitacion',
            'as'    => 'registerhabitacion'
        ]);


        /*
         * Registro de Hoteles
         */

        Route::post('registerhotel', [
            'uses'  => 'HotelesController@registerhotel',
            'as'    => 'registerhotel'
        ]);

        Route::get('edithotel/{id}/', [
            'uses'  => 'HotelesController@edithotel',
            'as'    => 'edithotel'
        ]);
        Route::get('saveedithotel}', [
            'uses'  => 'HotelesController@saveedithotel',
            'as'    => 'saveedithotel'
        ]);

        Route::get('habitacioneshotel/{id}', [
            'uses'  => 'HabitacionesController@index',
            'as'    => 'habitacioneshotel'
        ]);

        Route::get('eliminarhotel/{id}', [
            'uses'  => 'HotelesController@eliminarhotel',
            'as'    => 'eliminarhotel'
        ]);

        Route::post('updatehotel/{id}',[
            'uses'  => 'HotelesController@updatehotel',
            'as'    => 'updatehotel'
        ]);


        /*
         * Registro Habitaciones
         */

        Route::get('createhabitacion/{id}',[
            'uses'  => 'HabitacionesController@createhabitacion',
            'as'    => 'createhabitacion'
        ]);

        Route::get('calendariohab/{id}',[
            'uses'  => 'HabitacionesController@craetecalendario',
            'as'    => 'calendariohab'
        ]);

        Route::get('edithabitacion/{id}',[
            'uses'  => 'HabitacionesController@edithabitacion',
            'as'    => 'edithabitacion'
        ]);

        Route::post('updatehabitacion/{id}',[
            'uses'  => 'HabitacionesController@updatehabitacion',
            'as'    => 'updatehabitacion'
        ]);

        Route::get('eliminarhabitacion/{id}',[
            'uses'  => 'HabitacionesController@eliminarhabitacion',
            'as'    => 'eliminarhabitacion'
        ]);

        /*
        * Registro de Tours
        */

        Route::post('registertour', [
            'uses'  => 'ToursController@registertour',
            'as'    => 'registertour'
        ]);

        Route::get('edittour/{id}', [
            'uses'  => 'ToursController@edittour',
            'as'    => 'edittour'
        ]);

        Route::get('eliminartour/{id}', [
            'uses'  => 'ToursController@eliminartour',
            'as'    => 'eliminartour'
        ]);

        Route::post('updatetour/{id}', [
            'uses'  => 'ToursController@updatetour',
            'as'    => 'updatetour'
        ]);

        Route::get('costostour/{id}', [
            'uses'  => 'ToursController@costostour',
            'as'    => 'costostour'
        ]);

        /*
         * Registro de Transportes
         */

        Route::post('registertransport', [
            'uses'  => 'TransportsController@registertransport',
            'as'    => 'registertransport'
        ]);

        Route::get('edittransport/{id}', [
            'uses'  => 'TransportsController@edittransport',
            'as'    => 'edittransport'
        ]);

        Route::get('eliminartransport/{id}', [
            'uses'  => 'TransportsController@eliminartransport',
            'as'    => 'eliminartransport'
        ]);

        Route::post('updatetransport/{id}', [
            'uses'  => 'TransportsController@updatetransport',
            'as'    => 'updatetransport'
        ]);

        Route::get('costostransport/{id}', [
            'uses'  => 'TransportsController@costostransport',
            'as'    => 'costostransport'
        ]);

        //Rutas de las rutas

        Route::get('rutastransport/{id}', [
            'uses'  => 'RutasTransController@index',
            'as'    => 'rutastransport'
        ]);

        Route::get('crearruta/{id}', [
            'uses'  => 'RutasTransController@create',
            'as'    => 'crearruta'
        ]);

        Route::post('registerruta', [
            'uses'  => 'RutasTransController@store',
            'as'    => 'registerruta'
        ]);

        Route::get('editarruta/{id}', [
            'uses'  => 'RutasTransController@edit',
            'as'    => 'crearruta'
        ]);

        Route::get('updateruta/{id}', [
            'uses'  => 'RutasTransController@update',
            'as'    => 'crearruta'
        ]);

        Route::get('eliminarruta/{id}', [
            'uses'  => 'RutasTransController@destroy',
            'as'    => 'crearruta'
        ]);




        //Rutas de los Vehiculos


        /*
         * Registro de Servicios Turisticos
         * Restaurant
         */

        Route::post('registerrestaurant', [
            'uses'  => 'RestaurantController@registerrestaurant',
            'as'    => 'registerrestaurant'
        ]);

        Route::get('editrestaurant/{id}', [
            'uses'  => 'RestaurantController@editrestaurant',
            'as'    => 'editrestaurant'
        ]);

        Route::get('eliminarrestaurant/{id}', [
            'uses'  => 'RestaurantController@eliminarrestaurant',
            'as'    => 'eliminarrestaurant'
        ]);

        Route::post('updaterestaurant/{id}',[
            'uses'  => 'RestaurantController@updaterestaurant',
            'as'    => 'updaterestaurant'
        ]);

        Route::get('costosrestaurante/{id}', [
            'uses'  => 'RestaurantController@costosrestaurante',
            'as'    => 'costosrestaurante'
        ]);

        /*
         * Bar
         */

        Route::post('registerbar', [
            'uses'  => 'BarController@registerbar',
            'as'    => 'registerbar'
        ]);

        Route::get('editbar/{id}', [
            'uses'  => 'BarController@editbar',
            'as'    => 'editbar'
        ]);

        Route::get('eliminarbar/{id}', [
            'uses'  => 'BarController@eliminarbar',
            'as'    => 'eliminarbar'
        ]);

        Route::post('updatebar/{id}',[
            'uses'  => 'BarController@updatebar',
            'as'    => 'updatebar'
        ]);

        Route::get('costosbar/{id}',[
            'uses'  => 'BarController@costosbar',
            'as'    => 'costosbar'
        ]);

        /*
         * Spa
         */

        Route::post('registerspa', [
            'uses'  => 'SpaController@registerspa',
            'as'    => 'registerspa'
        ]);

        Route::get('editspa/{id}', [
            'uses'  => 'SpaController@editspa',
            'as'    => 'editspa'
        ]);

        Route::get('eliminarspa/{id}', [
            'uses'  => 'SpaController@eliminarspa',
            'as'    => 'eliminarspa'
        ]);

        Route::post('updatespa/{id}', [
            'uses'  => 'SpaController@updatespa',
            'as'    => 'updatespa'
        ]);

        Route::get('costosspa/{id}',[
            'uses'  => 'SpaController@costosspa',
            'as'    => 'costosspa'
        ]);


        /*
         * Galerias
         */
        Route::get('creategaleria/{id}',[
            'uses' => 'GaleriasController@creategaleria',
            'as'   => 'editgaleria'
        ]);

        Route::post('updategaleria/{id}',[
            'uses' => 'GaleriasController@updategaleria',
            'as'   => 'editgaleria'
        ]);

        Route::get('eliminarimagen/{id}',[
            'uses' => 'GaleriasController@eliminarimagen',
            'as'   => 'eliminarimagen'
        ]);

        Route::post('storeimage', [
            'as' => 'storeimage',
            'uses' =>'GaleriasController@storeimage'
        ]);



    });
    /*
     * Resource Gmaps routes
     */
    Route::resource('estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('ciudades/filterbystate', 'ProvidersController@filterbystate');
    //Edit Routes
        //Hoteles
    Route::resource('edithotel/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('edithotel/ciudades/filterbystate', 'ProvidersController@filterbystate');
        //Tours
    Route::resource('edittour/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('edittour/ciudades/filterbystate', 'ProvidersController@filterbystate');
        //Transportes
    Route::resource('edittransport/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('edittransport/ciudades/filterbystate', 'ProvidersController@filterbystate');
        //Restaurantes
    Route::resource('editrestaurant/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('editrestaurant/ciudades/filterbystate', 'ProvidersController@filterbystate');
        //Bares
    Route::resource('editbar/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('editbar/ciudades/filterbystate', 'ProvidersController@filterbystate');
        //Spas
    Route::resource('editspa/estados/filterbycountry', 'ProvidersController@filterbycountry');
    Route::resource('editspa/ciudades/filterbystate', 'ProvidersController@filterbystate');

    /*
     * Calendar Routes Habitaciones
     */
    Route::post('calendariohab/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'HabitacionesController@loadingfile'
    ]);

    Route::post('calendariohab/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'HabitacionesController@savingfile'
    ]);

    /*
     * Calendar Routes Tours
     */
    Route::post('costostour/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'ToursController@loadingfile'
    ]);

    Route::post('costostour/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'ToursController@savingfile'
    ]);

    /*
     * Calendar Routes Transportes
     */
    Route::post('costostransport/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'TransportsController@loadingfile'
    ]);

    Route::post('costostransport/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'TransportsController@savingfile'
    ]);

    /*
     * Calendar Routes Bares
     */
    Route::post('costosbar/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'BarController@loadingfile'
    ]);

    Route::post('costosbar/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'BarController@savingfile'
    ]);

    /*
     * Calendar Routes Restaurantes
     */
    Route::post('costosrestaurante/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'RestaurantController@loadingfile'
    ]);

    Route::post('costosrestaurante/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'RestaurantController@savingfile'
    ]);

    /*
     * Calendar Routes Spas
     */
    Route::post('costosspa/dopbcp/php-file/load.php',[
        'as' => 'loadingfile',
        'uses' =>'SpaController@loadingfile'
    ]);

    Route::post('costosspa/dopbcp/php-file/save.php',[
        'as' => 'loadingfile',
        'uses' =>'SpaController@savingfile'
    ]);
});