<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //restricts columns from modifying
    protected $fillable  = ['author_id', 'title', 'body', 'slug', 'categoria_id', 'active'];
    // posts has many comments
    // returns all comments on that post
    public function comments()
    {
        return $this->hasMany('App\Comments','on_post');
    }
    // returns the instance of the user who is author of that post
    public function author()
    {
        return $this->belongsTo('App\User','author_id');
    }
    
    public function categoria()
    {
        return $this->belongsTo(PostCategoria::class);
    }
}
