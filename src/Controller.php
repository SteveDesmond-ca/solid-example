<?php

abstract class Controller
{
    abstract function get();
    abstract function post();

    public function handleRequest()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                return $this->post();
            case 'GET':
            default:
                return $this->get();
        }
    }

    protected function view($template, $view_model = [])
    {
        ob_start();
        include $template;
        $output = ob_get_clean();
        return $output;
    }
}
