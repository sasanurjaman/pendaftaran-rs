<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $with = ['patient'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
