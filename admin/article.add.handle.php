<?php 
require_once('../config/connect.php');
if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
    echo "<script>alert('title must not be empty'); window.location.href='article.add.php'</script>";
}
$title = $_POST['title'];
$author = $_POST['author'];
$desc = $_POST['description'];
$content = $_POST['content'];
//$created = time();
//$modified = $created;
$sql = "insert into articles(title,author,description,content)  values('$title','$author','$desc','$content')";
//echo $sql;
if(mysql_query($sql)){
    echo "<script>alert('Congradutaion! You have post article successfully!'); window.location.href='article.add.php'</script>";
} else{
     echo "<script>alert('Sorry! You have post article failed!'); window.location.href='article.add.php'</script>";
}

/*把alert改为model*/