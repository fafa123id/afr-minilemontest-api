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
 * description="Unique ID for the user",
 * example=1
 * ),
 * @OA\Property(
 * property="name",
 * type="string",
 * description="Name of the user",
 * example="John Doe"
 * ),
 * @OA\Property(
 * property="email",
 * type="string",
 * format="email",
 * description="Email address of the user(must be unique)",
 * example="john.doe@example.com"
 * ),
 * @OA\Property(
 * property="email_verified_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Timestamp when the user's email was verified",
 * example="2025-08-14T09:00:00.000000Z"
 * ),
 * @OA\Property(
 * property="phone",
 * type="string",
 * description="User's phone number",
 * nullable=true,
 * example="081234567890"
 * ),
 * @OA\Property(
 * property="status_active",
 * type="boolean",
 * description="Indicates if the user is active",
 * example=true
 * ),
 * @OA\Property(
 * property="departement",
 * type="string",
 * description="Department of the user",
 * nullable=true,
 * example="Information Technology"
 * ),
 * @OA\Property(
 * property="created_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Date and time when the record was created",
 * example="2025-08-14T09:00:00.000000Z"
 * ),
 * @OA\Property(
 * property="updated_at",
 * type="string",
 * format="date-time",
 * readOnly=true,
 * description="Date and time when the record was last updated",
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
