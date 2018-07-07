<?php

use App\Post;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $url = route('rip');
    return "testing".$url ;
})->name('rip');

//Route::get('/post/{id}', 'PostsController@index');

Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');

Route::get('/post/{id}/{yeet}', 'PostsController@show_post');

Route::get('/insert', function(){

    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'I Yeet for Laravel']);

});

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id = ?', [1]);

//     foreach($results as $post){
//         return $post->content;
//     }
// });

// Route::get('/update', function(){

//     $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

//     return $updated;

// });

// Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;

// });

// ORM   ELOQUENT

// Route::get('/read', function(){

//     $posts = Post::all();

//     foreach($posts as $post) {

//         return $post->title;

//     }

// });

// Route::get('/find', function(){

//     $post = Post::find(2);

//     return $post->title;

// });

// Route::get('/findwhere/{num}', function($num){

//     $posts = Post::where('id', $num)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;

// });

Route::get('/findmore', function(){

    $posts = Post::where('users_count', '<', 50)->firstOrFail();

});

Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = 'New Eloquent title';
    $post->content = 'Wow eloquent is really cool';

    $post->save();

});

Route::get('/basicinsert3', function(){

    $post = Post::find(3);

    $post->title = 'changing things';
    $post->content = 'All I do is win win win';

    $post->save();

});

Route::get('/create', function(){

    Post::create(['title'=>'the create method', 'content'=>'Wow I am yeeting']);

});

Route::get('delete', function(){

    $post = Post::find(2);

    $post->delete();

});

Route::get('/delete3', function(){

    Post::destroy([4,5]);

    // Post::where('is_admin', 0)->delete();

});

Route::get('/softdelete', function(){

    Post::find(6)->delete();

});

Route::get('/readsoftdelete', function(){

    // $post = Post::find(6);

    // return $post;

    $post = Post::withTrashed()->where('id', 6)->get();

    return $post;
});

Route::get('/restore', function(){

    Post::withTrashed()->where('is-admin', 0)->restore();

});