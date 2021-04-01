<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_form_dom.php");
    $html = file_get_html('https://www.google.com/search?q=coding+ninjas',false,null,0);

    // Find all images
    foreach($html->find('a[href^=/url?]') as $element)
           echo $element->href . '<br>';
