<?php
if ( ! function_exists('pathForAssetWithId')){
    function pathForAssetWithId($id, $file = NULL){
        if($id < 10)
        {
            return "0/";
        }
        else{
            $folders = str_split($id);
            array_pop($folders);

            return implode("/", $folders)."/".(empty($file) ? "" : $file);
        }
    }
}
?>
