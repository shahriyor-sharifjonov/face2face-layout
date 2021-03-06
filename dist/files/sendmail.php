<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    // от кого письмо
    $mail->setFrom('f2fst@gmail.com', 'face2face');
    // кому отправить
    $mail->addAddress('hello@f2fst.ru');
    // $mail->addAddress('shahriyordeveloping@gmail.com');
    // тема письмо
    $mail->Subject = 'Обратная связь c сайта f2fst.ru';

    // VIN-CODE
    $vin_code = $_POST['vin'];




    // тело письмо
    $body = '<h1>Обратная связь c сайта f2fst.ru</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Номер телефона:</strong> '.$_POST['phone'].'</p>';
    }

    $mail->Body = $body;

    // Отправляем
    if (!$mail->send()){
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>