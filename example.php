<?php
  include 'mcache.php';
  
  if(!$content = mcache::getInstance()->getFacebook()){
    $data = file_get_contents('http://www.facebook.com/');
    mcache::getInstance()->setFacebook($data);
  }else echo $content;
  //delete
  mcache::getInstance()->delFacebook();
   
  //Settings page content
  $data = file_get_contents('http://www.facebook.com/?page=1');
  mcache::getInstance()->setFacebook($data,1);
  echo mcache::getInstance()->getFacebook(1);
  
  //replace
  mcache::getInstance()->repFacebook($replace_str,1);
  
  //delete
  mcache::getInstance()->delFacebook(1);
  
  echo mcache::getInstance()->getFacebook(1);
