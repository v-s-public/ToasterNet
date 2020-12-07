<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public $primaryKey = 'complaint_id';

    protected $attributes = [
        'in_work' => false
    ];

    protected $fillable = [
        'title',
        'text',
        'client_id'
    ];

    public function takeToWork()
    {
        $this->in_work = true;
        $this->save();
    }
}
