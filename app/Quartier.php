<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quartier
 *
 * @package App
 * @property string $label
*/
class Quartier extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['label'];
    

    public static function boot()
    {
        parent::boot();

        Quartier::observe(new \App\Observers\UserActionsObserver);
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
