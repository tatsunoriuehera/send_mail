<html>
 <head>
 <meta charset="utf-8" />
 </head>
 <body>
 <?php
 mb_language("Japanese");
 mb_internal_encoding("UTF-8");

 $to = "sendmail@yahoo.co.jp";
 $title = "�e�X�g���[��";
 $from = "frommail@yahoo.co.jp";

 //�w�b�_�[�ݒ�
 $header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
 $header .= "Return-Path: " . $to . " \n";
 $header .= "From: " . $from ." \n";
 $header .= "Sender: " . $from ." \n";
 $header .= "Reply-To: " . $to . " \n";

 //�{��
 $text = "�e�X�g���[��";
 $content = "--__BOUNDARY__\n";
 $content .= "Content-Type: text/plain; charset=\"UTF-8\"\n\n";
 $content .= $text . "\n";
 $content .= "--__BOUNDARY__\n";

 //�Y�t�t�@�C����
 $file = "test.pdf";

 //�Y�t�t�@�C���ݒ�
 $content .= "Content-Type: application/octet-stream; name=\"{$file}\"\n";
 $content .= "Content-Disposition: attachment; filename=\"{$file}\"\n";
 $content .= "Content-Transfer-Encoding: base64\n";
 $content .= "\n";
 $content .= chunk_split(base64_encode(file_get_contents("./pdf/".$file)));
 $content .= "--__BOUNDARY__\n";



 if(mb_send_mail($to, $title, $content, $header)){
 echo "���[���𑗐M���܂���";
 } else {
 echo "���[���̑��M�Ɏ��s���܂���";
 }
 ?>
 </body>
</html>
