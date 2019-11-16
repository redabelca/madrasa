<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tuteur
 *
 * @package App
 * @property string $prenom_fr
 * @property string $prenom_ar
 * @property string $nom_fr
 * @property string $nom_ar
 * @property string $adresse
 * @property string $cin
 * @property string $email
 * @property string $tel
 * @property string $ville
 * @property string $profession
 * @property string $lienparente
 * @property string $famille
*/
class Tuteur extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['prenom_fr', 'prenom_ar', 'nom_fr', 'nom_ar', 'adresse', 'cin', 'email', 'tel', 'ville', 'profession', 'lienparente_id', 'famille_id'];
    

    public static function boot()
    {
        parent::boot();

        Tuteur::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'prenom_fr' => 'max:191|required',
            'prenom_ar' => 'max:191|nullable',
            'nom_fr' => 'max:191|required',
            'nom_ar' => 'max:191|nullable',
            'adresse' => 'max:191|required',
            'cin' => 'max:191|nullable',
            'email' => 'max:191|nullable',
            'tel' => 'max:191|required',
            'ville' => 'max:191|nullable',
            'profession' => 'max:191|nullable',
            'lienparente_id' => 'integer|exists:lienparentes,id|max:4294967295|nullable',
            'famille_id' => 'integer|exists:familles,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'prenom_fr' => 'max:191|required',
            'prenom_ar' => 'max:191|nullable',
            'nom_fr' => 'max:191|required',
            'nom_ar' => 'max:191|nullable',
            'adresse' => 'max:191|required',
            'cin' => 'max:191|nullable',
            'email' => 'max:191|nullable',
            'tel' => 'max:191|required',
            'ville' => 'max:191|nullable',
            'profession' => 'max:191|nullable',
            'lienparente_id' => 'integer|exists:lienparentes,id|max:4294967295|nullable',
            'famille_id' => 'integer|exists:familles,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function lienparente()
    {
        return $this->belongsTo(Lienparente::class, 'lienparente_id')->withTrashed();
    }
    
    public function famille()
    {
        return $this->belongsTo(Famille::class, 'famille_id')->withTrashed();
    }
    
    
}
