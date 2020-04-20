<?php
 if(isset($_POST['submit'])){
   $nameErr = '';
   
    $name = $email = $subject = $message ='';
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    if (empty($_POST["name"])) {
       $nameErr = "Имя обязательно";
       echo $nameErr.'<br/>';
      } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-яA-Я ]*$/",$name)) {
            $nameErr = "Разрешены только буквы и пробелы";
            echo $nameErr.'<br/>';
          }
      }
    
      if (empty($_POST["email"])){
        $emailErr = "Email обязательно";
        echo $emailErr.'<br/>';
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Неверный формат электронной почты";
            echo $emailErr.'<br/>';
          }
      }
    
      if (empty($_POST["subject"])){
        $subjectErr = "Тема обязательна";
        echo  $subjectErr.'<br/>';
      } else {
        $subject = test_input($_POST["subject"]);
      }
    
      if (empty($_POST["message"])) {
        $messageErr = "Поле для сообщения не может быть пустым";
        echo $messageErr.'<br/>';
      } else {
        $message = test_input($_POST["message"]);
      }
     
    function check_length($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    };
    
    if(check_length($name, 2, 25) && check_length($subject, 2, 50) && check_length($message, 2, 1000) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-яA-Я ]*$/",$name) ) {
      mail('emaild@example.com', $subject, $message); 
      echo "Спасибо за сообщение";
    } else { // добавили сообщение
        echo "Введенные данные некорректны";
    }
 };
 
 
?>