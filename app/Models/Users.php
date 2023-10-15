<?php

namespace App\Models;

use App\Enums\RolesEnum;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kirschbaum\PowerJoins\PowerJoins;

/**
 * Class Users
 * @package App\Models
 * @version January 25, 2023, 9:24 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $image_url
 * @property string $usertype
 * @property string $commit
 */
class Users extends Model
{
    use SoftDeletes, HasFactory, PowerJoins;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'image_url',
        'usertype',
        'commit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'image_url' => 'string',
        'usertype' => RolesEnum::class,
        'commit' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:191',
        'remember_token' => 'nullable|string|max:100',
        'usertype' => 'nullable|string',
        'commit' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function logitem(): string|HasMany
    {
        return $this->HasMany(Logitems::class);
    }

}
