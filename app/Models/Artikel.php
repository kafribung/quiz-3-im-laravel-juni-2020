<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $touches = ['user'];
    protected $guarded = ['created_at', 'updated_at'];

    // Reration many to one (User)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
