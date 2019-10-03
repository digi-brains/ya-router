<?php
namespace SageworksStudio;

class YaRouter {

    private $view;
    private $type;
    private $default;

    public function __construct( $router_view, $router_type, $router_default ) {
        $this->view = $router_view;
        $this->type = $router_type;
        $this->default = $router_default;
    }

    public function get_view() {
        $route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $default_view = $this->view . '/' . $this->default . '.' . $this->type;

        $custom_view = $this->view . $route . '.' . $this->type;

        if ($route == '' || $route == '/' && file_exists($default_view)) {
            require $default_view;
        } elseif (file_exists($custom_view)) {
            require $custom_view;
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }

}