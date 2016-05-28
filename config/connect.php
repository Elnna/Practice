<?php
require_once('config.php');
//connect db
if(!($con = mysql_connect(HOST,USERNAME,PWD))){
    echo mysql_error();
}
//select db
if(!mysql_select_db('ms')){
    echo mysql_error();
}
//set char
if(!mysql_query('set names utf8')){
    echo mysql_error();
}