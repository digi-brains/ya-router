<?php
namespace YaRouter;

class Router {

    public function __construct( $view, $type, $default ) {
        $rout = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $query = $_SERVER['QUERY_STRING'];
        
        if ($rout == '' || $rout == '/') {
            $template = $view . '/' . $default . '.' . $type;
        } elseif (!$query == '') {
            //TODO - This probably doesn't work as expected
            $template = $view . $rout . '.' . $type . '?' . $query;
        } else {
            $template = $view . $rout . '.' . $type;
        }
        $this->template = $template;
    }

}