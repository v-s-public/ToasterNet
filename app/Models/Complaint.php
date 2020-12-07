<?php

namespace App\Models;

use App\Helpers\Str;
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

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::cleanString($value);
    }

    /**
     * Set In Work status to true
     */
    public function takeToWork() : void
    {
        $this->in_work = true;
        $this->save();
    }
}
