<?php

namespace App\Models;

use App\Models\SubService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner',
        'type',
        'lang',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all of the sub_service for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_service(): HasMany
    {
        return $this->hasMany(SubService::class, 'service_id', 'id');
    }
}
