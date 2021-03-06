<?php

namespace BrocardJr\Cloudinary\Facades;

use Illuminate\Support\Facades\Facade;

class ImageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'image';
    }
}