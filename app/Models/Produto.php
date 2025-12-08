<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class, 'produto_user', 'produt_id', 'user_id');
    }
}
