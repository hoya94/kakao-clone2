<!DOCTYPE html>
<html lang="ko">
  <head>
    <!-- charset 설정 -->
    <meta charset="UTF-8">
    <!-- ie 호환성보기 무시 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 모바일을 위한 viewport설정 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>폼메일 소스</title>
    <style>
      .contact_form input[type=text],
      .contact_form select,
      .contact_form textarea,
      .contact_form input[type=email],
      .contact_form input[type=tel] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }
      
      .contact_form>h3 {
        text-align: center;
      }
      
      .contact_form textarea {
        height: 200px;
        resize: none;
      }
      
      .contact_form input[type=submit] {
        background-color: #737373;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s;
      }
      
      .contact_form input[type=submit]:hover {
        background-color: #aaa;
      }
      
      .contact_form {
        width: 90%;
        margin: 0 auto;
        margin-top: 50px;
        border-radius: 5px;
        padding: 20px;
      }
      
      .contact_form>h3 {
        font-size: 30px;
        padding-bottom: 50px;
      }
 
    </style>
  </head>
 
  <body>
    <!-- 폼태그 -->
    <section class="contact_form" id="contact_form">
      <h3>Request Your Habbit</h3>
      <form action="contact_me.php" method="post">
        <label for="name">*Name</label>
        <input type="text" id="name" name="name" placeholder="이름" required>
        <label for="email">*E-mail</label>
        <input type="email" id="email" name="email" placeholder="이메일" required>
        <label for="phone">*Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="전화번호" required>
        <label for="message">*Message</label>
        <textarea id="message" name="message" placeholder="문의내용" required></textarea>
        <input type="submit" value="Send">
      </form>
    </section>
  </body>
 
</html>