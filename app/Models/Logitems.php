<?php

namespace App\Models;

use App\Enums\LogTypeEnum;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kirschbaum\PowerJoins\PowerJoins;

/**
 * Class Logitems
 * @package App\Models
 * @version February 14, 2023, 6:25 am UTC
 *
 * @property string $logitemtype
 * @property integer $user_id
 * @property string $datatable
 * @property string|\Carbon\Carbon $eventdatetime
 * @property string $remoteaddress
 */
class Logitems extends Model
{
    use SoftDeletes, HasFactory, PowerJoins;

    public $table = 'logitems';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'logitemtype',
        'user_id',
        'datatable',
        'record',
        'eventdatetime',
        'remoteaddress'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'logitemtype' => LogTypeEnum::class,
        'user_id' => 'integer',
        'datatable' => 'string',
        'record' => 'integer',
        'eventdatetime' => 'datetime',
        'remoteaddress' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'logitemtype' => 'required|string:25',
        'user_id' => 'nullable|integer',
        'datatable' => 'nullable|string|max:100',
        'record' => 'nullable|integer',
        'eventdatetime' => 'required',
        'remoteaddress' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function user(): string|BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

}
