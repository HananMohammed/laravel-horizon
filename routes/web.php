<?php

use App\Jobs\SomeJob;
use App\Models\User;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
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

Route::get( '/batches', function () {

    $batch = Bus::batch( [
        new SomeJob( User::find( 1 ) ),
        new SomeJob( User::find( 2 ) ),
        new SomeJob( User::find( 3 ) ),
        new SomeJob( User::find( 4 ) ),
        new SomeJob( User::find( 5 ) ),
    ] )->then( function ( Batch $batch ) {
        Log::info( 'All jobs completed successfully...' );
        // All jobs completed successfully...
    } )->catch( function ( Batch $batch, Throwable $e ) {
        Log::info( ' First batch job failure detected...' );
        // First batch job failure detected...
    } )->finally( function ( Batch $batch ) {
        Log::info( 'The batch has finished executing..' );
        // The batch has finished executing...
    } )->name( 'Batch of Some Job' )->dispatch();


    return $batch->id;
} );

Route::get( '/visits', function () {
    // $visits = Redis::incr( 'visits' );
    $visits = Redis::incrBy( 'visits', 5 );

    return $visits;
} );

Route::get( '/videos/{id}', function ( $id ) {
    $downloads = Redis::get( "videos.{$id}.downloads" );

    return view( 'welcome' )->withDownloads( $downloads );
} );

Route::get( '/videos/{id}/download', function ( $id ) {
    $downloadCounts = Redis::incr( "videos.{$id}.downloads" );

    return $downloadCounts;
} );
