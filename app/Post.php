<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    //Models have tha same name as the model in lowercase plural

    // protected $table = 'posts';

    // protected $primaryKey = 'post_id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content'
    ];

}
