<?php
function geraToken() {
   $token = random_string('alnum', 60);
    return  $token;
}