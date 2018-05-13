<?php

if (!function_exists('includeRouteFiles')) {

    /**
     * @param string $folder
     */
    function includeRouteFiles($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('homeRoute')) {

    /**
     * @return string
     */
    function homeRoute()
    {
        return '/';
    }
}

if (! function_exists('userName')) {

    /**
     * @return string
     */
    function userName()
    {
        return auth()->check() ? auth()->user()->name : 'Guest';
    }
}

if (! function_exists('userLogin')) {

    /**
     * @return string
     */
    function userLogin()
    {
        return 'email';
    }
}

if (! function_exists('generateConfirmationCode')) {

    /**
     * @return string
     */
    function generateConfirmationCode()
    {
        return bin2hex(random_bytes(32));
    }
}
