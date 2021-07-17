<?php header("Content-Type: text/html; charset=utf-8");
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest") { if(!isset($_POST["name"]) || !isset($_POST["email"])) { die(); }
function send_form($message) { $mail_to = "your_mail@mail.ru";
  $subject = "Письмо с обратной связи";
  $headers = "MIME-Version: 1.0\r\n"; $headers .= "Content-type: text/html; charset=utf-8\r\n"; $headers .= "From: Система уведомлений <no-reply@".$_SERVER['HTTP_HOST'].">\r\n"; mail($mail_to, $subject, $message, $headers); }

  $name = strip_tags($_POST["name"]);
  $email = strip_tags($_POST["email"])

  if(!preg_match("|^([a-z0-9_.-]{1,20})@([a-z0-9.-]{1,20}).([a-z]{2,4})|is", strtolower($email))) {echo "E-mail указан некорректно."; die(); }

  if($name == "") {$name = "Не указано"; }
  $message = <<<HTML <b>Имя отправителя</b>: {$name}<br> <b>E-mail</b>: {$email}<br><br> HTML; send_form($message);
  echo "Сообщение успешно отправлено!"; } else { die(); }

?>