<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];
    protected $table = 't_users';
    protected $primaryKey = 'user_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    const ROLES = [
        1 => "admin 1",
        2 => "admin 2",
        3 => "admin 3",
        4 => "admin 4",
    ];
    const STATUSES = [
        "DRAFT" => 1,
        "APPROVED" => 2,
        "REJECTED" => 3,
    ];

    public function needToApprove(): bool
    {
        return (bool)$this->getAttribute('need_to_approve');
    }

    public function doesNotNeedToApprove(): bool
    {
        return !$this->needToApprove();
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(TAccount::class, 'account_id', 'account_id');
    }
    public function position():BelongsTo
    {
        return $this->belongsTo(TLkpPosition::class, 'position_id', 'code_id');
    }
}
