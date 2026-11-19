<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /** SIP-IB menyimpan akun pada tb_users, bukan tabel users bawaan Laravel. */
    protected $table = 'tb_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'client_id',
        'role',
        'name',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
