<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permission
 * @package App\Models
 * @version August 23, 2020, 10:40 am UTC
 *
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'bail|required|unique:roles|max:40',
    ];
}
