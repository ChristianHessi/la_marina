<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Locataire;

class UpdateLocataireRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nom' => 'bail|required|max:255',
            'tel' => 'bail|required|min:9|max:14',
            'email' => 'bail|email',
            'date_entree' => 'bail|date|required',
            'actif' => 'bail|required|boolean',
        ];
        
        return $rules;
    }
}
