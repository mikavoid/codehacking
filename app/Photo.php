<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path'
    ];

    protected $uploads = 'images/';


    /**
     * ACCESSORS
     */
    public function getPathAttribute($photo) {
        return '/' . getenv('UPLOADED_FILES_ROOT') . '/' .$this->uploads . $photo;
    }

}
