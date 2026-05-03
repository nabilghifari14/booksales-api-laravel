<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject; // 1. Import kontrak JWT

class User extends Authenticatable implements JWTSubject // 2. Tambahkan implements ini
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 3. Pastikan 'role' ada di sini agar bisa diisi oleh Seeder
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 4. Tambahkan fungsi wajib untuk JWT di bawah ini:

    /**
     * Mendapatkan identifier unik untuk JWT (biasanya Primary Key).
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Menambahkan data tambahan (custom claims) ke dalam token jika diperlukan.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}