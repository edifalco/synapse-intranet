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
    
    
    
}
