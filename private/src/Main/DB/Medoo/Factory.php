<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 18/12/2557
 * Time: 14:26 น.
 */

namespace Main\DB\Medoo;


use Main\AppConfig;

class Factory {

    /**
     * @param \medoo $instances[];
     */
    protected static $instances = [];

    public function getInstance($name = 'master'){
        if(!isset(self::$instances[$name])){
            $paramPath = 'db.medoo.'.$name;
            self::$instances[$name] = new \medoo([
                // required
                'database_type' => AppConfig::get($paramPath.'.database_type'),
                'database_name' => $paramPath.'.database_name',
                'server' => $paramPath.'.server',
                'username' => $paramPath.'.username',
                'password' => $paramPath.'.password',
                'port' => $paramPath.'.port',
                'charset' => $paramPath.'.charset',
                'option' => $paramPath.'.option'
            ]);
        }
        return self::$instances[$name];
    }
}