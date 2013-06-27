php memcache class 
========
<?php

  include 'mcache.php';\n
  if(!$content = mcache::getInstance()->getFacebook()){\n
    $data = file_get_contents('http://www.facebook.com/');\n
    mcache::getInstance()->setFacebook($data);\n
  }else echo $content;\n
  
?>
