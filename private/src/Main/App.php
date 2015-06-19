<?php

namespace Main;

use Mandango\Cache\FilesystemCache;
use Mandango\Connection;
use Mandango\Mandango;
use Pla2\Entity\Mapping\MetadataFactory;

class App {
    public static function start(){
        date_default_timezone_set('Asia/Bangkok');
        \Main\AutoRoute::dispatch();
    }
}