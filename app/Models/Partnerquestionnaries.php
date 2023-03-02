<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partnerquestionnaries
 * @package App\Models
 * @version March 2, 2023, 3:41 pm UTC
 *
 * @property integer $partner_id
 * @property integer $questionnarie_id
 * @property string $description
 */
class Partnerquestionnaries extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partnerquestionnaries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'partner_id',
        'questionnarie_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'partner_id' => 'integer',
        'questionnarie_id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'partner_id' => 'required|integer',
        'questionnarie_id' => 'required|integer',
        'description' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function partner() {
        return $this->belongsTo(Partners::class);
    }

    public function questionnarie() {
        return $this->belongsTo(Questionnaires::class);
    }

}
