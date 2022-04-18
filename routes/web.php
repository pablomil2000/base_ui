<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

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
    Route::get('/home', [TweetController::class, 'loadTweets'])->name('home');

    Route::get('/', [TweetController::class, 'loadTweets']);

    Route::post('/newTweet',[TweetController::class, 'newTweet'])->name('tweets.new');

    Route::get('/users/{id}', [UserController::class, 'getProfile'])->name('profile');

    Route::get('/edit', [UserController::class, 'editProfile'])->name('perfil.edit');
    Route::post('/edit', [UserController::class, 'uldateProfile'])->name('perfil.edit');

    Route::get('/deleteTweet/{id}', [TweetController::class, 'deleteTweet'])->name('tweet.delete');

    Route::get('test', function(){
        return view('test');
    });
});

Auth::routes();
