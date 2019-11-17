<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Eleve
 *
 * @package App
 * @property string $matricule
 * @property string $img_path
 * @property string $prenom_fr
 * @property string $prenom_ar
 * @property string $nom_fr
 * @property string $nom_ar
 * @property integer $sexe
 * @property string $cin
 * @property string $cne
 * @property string $idmassar
 * @property string $tel
 * @property string $adresse
 * @property string $datenaissance
 * @property string $datepremiereentree
 * @property string $email
 * @property string $nationalite
 * @property string $groupesangin
 * @property tinyInteger $is_handicaped
 * @property string $pediatrenom
 * @property string $telpediatre
 * @property text $allergies
 * @property text $particularites
 * @property text $traitement
 * @property integer $nbreanneedouble
 * @property string $allergiealimentaire
 * @property string $intolerancealimentaire
 * @property string $comportementalimentaire
 * @property string $famille
 * @property string $tuteur
 * @property string $quartier
*/
class Eleve extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['matricule', 'prenom_fr', 'prenom_ar', 'nom_fr', 'nom_ar', 'sexe', 'cin', 'cne', 'idmassar', 'tel', 'adresse', 'datenaissance', 'datepremiereentree', 'email', 'nationalite', 'groupesangin', 'is_handicaped', 'pediatrenom', 'telpediatre', 'allergies', 'particularites', 'traitement', 'nbreanneedouble', 'allergiealimentaire', 'intolerancealimentaire', 'comportementalimentaire', 'famille_id', 'tuteur_id', 'quartier_id'];
    protected $appends = ['img_path', 'img_path_link'];
    protected $with = ['media'];
    

    public static function boot()
    {
        parent::boot();

        Eleve::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'matricule' => 'max:191|nullable',
            'img_path' => 'file|image|nullable',
            'prenom_fr' => 'max:191|required',
            'prenom_ar' => 'max:191|nullable',
            'nom_fr' => 'max:191|required',
            'nom_ar' => 'max:191|nullable',
            'sexe' => 'integer|max:2147483647|nullable',
            'cin' => 'max:191|nullable',
            'cne' => 'max:191|nullable',
            'idmassar' => 'max:191|nullable',
            'tel' => 'max:191|nullable',
            'adresse' => 'max:191|nullable',
            'datenaissance' => 'date_format:' . config('app.date_format') . '|max:191|required',
            'datepremiereentree' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'email' => 'email|max:191|nullable',
            'nationalite' => 'max:191|nullable',
            'groupesangin' => 'max:191|nullable',
            'is_handicaped' => 'boolean|nullable',
            'pediatrenom' => 'max:191|nullable',
            'telpediatre' => 'max:191|nullable',
            'allergies' => 'max:65535|nullable',
            'particularites' => 'max:65535|nullable',
            'traitement' => 'max:65535|nullable',
            'nbreanneedouble' => 'integer|max:2147483647|nullable',
            'allergiealimentaire' => 'max:191|nullable',
            'intolerancealimentaire' => 'max:191|nullable',
            'comportementalimentaire' => 'max:191|nullable',
            'famille_id' => 'integer|exists:familles,id|max:4294967295|nullable',
            'tuteur_id' => 'integer|exists:tuteurs,id|max:4294967295|nullable',
            'quartier_id' => 'integer|exists:quartiers,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'matricule' => 'max:191|nullable',
            'img_path' => 'nullable',
            'prenom_fr' => 'max:191|required',
            'prenom_ar' => 'max:191|nullable',
            'nom_fr' => 'max:191|required',
            'nom_ar' => 'max:191|nullable',
            'sexe' => 'integer|max:2147483647|nullable',
            'cin' => 'max:191|nullable',
            'cne' => 'max:191|nullable',
            'idmassar' => 'max:191|nullable',
            'tel' => 'max:191|nullable',
            'adresse' => 'max:191|nullable',
            'datenaissance' => 'date_format:' . config('app.date_format') . '|max:191|required',
            'datepremiereentree' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'email' => 'email|max:191|nullable',
            'nationalite' => 'max:191|nullable',
            'groupesangin' => 'max:191|nullable',
            'is_handicaped' => 'boolean|nullable',
            'pediatrenom' => 'max:191|nullable',
            'telpediatre' => 'max:191|nullable',
            'allergies' => 'max:65535|nullable',
            'particularites' => 'max:65535|nullable',
            'traitement' => 'max:65535|nullable',
            'nbreanneedouble' => 'integer|max:2147483647|nullable',
            'allergiealimentaire' => 'max:191|nullable',
            'intolerancealimentaire' => 'max:191|nullable',
            'comportementalimentaire' => 'max:191|nullable',
            'famille_id' => 'integer|exists:familles,id|max:4294967295|nullable',
            'tuteur_id' => 'integer|exists:tuteurs,id|max:4294967295|nullable',
            'quartier_id' => 'integer|exists:quartiers,id|max:4294967295|nullable'
        ];
    }

    

    public function getImgPathAttribute()
    {
        return $this->getFirstMedia('img_path');
    }

    /**
     * @return string
     */
    public function getImgPathLinkAttribute()
    {
        $file = $this->getFirstMedia('img_path');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDatenaissanceAttribute($input)
    {
        if ($input) {
            $this->attributes['datenaissance'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getDatenaissanceAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDatepremiereentreeAttribute($input)
    {
        if ($input) {
            $this->attributes['datepremiereentree'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getDatepremiereentreeAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }
    
    public function famille()
    {
        return $this->belongsTo(Famille::class, 'famille_id')->withTrashed();
    }
    
    public function tuteur()
    {
        return $this->belongsTo(Tuteur::class, 'tuteur_id')->withTrashed();
    }
    
    public function quartier()
    {
        return $this->belongsTo(Quartier::class, 'quartier_id')->withTrashed();
    }
    
    
}
