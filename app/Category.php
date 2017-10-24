<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Category extends Model
{
    use HydrogenTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'name'
    ];

    /**
     * The rules attributes.
     *
     * @var array
     */
    protected static $rules = [
        'parent_id' => 'required|integer',
        'nameEn'    => 'required|string|max:255',
        'nameAr'    => 'required|string|max:255',
    ];

    /**
     * The rules getter.
     *
     * @return array
     */
    public static function rules()
    {
        return self::$rules;
    }

    /**
     * Relationships to be displayed in resource show page.
     *
     * @var array
     */
    public $detailsMethods = ['acquiredFeatures'];

    /**
     * Get parent category name or just "Parent Category" if this is a parent category.
     *
     * @return collection.
     */
    public function parent()
    {
        if ($this->parent_id) {
            $category = $this->belongsTo('App\Category', 'parent_id')
                ->first();
            return localName($category);
        } else {
            return 'Parent Category';
        }
    }

    /**
     * Get parent category collection.
     *
     * @return collection.
     */
    public function parentObj()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * Get acquired features for this category.
     *
     * @return collection.
     */
    public function acquiredFeatures()
    {
        return $this->morphMany('App\AcquiredFeature', 'featureable');
    }

    /**
     * Get parent categories.
     *
     * @return collection.
     */
    public function parentCategories()
    {
        return $this->whereParentId(0)->get();
    }

    /**
     * Get sub categories.
     *
     * @return collection
     */
    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}
