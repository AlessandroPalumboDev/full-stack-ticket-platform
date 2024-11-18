<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'status', 'operator_id', 'category_id'];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

