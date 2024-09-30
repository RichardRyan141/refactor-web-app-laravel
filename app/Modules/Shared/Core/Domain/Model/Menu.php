<?php

namespace App\Modules\Shared\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'pathFoto',
    ];

    /**
     * @return HasMany<Order>
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
