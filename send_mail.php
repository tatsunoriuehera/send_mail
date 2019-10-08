<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
</head>
<?php
$email="sendmail@yahoo.co.jp";

mb_language("Japanese");
mb_internal_encoding("UTF-8");//php.iniが変更できない場合の対応。一時的に設定を変える。

$from="frommail@yahoo.co.jp";
$subject="テストメール";
$body="送信テストです";
$success=mb_send_mail($email,$subject,$body,"From:".$from);
?>

<body>
  <?php if ($success): echo $email ?>にメールを送信しました。
  <?php else: ?>送信エラー
  <?php endif; ?>
</body>
</html>
