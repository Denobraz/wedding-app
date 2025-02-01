<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class GuestPerson extends Model
{
    protected $table = 'guest_persons';

    protected $fillable = [
        'name',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
