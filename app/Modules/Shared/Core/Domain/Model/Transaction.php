<?php

namespace App\Modules\Shared\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'waktu',
        'keterangan',
        'hargaTotal',
        'statusTransaksi',
        'noMeja',
        'isReservasi',
        'promo_id',
        'user_id',
        'location_id',
    ];

    /**
     * @return BelongsTo<Promo, Transaction>
     */
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    /**
     * @return BelongsTo<User, Transaction>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Location, Transaction>
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return HasMany<Order>
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
