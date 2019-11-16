<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anneescolaire
 *
 * @package App
 * @property string $datedebut
 * @property string $datefin
 * @property string $label
 * @property tinyInteger $anneeactive
*/
class Anneescolaire extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['datedebut', 'datefin', 'label', 'anneeactive'];
    

    public static function boot()
    {
        parent::boot();

        Anneescolaire::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'datedebut' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'datefin' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'label' => 'max:191|required',
            'anneeactive' => 'boolean|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'datedebut' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'datefin' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|nullable',
            'label' => 'max:191|required',
            'anneeactive' => 'boolean|nullable'
        ];
    }

    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDatedebutAttribute($input)
    {
        if ($input) {
            $this->attributes['datedebut'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getDatedebutAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDatefinAttribute($input)
    {
        if ($input) {
            $this->attributes['datefin'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getDatefinAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }
    
    
}
