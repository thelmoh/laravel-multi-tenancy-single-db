<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'uuid'];

    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
