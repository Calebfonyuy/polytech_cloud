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

use App\Models\Classe;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home_view');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('req_connexion');

Route::get('/register', function () {
    return view('auth.register');
})->name('req_inscription');

Route::get('/a_propos',function (){
    return view('about');
})->name('about');

Route::post('/connexion', 'ConnectionController@signIn')->name('connexion');

Route::post('/inscription', 'ConnectionController@signUp')->name('inscription');

Route::post('/pass_reset', 'ConnectionController@resetPassword')->name('pass_reset');

Route::group(['middleware' => 'auth','prefix'=>'compte'], function () {
    Route::get('/accueil',function (){
        $years = DB::select('select distinct annee from documents order by annee asc');
        return view('dashboard.accueil')->withYears($years);
    })->name('accueil');

    Route::get('/logout','ConnectionController@signOut')->name('deconnexion');

    Route::get('/departements','ResourceDispatcher@showDepartements')->name('gen_dept');

    Route::get('/statistiques', 'StatisticsDispatcher@showGeneralStats')->name('statistics');

    Route::get('/departements/{depart}/classes','ResourceDispatcher@showClasses')->name('dept_class');

    Route::get('/departements/{depart}/classes/{class}/matiere', 'ResourceDispatcher@showMatieres')->name('gen_mats');

    Route::get('/departements/{depart}/classes/{class}/matiere/{matiere}/{year}', 
                        'ResourceDispatcher@showDocuments')->name('gen_docs');

    Route::group(['middleware'=>'admin','prefix' => 'admin'], function () {
        Route::get('/home','StatisticsDispatcher@adminStats')->name('admin_home');

        Route::resource('user', 'UserController');
        
        Route::get('/academie', function () {
            $dept = Departement::all();
            $class = Classe::all();
            return view('dashboard.admin.academie')->withDepartements($dept)->withClasses($class);
        })->name('academie');

        Route::resource('departement', 'DepartementController');

        Route::group(['prefix' => 'department'], function () {
            Route::resource('class', 'ClassController');

            Route::resource('matiere','MatiereController');

            Route::resource('document', 'DocumentController');
        });
    });
});