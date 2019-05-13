<?php

use Miapenso\News\Controllers\NewsController;

Route::get('miapenso/news/index', NewsController::class.'@index');


