<?php

use App\Jobs\SomeJob;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Redis;
use \App\Mail\OrderShipped;

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

Route::get( '/', function () {
//    Redis::set('name', 'Hanan');
//    $name = Redis::get('name');
//    dd($name);
    return view( 'welcome' );
} );

Route::post( '/', function () {
    Mail::to( 'hananmohammed2468@gmail.com' )->queue( new OrderShipped() );

    return redirect()->back();
} )->name( 'sendEmail' );

Route::get( '/jobs/{jobs}/{user}', function ( $jobs, $user ) {
    $user = User::find( $user );
    for ( $i = 0 ; $i < $jobs ; $i++ )
    {
        SomeJob::dispatch( $user );
    }
} );
