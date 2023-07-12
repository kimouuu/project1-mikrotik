<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiro extends Model
{
    use HasFactory;
    protected $table = 'multiro';
    protected $fillable = [
        'host',
        'username',
        'password',
        'router',
        'service_id'
    ];
    public function service()
    {
        return $this->belongsTo(nservice::class, 'service_id', 'id');
    }
};
