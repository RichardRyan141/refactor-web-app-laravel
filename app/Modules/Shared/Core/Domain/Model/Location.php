<?php

namespace App\Modules\Shared\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaLokasi',
        'alamat',
        'googleMap'
    ];

    /**
     * @return HasMany<User>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return HasMany<Transaction>
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * @return HasMany<Waitlist>
     */
    public function waitlist(): HasMany
    {
        return $this->hasMany(Waitlist::class);
    }
}
