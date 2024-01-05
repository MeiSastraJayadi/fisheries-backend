<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function machine() {
        return $this -> belongsTo(Machine::class, 'machine_id');
    }
}
