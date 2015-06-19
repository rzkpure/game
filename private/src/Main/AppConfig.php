<?php

namespace Main;

use Main\Helper\ArrayHelper;

Class AppConfig {

    static public $setting = null;

    public static function get ($name) {
        if (is_null(self::$setting)) {
            self::$setting = include(__DIR__."/../../../private/AppConfig.php");
            self::$setting = ArrayHelper::ArrayGetPath(self::$setting);
        }
        return self::$setting[$name];
    }

}