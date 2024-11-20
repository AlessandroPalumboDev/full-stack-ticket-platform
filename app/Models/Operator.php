<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'is_available',  // Per sapere se un operatore è disponibile o meno
    ];

    // Relazione con i ticket (un operatore può essere assegnato a più ticket)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Se hai bisogno di una relazione many-to-many con i ticket, puoi aggiungere un metodo come questo:
    // public function tickets()
    // {
    //     return $this->belongsToMany(Ticket::class, 'ticket_operator', 'operator_id', 'ticket_id');
    // }
}
