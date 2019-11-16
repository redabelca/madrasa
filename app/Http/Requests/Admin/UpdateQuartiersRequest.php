<?php
namespace App\Http\Requests\Admin;

use App\Quartier;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuartiersRequest extends FormRequest
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
        return Quartier::updateValidation($this);
    }
}
