<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'company_name', 'status', 'notes', 'zone_id'
    ];
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
