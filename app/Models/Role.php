<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version August 23, 2020, 12:34 pm UTC
 *
 * @property string $name
 */
class Role extends \Spatie\Permission\Models\Role
{
    protected $guard_name = 'web';
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'bail|required'
    ];


}
