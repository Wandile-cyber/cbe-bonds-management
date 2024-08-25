<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondHolder extends Model
{
    use HasFactory;

    public function holder()
    {
        return $this->belongsTo(User::class, 'holder_id');
    }
}
