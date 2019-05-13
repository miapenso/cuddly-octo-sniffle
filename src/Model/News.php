<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:42
 */

namespace Miapenso\News\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';
    protected $guarded = [];
    public $dateFormat = 'U';
    public $timestamps = true;
}