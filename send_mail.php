<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
</head>
<?php
$email="sendmail@yahoo.co.jp";

mb_language("Japanese");
mb_internal_encoding("UTF-8");//php.ini���ύX�ł��Ȃ��ꍇ�̑Ή��B�ꎞ�I�ɐݒ��ς���B

$from="frommail@yahoo.co.jp";
$subject="�e�X�g���[��";
$body="���M�e�X�g�ł�";
$success=mb_send_mail($email,$subject,$body,"From:".$from);
?>

<body>
  <?php if ($success): echo $email ?>�Ƀ��[���𑗐M���܂����B
  <?php else: ?>���M�G���[
  <?php endif; ?>
</body>
</html>
