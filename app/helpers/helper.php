<?php

if (! function_exists('check_active')) {
    /**
     * Filter special characters
     *
     * @codeCoverageIgnore
     * @param  string $route
     * @return html
     */
    function check_active($route)
    {
        if (\Request::url() == $route) {
            return 'class=active';
        }
    }
}
