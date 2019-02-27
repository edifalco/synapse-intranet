<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
*/
class Message extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message'];
    protected $hidden = [];
    
    
    
}
