<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * @OA\Schema(
 * schema="User",
 * type="object",
 * title="User",
 * description="Model Pengguna",
 * required={"name", "email"},
 * @OA\Property(
 * property="id",
 * type="integer",
 * readOnly=true,
 * description="ID unik untuk pengguna",
 * example=1
 * ),
 * @OA\Property(
 * property="name",
 * type="string",
 * description="Nama lengkap pengguna",
 * example="John Doe"
 * ),
 * @OA\Property(
 * property="email",
 * type="string",
 * format="email",
 * description="Alamat email pengguna (harus unik)",
 * example="john.doe@example.com"
 * ),
 * @OA\Property(
 * property="email_verified_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Tanggal dan waktu verifikasi email",
 * example="2025-08-14T09:00:00.000000Z"
 * ),
 * @OA\Property(
 * property="phone",
 * type="string",
 * description="Nomor telepon pengguna",
 * nullable=true,
 * example="081234567890"
 * ),
 * @OA\Property(
 * property="status_active",
 * type="boolean",
 * description="Status keaktifan pengguna (1=aktif, 0=tidak aktif)",
 * example=true
 * ),
 * @OA\Property(
 * property="departement",
 * type="string",
 * description="Departemen tempat pengguna bekerja",
 * nullable=true,
 * example="Information Technology"
 * ),
 * @OA\Property(
 * property="created_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Tanggal dan waktu pembuatan record",
 * example="2025-08-14T09:00:00.000000Z"
 * ),
 * @OA\Property(
 * property="updated_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Tanggal dan waktu pembaruan record terakhir",
 * example="2025-08-14T09:00:00.000000Z"
 * )
 * )
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status_active',
        'departement'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}
