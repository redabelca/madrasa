<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Preinscription
 *
 * @package App
 * @property string $nomprofesseurtest
 * @property double $notetest
 * @property string $resultattest
 * @property tinyInteger $is_acceptedintest
 * @property integer $fraistest
 * @property tinyInteger $fraispayed
 * @property tinyInteger $transport
 * @property string $datetest
 * @property string $datelimiteinscription
 * @property text $observations
 * @property string $anneescolaire
 * @property string $eleve
*/
class Preinscription extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['nomprofesseurtest', 'notetest', 'resultattest', 'is_acceptedintest', 'fraistest', 'fraispayed', 'transport', 'datetest', 'datelimiteinscription', 'observations', 'anneescolaire_id', 'eleve_id'];
    

    public static function boot()
    {
        parent::boot();

        Preinscription::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'nomprofesseurtest' => 'max:191|nullable',
            'notetest' => 'numeric|nullable',
            'resultattest' => 'max:191|nullable',
            'is_acceptedintest' => 'boolean|nullable',
            'fraistest' => 'integer|max:2147483647|nullable',
            'fraispayed' => 'boolean|nullable',
            'transport' => 'boolean|nullable',
            'datetest' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'datelimiteinscription' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'observations' => 'max:65535|nullable',
            'anneescolaire_id' => 'integer|exists:anneescolaires,id|max:4294967295|required',
            'eleve_id' => 'integer|exists:eleves,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'nomprofesseurtest' => 'max:191|nullable',
            'notetest' => 'numeric|nullable',
            'resultattest' => 'max:191|nullable',
            'is_acceptedintest' => 'boolean|nullable',
            'fraistest' => 'integer|max:2147483647|nullable',
            'fraispayed' => 'boolean|nullable',
            'transport' => 'boolean|nullable',
            'datetest' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'datelimiteinscription' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'observations' => 'max:65535|nullable',
            'anneescolaire_id' => 'integer|exists:anneescolaires,id|max:4294967295|required',
            'eleve_id' => 'integer|exists:eleves,id|max:4294967295|required'
        ];
    }

    

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDatetestAttribute($input)
    {
        if ($input) {
            $this->attributes['datetest'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDatetestAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDatelimiteinscriptionAttribute($input)
    {
        if ($input) {
            $this->attributes['datelimiteinscription'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDatelimiteinscriptionAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }
    
    public function anneescolaire()
    {
        return $this->belongsTo(Anneescolaire::class, 'anneescolaire_id')->withTrashed();
    }
    
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id')->withTrashed();
    }
    
    
}
