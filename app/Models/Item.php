<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'completed',
        'completed_at',
    ];
}
