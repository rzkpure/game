<?php
/**
 * Created by PhpStorm.
 * User: NUIZ
 * Date: 26/1/2558
 * Time: 10:42
 */
namespace Main\Log;

use Main\AppConfig;

class Log {
    public static function error($error){
        error_log($error, null, AppConfig::get('log.error'));
    }
    public static function info($error){
        error_log($error, null, AppConfig::get('log.info'));
    }
    public static function warning($error){
        error_log($error, null, AppConfig::get('log.warning'));
    }
}