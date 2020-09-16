<?php

function regexUsername($username){
if(!empty($username)){
  return preg_match('/(?=.*[a-z])/',$username);
}
}
function regexEmail($email){
  if(!empty($email)){
    return preg_match('/(?=.*[a-z])(?=.*(@))/',$email);
  }
}
function regexPassword($password){
  if(!empty($password)){
    return preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*(_|[^\w]))/',$password);
  }
}

?>