<?php


namespace Benwilkins\Yak\Models;


use Illuminate\Database\Eloquent\Model;

abstract class YakBaseModel extends Model
{
    use UuidKey;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::bootUuidForKey();
    }

    public static function userClass()
    {
        return config('yak.userClass', 'App\User');
    }
}