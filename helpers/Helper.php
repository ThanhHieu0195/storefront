<?php
function render_php($path,$args=[]){
    extract($args);
    ob_start();
    include(PATH_THEME . '/' . $path);
    $var=ob_get_contents();
    ob_end_clean();
    return $var;
}
