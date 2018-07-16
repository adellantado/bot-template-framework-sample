<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model {

    public $table = 'userdatas';

    protected $fillable = ['key'];
}
