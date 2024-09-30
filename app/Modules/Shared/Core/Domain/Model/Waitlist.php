<?php

namespace App\Modules\Shared\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Waitlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jumlahOrang',
        'location_id'
    ];

    /**
     * @return BelongsTo<Location, Waitlist>
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
