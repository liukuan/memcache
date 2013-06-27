<?php
  include 'mcache.php';
  if(!$content = mcache::getInstance()->getFacebook()){
    $data = file_get_contents('http://www.facebook.com/');
    mcache::getInstance()->setFacebook($data);
  }else echo $content;


  //Settings page content
  $data = file_get_contents('http://www.facebook.com/?page=1');
  mcache::getInstance()->setFacebook($data,1);
  echo mcache::getInstance()->getFacebook(1);
