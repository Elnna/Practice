<?php
//连接数据库
header("Content-type:text/html;charset=utf-8");//设置网页以utf-8格式显示字符；防止网页中文显示乱码
if($con=mysql_connect('localhost','root','')){// $con 数据库连接符
    echo "连接成功<br>";

} else {
    echo "连接失败<br>";
}




if(mysql_select_db("ms")){
    echo "选择数据库成功<br>";
}else{
    echo "选择数据库失败<br>";
}

$table = "create table if not exists fruits (id int(4) not null auto_increment,name varchar(20) null, primary key(id))" ;
$res = mysql_query($table);
//var_dump($res);
$insert = "insert into fruits values(1,'apple'),(2,'banana')";
$insert2 = "insert into fruits values(3,'pear'),(4,'orange')";
//var_dump(mysql_query($insert2));
$search = "select * from fruits";
$query = mysql_query($search);
//print_r(mysql_fetch_row($query));
//print_r(mysql_fetch_row($query));
print_r(mysql_fetch_array($query,MYSQL_NUM));
print_r(mysql_fetch_array($query,MYSQL_ASSOC));

//$arr = mysql_fetch_object($query);

//var_dump($query);
//echo 'row: ' .  mysql_fetch_row($search) . '<br>';
//echo 'array: ' . mysql_fetch_array($search) . '<br>';



?>