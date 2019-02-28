<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Budget
 *
 * @package App
 * @property string $project
 * @property string $category
 * @property string $year
 * @property double $amount
*/
class Budget extends Model
{
    use SoftDeletes;

    protected $fillable = ['amount', 'project_id', 'category_id', 'year_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Budget::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setYearIdAttribute($input)
    {
        $this->attributes['year_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        if ($input != '') {
            $this->attributes['amount'] = $input;
        } else {
            $this->attributes['amount'] = null;
        }
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id')->withTrashed();
    }
    
}
