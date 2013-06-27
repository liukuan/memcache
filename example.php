<?php
  include 'mcache.php';
  
  //get content 
  if(!$content = mcache::getInstance()->getFacebook()){
    $data = file_get_contents('http://www.facebook.com/');
    //set content
    mcache::getInstance()->setFacebook($data);//->getFacebook();
    echo mcache::getInstance()->getFacebook();
  }else echo $content;
  //replace
  mcache::getInstance()->repFacebook($data_str);
  //delete
  mcache::getInstance()->delFacebook();
   
  //Settings page content
  $data = file_get_contents('http://www.facebook.com/?page=1');
  mcache::getInstance()->setFacebook($data,1);
  //page 1 content
  echo mcache::getInstance()->getFacebook(1);
  
  //replace
  mcache::getInstance()->repFacebook($replace_str,1);
  
  //delete
  mcache::getInstance()->delFacebook(1);
  
  echo mcache::getInstance()->getFacebook(1);

  $google = file_get_contents('http://www.google.com/');
  echo mcache::getInstance()->setGoogle($google)->getGoogle();
