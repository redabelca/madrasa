<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Circuit
 *
 * @package App
 * @property string $label
 * @property string $vehicule
*/
class Circuit extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['label', 'vehicule_id'];
    

    public static function boot()
    {
        parent::boot();

        Circuit::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'label' => 'max:191|required',
            'vehicule_id' => 'integer|exists:vehicules,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'label' => 'max:191|required',
            'vehicule_id' => 'integer|exists:vehicules,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id')->withTrashed();
    }
    
    
}
