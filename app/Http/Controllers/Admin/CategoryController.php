<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relazione con i ticket (una categoria può avere molti ticket)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
