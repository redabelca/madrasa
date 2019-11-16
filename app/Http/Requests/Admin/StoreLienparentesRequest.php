<?php
namespace App\Http\Requests\Admin;

use App\Lienparente;
use Illuminate\Foundation\Http\FormRequest;

class StoreLienparentesRequest extends FormRequest
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
        return Lienparente::storeValidation($this);
    }
}
