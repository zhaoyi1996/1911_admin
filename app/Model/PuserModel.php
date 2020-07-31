<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PuserModel extends Model
{
    public $table="p_user";
    public $primaryKey="user_id";
    public $timestamps=false;
}
