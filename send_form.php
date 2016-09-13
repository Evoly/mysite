<?php


mysql_connect("localhost", "root", "")//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");

mysql_query("SET NAMES 'utf8'"); // кодировка соединения с сервером


mysql_select_db("form")//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");

 function handle_error($user_error_message, $system_error_message)
 {die ($user_error_message ." " . $system_error_message); };
 
 $upload_dir = "user_forms/";
 $email = $_POST ["user_email"];
 $name = $_POST ["user_name"];
 $comment = $_POST ["user_comment"];
 $file_name = "user_form";
 $date=date('Y-m-d');

 $php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
 2 => 'Превышенм мах. размер файла, указанный в форме html',
 3 => 'Была отправлена только часть файла',
 4 => 'Файл для отправки не был выбран');
 
 

//Перемещение файла
$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$file_name]['name'])){
	$now++;
}
//echo $upload_filename;
//echo $name;

@move_uploaded_file($_FILES[$file_name]['tmp_name'], $upload_filename)
or handle_error("возникла проблема при сохранении Вашего изображения в его постоянном месте <br>",
"ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}");

$insert_sql = "INSERT INTO users SET users_file='$upload_filename' , date='$date',name = '$name' , email = '$email', comment = '$comment' ";
mysql_query($insert_sql);

include 'redirect.html'



?>