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
        if (\Request::url() == $route || parse_url(\Request::url(), PHP_URL_PATH) == $route) {
            return 'class=active';
        }
    }
}

if (! function_exists('folder_images')) {
    /**
     * Filter special characters
     *
     * @codeCoverageIgnore
     * @param
     * @return array
     */
    function folder_images()
    {
        $result = [];
        array_map(function ($value) use (&$result) {
            $result[$value] = __("repositories.title.{$value}");
        }, config('common.folder_images'));

        return $result;
    }
}
