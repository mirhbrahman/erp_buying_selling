<?php

namespace App\Models\User\Profile;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public function getAvaterAttribute($value)
    {
        return asset('uploads/user/avater/' . $value);
    }
}
