memcache php class 
========
```php
<?php

  include 'mcache.php';;;;;//cccccc//haha???////adasdasd/3333
  
  if(!$content = mcache::getInstance()->getFacebook()){
  
    $data = file_get_contents('http://www.facebook.com/');
    
    mcache::getInstance()->setFacebook($data);
    
  }else echo $content;
  
?>
```
