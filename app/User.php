<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // user has many posts
    public function posts()
    {
        return $this->hasMany('App\Posts','author_id');
    }
    // user has many comments
    public function comments()
    {
        return $this->hasMany('App\Comments','from_user');
    }
    public function can_post()
    {
        $role = $this->role;
        if($role == 'author' || $role == 'admin')
        {
            return true;
        }
        return false;
    }
    public function is_admin()
    {
        $role = $this->role;
        if($role == 'admin')
        {
            return true;
        }
        return false;
    }
    
    //Usuário pertence a instituicao
    public function instituicoes()
    {
        return $this->belongsToMany(Instituicao::class);
    }
}
