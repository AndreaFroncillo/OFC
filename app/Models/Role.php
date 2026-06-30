<?php

namespace App\Models;

use App\Models\Permission;
use App\Traits\HasCode;
use App\Traits\HasLocalizedDates;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperRole
 */
class Role extends Model
{
    use HasUuid, HasCode, HasLocalizedDates;

    public const CODE_PREFIX = 'ROL';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getLabelAttribute(): string
    {
        return __('roles.' . $this->slug);
    }
}
