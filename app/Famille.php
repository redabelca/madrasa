<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Famille
 *
 * @package App
 * @property string $nom
*/
class Famille extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['nom'];
    

    public static function boot()
    {
        parent::boot();

        Famille::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'nom' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'nom' => 'max:191|required'
        ];
    }

    

    
    
    
}
