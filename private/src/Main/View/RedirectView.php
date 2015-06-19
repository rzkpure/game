<?php


namespace Main\View;


class RedirectView extends BaseView {
    protected $redirPath = "";

    public function __construct($redirPath){
        $this->redirPath = $redirPath;
    }

    public function render()
    {
        header("Location: ".$this->redirPath);
    }
}