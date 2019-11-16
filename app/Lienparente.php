<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lienparente
 *
 * @package App
 * @property string $label
*/
class Lienparente extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['label'];
    

    public static function boot()
    {
        parent::boot();

        Lienparente::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'label' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'label' => 'max:191|required'
        ];
    }

    

    
    
    
}
