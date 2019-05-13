<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/13
 * Time: 14:24
 */
namespace Miapenso\News;

use Encore\Admin\Extension;

class News extends Extension
{
    public $name = 'miapenso-news';
    public $menu = [
        'title' => '新闻管理',
        'path'  => 'miapenso/news/index',
        'icon'  => 'fa-credit-card',
    ];
}