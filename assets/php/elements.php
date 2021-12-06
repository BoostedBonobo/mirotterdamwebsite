<?php

$dir = new DirectoryIterator("assets/elements");
$elements = array();

foreach ($dir as $fileinfo) {
    if(strlen($fileinfo) > 3){
        if(strstr($fileinfo,'.png')){
            $elements[] =  $fileinfo->getFilename();
        }
    }    
}
return $elements;
    ?>