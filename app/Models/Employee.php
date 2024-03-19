<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    public $hidden = ['created_at', 'updated_at', 'start_date'];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
