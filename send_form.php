<?php


mysql_connect("localhost", "root", "")//��������� � ������� ("����", "��� ������������", "������")
or die("<p>������ ����������� � ���� ������! " . mysql_error() . "</p>");

mysql_query("SET NAMES 'utf8'"); // ��������� ���������� � ��������


mysql_select_db("form")//�������� � ������� ("��� ����, � ������� �����������")
 or die("<p>������ ������ ���� ������! ". mysql_error() . "</p>");

 function handle_error($user_error_message, $system_error_message)
 {die ($user_error_message ." " . $system_error_message); };
 
 $upload_dir = "user_forms/";
 $email = $_POST ["user_email"];
 $name = $_POST ["user_name"];
 $comment = $_POST ["user_comment"];
 $file_name = "user_form";
 $date=date('Y-m-d');

 $php_errors = array(1 => '�������� ���. ������ �����, ��������� � php.ini',
 2 => '��������� ���. ������ �����, ��������� � ����� html',
 3 => '���� ���������� ������ ����� �����',
 4 => '���� ��� �������� �� ��� ������');
 
 

//����������� �����
$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$file_name]['name'])){
	$now++;
}
//echo $upload_filename;
//echo $name;

@move_uploaded_file($_FILES[$file_name]['tmp_name'], $upload_filename)
or handle_error("�������� �������� ��� ���������� ������ ����������� � ��� ���������� ����� <br>",
"������, ��������� � ������� ������� ��� ����������� ����� � {$upload_filename}");

$insert_sql = "INSERT INTO users SET users_file='$upload_filename' , date='$date',name = '$name' , email = '$email', comment = '$comment' ";
mysql_query($insert_sql);

include 'redirect.html'



?>