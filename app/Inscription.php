<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inscription
 *
 * @package App
 * @property string $dateentree
 * @property tinyInteger $interne
 * @property string $classe
 * @property string $circuit
 * @property string $niveau
 * @property string $anneescolaire
 * @property string $preinscription
*/
class Inscription extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['dateentree', 'interne', 'classe_id', 'circuit_id', 'niveau_id', 'anneescolaire_id', 'preinscription_id'];
    

    public static function boot()
    {
        parent::boot();

        Inscription::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'dateentree' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'interne' => 'boolean|nullable',
            'classe_id' => 'integer|exists:classes,id|max:4294967295|required',
            'circuit_id' => 'integer|exists:circuits,id|max:4294967295|nullable',
            'niveau_id' => 'integer|exists:niveaux,id|max:4294967295|nullable',
            'anneescolaire_id' => 'integer|exists:anneescolaires,id|max:4294967295|required',
            'preinscription_id' => 'integer|exists:preinscriptions,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'dateentree' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'interne' => 'boolean|nullable',
            'classe_id' => 'integer|exists:classes,id|max:4294967295|required',
            'circuit_id' => 'integer|exists:circuits,id|max:4294967295|nullable',
            'niveau_id' => 'integer|exists:niveaux,id|max:4294967295|nullable',
            'anneescolaire_id' => 'integer|exists:anneescolaires,id|max:4294967295|required',
            'preinscription_id' => 'integer|exists:preinscriptions,id|max:4294967295|nullable'
        ];
    }

    

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDateentreeAttribute($input)
    {
        if ($input) {
            $this->attributes['dateentree'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDateentreeAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }
    
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id')->withTrashed();
    }
    
    public function circuit()
    {
        return $this->belongsTo(Circuit::class, 'circuit_id')->withTrashed();
    }
    
    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id')->withTrashed();
    }
    
    public function anneescolaire()
    {
        return $this->belongsTo(Anneescolaire::class, 'anneescolaire_id')->withTrashed();
    }
    
    public function preinscription()
    {
        return $this->belongsTo(Preinscription::class, 'preinscription_id')->withTrashed();
    }
    
    
}
