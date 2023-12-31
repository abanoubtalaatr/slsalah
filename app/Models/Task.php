<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{    protected $casts = [
    'start_date' => 'datetime',
    'due_date' => 'datetime',
];

    use HasFactory;

    public function assign(){
        return $this->belongsTo(User::class, 'contact_id', 'id');
    }

}
