<?php
namespace App\Http\Requests\Admin;

use App\Anneescolaire;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnneescolairesRequest extends FormRequest
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
        return Anneescolaire::storeValidation($this);
    }
}
