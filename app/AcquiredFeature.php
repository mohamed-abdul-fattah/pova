<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class AcquiredFeature extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'feature_id','featureable_id', 'featureable_type', 'value_string', 'value_number', 'value_boolean', 'value_text'
    ];

    /**
     * Rules
     * @var array
     */
    protected static $rules = [
        'feature_id'       => 'required|integer',
        'value_string'     => 'string|max:255',
        'value_number'     => 'numeric',
        'value_boolean'    => 'boolean',
        'value_text'       => 'string'
    ];

    /**
     * Rules getter.
     */
    public static function rules()
    {
        return self::$rules;
    }

    /**
     * Relationships to be displayed in resource show page.
     */
    public $detailsMethods = [];

    /**
     * Get parent feature of acquired feature.
     */
    public function feature()
    {
        return $this->belongsTo('App\Feature');
    }

    public function featureable()
    {
        return $this->morphTo();
    }

    /**
     * Get the value of acquired feature.
     */
    public function value()
    {
        if ($this->feature->type === 'string' || $this->feature->type === 'email' || $this->feature->type === 'selection') {
            return $this->value_string;
        } elseif ($this->feature->type === 'text') {
            return $this->value_text;
        } elseif ($this->feature->type === 'number') {
            return $this->value_number;
        } elseif ($this->feature->type === 'boolean') {
            return $this->value_boolean;
        }
    }
}
