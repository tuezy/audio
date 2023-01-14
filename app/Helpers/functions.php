<?php
if(!function_exists('core')){
    function core(): \App\Helpers\Core{
        return app('core');
    }
}
