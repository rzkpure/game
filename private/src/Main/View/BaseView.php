<?php


namespace Main\View;


abstract class BaseView {
    public $headers = [], $params = [];
    public function setHeaders(array $headers){
        $this->headers = $headers;
    }

    public function setParams($params){
        $this->params = $params;
    }

//    public function render(){
//        foreach($this->headers as $key=> $value){
//            header($key.": ".$value);
//        }
//        echo http_build_query($this->params);
//    }
    abstract public function render();
}