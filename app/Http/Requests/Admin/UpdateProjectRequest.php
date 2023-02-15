<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->is_superadmin == true) {
            return true;
        }
        ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            /* validazione triste */
            'title' => 'required|max:80',
            'type_id' => 'exists:types,id',
            'level_id' => 'exists:levels,id',
     /*        'languages_id' => 'required|max:225', */
            'completed' => 'required|boolean',
            'cover_img' => 'image|max:1024',
            'description' => 'string',
            'github_link'=>'string',
            'tecnologies' => 'exists:tecnologies,id|array'
        ];
    }
}