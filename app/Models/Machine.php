<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    function user() {
        return $this -> belongsTo(User::class, "user_id");
    }

    function logs() {
        return $this -> hasMany(MachineLog::class, "machine_id");
    }
}
