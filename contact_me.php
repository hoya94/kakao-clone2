<?php
include_once('PHPMailer/PHPMailerAutoload.php');
header("Content-Type: text/html; charset=UTF-8");
 
// 빈 필드가 있는지 확인하는 구문
if(empty($_POST['name'])  		|| // post로 넘어온 name값이 비었는지 확인
   empty($_POST['email']) 		|| // email값이 비었는지 확인
   empty($_POST['phone']) 		|| // phone값이 비었는지 확인
   empty($_POST['message'])	|| // message값이 비었는지 확인
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) // 전달된 이메일 값이 유효한 이메일값인지 검증
   {
	echo "인수를 확인해주세요!";
	return false;
   }
// Cross-Site Scripting (XSS)을 방지하는 시큐어코딩
// strip_tags() -> 문자열에서 html과 php태그를 제거한다
// htmlspecialchars() -> 특수 문자를 HTML 엔터티로 변환
// 악의적인 특수문자 삽입에 대비하기 위함
 
function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc="")
{
      if ($type != 1) $content = nl2br($content);
      // type : text=0, html=1, text+html=2
      $mail = new PHPMailer(); // defaults to using php "mail()"
      $mail->IsSMTP();
         //   $mail->SMTPDebug = 2;
      $mail->SMTPSecure = "ssl";
      $mail->SMTPAuth = true;
      $mail->Host = "smtp.naver.com";
      $mail->Port = 465;
      $mail->Username = "eduleys012";
      $mail->Password = "!Nkpua2013";
      $mail->CharSet = 'UTF-8';
      $mail->From = $fmail;
      $mail->FromName = $fname;
      $mail->Subject = $subject;
      $mail->AltBody = ""; // optional, comment out and test
      $mail->msgHTML($content);
      $mail->addAddress($to);
      if ($cc)
            $mail->addCC($cc);
      if ($bcc)
            $mail->addBCC($bcc);
      if ($file != "") {
            foreach ($file as $f) {
                  $mail->addAttachment($f['path'], $f['name']);
            }
      }
      if ( $mail->send() ){ 
         echo "<script>
         alert(\"Sent Mail.\");
         window.open('./dr2.html','drdr','width=600,height=600,top=100,left=100');
         </script>";

      echo "<script>location.replace('index.html');</script>" ;}
      else 
      {
         echo "<script>
         alert(\"Failed Mail.\");
         window.open('./dr2.html','drdr','width=600,height=600,top=100,left=100');
         </script>";
      echo "<script>location.replace('index.html');</script>" ;}
      
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   

// 이메일을 생성하고 메일을 전송하는 부분
$to = 'eduleys012@naver.com'; // 받는 측의 이메일 주소를 기입하는 부분
// $email_subject = "FROM:  $name"; // 메일 제목에 해당하는 부분
// $email_body = "본 메일은 홈페이지 폼메일로부터 전송된 이메일입니다..\n\n"."세부정보는 다음과 같습니다.\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "Reply-To: $email_address\r"; // 답장 주소
 
//mail($to,'=?UTF-8?B?'.base64_encode($email_subject).'?=',$email_body,$headers);

//mail($to,'=?UTF-8?B?'.base64_encode($email_subject).'?=',$email_body,$headers);
//mailer($name,$to,$email_address,$name,$message, 0, $file );


mailer($name,$to,$to,"[Request!!!] " .$email_address, "Phone :" . $phone . '<br>' .$message );



return true;			
?>