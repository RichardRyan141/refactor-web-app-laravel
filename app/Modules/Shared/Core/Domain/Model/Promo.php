<?php

namespace App\Modules\Shared\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'detail',
        'persenDiskon',
        'maxDiskon',
        'expired',
    ];

    /**
     * @return HasMany<Transaction>
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
