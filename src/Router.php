<?php
namespace YaRouter;

class Router
{
    public function rout($path) {
        $q_base = $_SERVER['REDIRECT_URL']; // Path w/o GET vars - Example('/this/that/foo')
        $q_full = $_SERVER['REQUEST_URI'];  // Path with GET vars - Example('/this/that/foo?id=2')
        $f_name = basename($q_base);        // Requested URI - Example('foo')
        $f_action = basename($q_full);      // Requested URI + GET vars - Example('foo?id=2')

        /*
        echo $q_base . '1';
        echo '<br>';
        echo $q_full . '2';
        echo '<br>';
        echo $f_name . '3';
        echo '<br>';
        echo $f_action . '4';
        */


        switch ($q_full) {
            
            case '' :// catch nothing
                require __DIR__ . '/../../' . $path;
                break;
            case '/' :
                require __DIR__ . '/../../' . $path;
                break;
            case '/about/hello/hey/how' :
                require __DIR__ . '/../../' . $path;
                break;
            default:  // 404
                require __DIR__ . '/../../' . $path;
                break;
        }
    }
}
