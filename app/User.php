<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $username;
    public $email;
    public $googleId;
    public $subscription;
    public $imageUrl;


}
