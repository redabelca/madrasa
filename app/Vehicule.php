<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vehicule
 *
 * @package App
 * @property string $code
 * @property string $marque
 * @property string $matricule
 * @property string $datemiseencirculation
 * @property string $dateacquisition
 * @property string $echeanceassurance
 * @property integer $nombredeplace
 * @property string $echeancevisitetechnique
 * @property string $echeanceautorisation
 * @property integer $consommationmin
 * @property integer $consommationmax
 * @property integer $vidange
 * @property string $observations
*/
class Vehicule extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['code', 'marque', 'matricule', 'datemiseencirculation', 'dateacquisition', 'echeanceassurance', 'nombredeplace', 'echeancevisitetechnique', 'echeanceautorisation', 'consommationmin', 'consommationmax', 'vidange', 'observations'];
    

    public static function boot()
    {
        parent::boot();

        Vehicule::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'marque' => 'max:191|nullable',
            'matricule' => 'max:191|nullable',
            'datemiseencirculation' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'dateacquisition' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'echeanceassurance' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'nombredeplace' => 'integer|max:2147483647|required',
            'echeancevisitetechnique' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'echeanceautorisation' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'consommationmin' => 'integer|max:2147483647|nullable',
            'consommationmax' => 'integer|max:2147483647|nullable',
            'vidange' => 'integer|max:2147483647|nullable',
            'observations' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'code' => 'max:191|nullable',
            'marque' => 'max:191|nullable',
            'matricule' => 'max:191|nullable',
            'datemiseencirculation' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'dateacquisition' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'echeanceassurance' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'nombredeplace' => 'integer|max:2147483647|required',
            'echeancevisitetechnique' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'echeanceautorisation' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'consommationmin' => 'integer|max:2147483647|nullable',
            'consommationmax' => 'integer|max:2147483647|nullable',
            'vidange' => 'integer|max:2147483647|nullable',
            'observations' => 'max:191|nullable'
        ];
    }

    

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDatemiseencirculationAttribute($input)
    {
        if ($input) {
            $this->attributes['datemiseencirculation'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDatemiseencirculationAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDateacquisitionAttribute($input)
    {
        if ($input) {
            $this->attributes['dateacquisition'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDateacquisitionAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setEcheanceassuranceAttribute($input)
    {
        if ($input) {
            $this->attributes['echeanceassurance'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getEcheanceassuranceAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setEcheancevisitetechniqueAttribute($input)
    {
        if ($input) {
            $this->attributes['echeancevisitetechnique'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getEcheancevisitetechniqueAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setEcheanceautorisationAttribute($input)
    {
        if ($input) {
            $this->attributes['echeanceautorisation'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getEcheanceautorisationAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }
    
    
}
