<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classe
 *
 * @package App
 * @property string $code
 * @property string $label_fr
 * @property string $idmassar
 * @property integer $capacite
 * @property string $niveau
 * @property string $branche
*/
class Classe extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['code', 'label_fr', 'idmassar', 'capacite', 'niveau_id', 'branche_id'];
    

    public static function boot()
    {
        parent::boot();

        Classe::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'label_fr' => 'max:191|required',
            'idmassar' => 'max:191|nullable',
            'capacite' => 'integer|max:2147483647|required',
            'niveau_id' => 'integer|exists:niveaux,id|max:4294967295|nullable',
            'branche_id' => 'integer|exists:branches,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'label_fr' => 'max:191|required',
            'idmassar' => 'max:191|nullable',
            'capacite' => 'integer|max:2147483647|required',
            'niveau_id' => 'integer|exists:niveaux,id|max:4294967295|nullable',
            'branche_id' => 'integer|exists:branches,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id')->withTrashed();
    }
    
    public function branche()
    {
        return $this->belongsTo(Branche::class, 'branche_id')->withTrashed();
    }
    
    
}
