<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App
 * @property string $name
*/
class Category extends Model
{
    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
