<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Commune
 *
 * @package App
 * @property string $label_fr
 * @property string $label_ar
*/
class Commune extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['label_fr', 'label_ar'];
    

    public static function boot()
    {
        parent::boot();

        Commune::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'label_fr' => 'max:191|required',
            'label_ar' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'label_fr' => 'max:191|required',
            'label_ar' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
