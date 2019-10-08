<html>
 <head>
 <meta charset="utf-8" />
 </head>
 <body>
 <?php
 mb_language("Japanese");
 mb_internal_encoding("UTF-8");

 $to = "sendmail@yahoo.co.jp";
 $title = "テストメール";
 $from = "frommail@yahoo.co.jp";

 //ヘッダー設定
 $header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
 $header .= "Return-Path: " . $to . " \n";
 $header .= "From: " . $from ." \n";
 $header .= "Sender: " . $from ." \n";
 $header .= "Reply-To: " . $to . " \n";

 //本文
 $text = "テストメール";
 $content = "--__BOUNDARY__\n";
 $content .= "Content-Type: text/plain; charset=\"UTF-8\"\n\n";
 $content .= $text . "\n";
 $content .= "--__BOUNDARY__\n";

 //添付ファイル名
 $file = "test.pdf";

 //添付ファイル設定
 $content .= "Content-Type: application/octet-stream; name=\"{$file}\"\n";
 $content .= "Content-Disposition: attachment; filename=\"{$file}\"\n";
 $content .= "Content-Transfer-Encoding: base64\n";
 $content .= "\n";
 $content .= chunk_split(base64_encode(file_get_contents("./pdf/".$file)));
 $content .= "--__BOUNDARY__\n";



 if(mb_send_mail($to, $title, $content, $header)){
 echo "メールを送信しました";
 } else {
 echo "メールの送信に失敗しました";
 }
 ?>
 </body>
</html>
