<?php
namespace SageworksStudio;

class YaRouter {
    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $default;

    /**
     * @var string
     */
    private $type;

    /**
     * Create a new route
     *
     * @param string $location
     * @param string $default
     * @param string $type
     */
    public function get_view( $location, $default, $type ) {
        $current_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $default_view = $location . '/' . $default . '.' . $type;
        $custom_view = $location . $current_url . '.' . $type;

        if ($current_url == '' || $current_url == '/' && file_exists($default_view)) {
            require $default_view;
        } elseif (file_exists($custom_view)) {
            require $custom_view;
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }
}
