<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_wallet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_wallet';

}
