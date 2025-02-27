<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['page_id','description','content','type','img_path','status','alt','url'];

    protected $casts = [
        'type' => 'string',
    ];

    
    public function page()
    {
        return $this->belongsTo( Page::class, 'page_id','id');
    }
}
