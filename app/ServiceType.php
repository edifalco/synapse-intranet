<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceType
 *
 * @package App
 * @property string $name
*/
class ServiceType extends Model
{
    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ServiceType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
