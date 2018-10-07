<?php

namespace App\Models\User\Bank;

use Illuminate\Database\Eloquent\Model;

class UserEWallet extends Model
{
    public function eWallet()
    {
        return $this->belongsTo('App\Models\Admin\Bank\EWallet');
    }
}
