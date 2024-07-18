<?php

namespace App\Models;

use App\Models\FieldDoctor;
use App\Models\ScheduleDoctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctors';

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
        'name',
        'field_id',
        'office',
        'experience',
        'year',
        'month',
        'alumni',
        'nip',
        'str',
        'sip',
        'img',
        'status',
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
     * Get the field doctor that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function field_doctor()
    {
        return $this->belongsTo(FieldDoctor::class, 'field_id', 'id');
    }

    /**
     * Get all of the schedule doctor for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedule_doctor()
    {
        return $this->hasMany(ScheduleDoctor::class, 'doctor_id', 'id');
    }
}
