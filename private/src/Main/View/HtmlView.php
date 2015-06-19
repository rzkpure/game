<?php


namespace Main\View;


class HtmlView extends BaseView {
    protected $viewPath = 'private/view', $view;
    public function __construct($view , $params = null )
    {
        $this->params = $params;
        $this->view = $view;
    }

    public function import($view)
    {
        $params = $this->params;
        include($this->viewPath.$view.'.php');
    }

    public function render()
    {
        $params = $this->params;
        include($this->viewPath.$this->view.'.php');
    }

}