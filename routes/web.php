<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\searchController;

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

// Route::get('/', function () {
//     return view('home');
// });



// solos pueden entrar usuarios logeados
Route::middleware('auth')->group(function(){
    //rutas de inicio
    Route::get('/home', [TweetController::class, 'loadTweets'])->name('home');
    Route::get('/', [TweetController::class, 'loadTweets']);

    //Gestion de tweets
    Route::post('/newTweet',[TweetController::class, 'newTweet'])->name('tweets.new');
    Route::get('/deleteTweet/{id}', [TweetController::class, 'deleteTweet'])->name('tweet.delete');

    //Gestion de usuarios
    Route::get('/users/{id}', [UserController::class, 'getProfile'])->name('profile');
    Route::get('/edit', [UserController::class, 'editProfile'])->name('perfil.edit');
    Route::post('/edit', [UserController::class, 'uldateProfile'])->name('perfil.edit');
    Route::get('/follow/{id}', [FollowController::class, 'follow'])->name('follow');
    Route::get('/unfollow/{id}', [FollowController::class, 'unfollow'])->name('unfollow');

    Route::get('/search', [searchController::class, 'search'])->name('search');

    //Ruta para hacer pruebas
    Route::get('test', function(){
        return view('test');
    });
});

Auth::routes();
