<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'category',
        'operator_id',
    ];

    // Relazione con l'operatore (un ticket può avere un operatore assegnato)
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    // Relazione con la categoria (se ne hai bisogno, altrimenti questa può essere eliminata)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
