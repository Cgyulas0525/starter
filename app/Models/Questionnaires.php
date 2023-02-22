<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Questionnaires
 * @package App\Models
 * @version February 21, 2023, 10:20 am UTC
 *
 * @property string $name
 * @property string $validityfrom
 * @property string $validitato
 * @property integer $active
 * @property integer $basicpackage
 * @property string $description
 */
class Questionnaires extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'questionnaires';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'validityfrom',
        'validityto',
        'active',
        'basicpackage',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'validityfrom' => 'date',
        'validityto' => 'date',
        'active' => 'integer',
        'basicpackage' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:200',
        'validityfrom' => 'required',
        'validityto' => 'nullable',
        'active' => 'required|integer',
        'basicpackage' => 'required|integer',
        'description' => 'nullable|string|max:500',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function questionnairedetail() {
        return $this->hasMany(Questionnairedetails::class);
    }


}
