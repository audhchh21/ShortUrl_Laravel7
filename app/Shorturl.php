<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shorturl extends Model
{
    // database name
    protected $table = 'shorturls';
    // database PK
    protected $primaryKey = 'id';
    // database Fillable
    protected $fillable = [
        'shortUserID',
        'shortCode',
        'shortLink',
        'shortPwd',
        'shortClick',
    ];

    // get user
    public function users()
    {
        return $this->belongsTo('App\User', 'shortUserID');
    }
}
