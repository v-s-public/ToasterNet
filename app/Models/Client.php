<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $primaryKey = 'client_id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'address'
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'client_id');
    }
}
