<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'slug'];

    public function content()
    {
        return $this->hasOne(Content::class, 'page_id','id');
    }
}
