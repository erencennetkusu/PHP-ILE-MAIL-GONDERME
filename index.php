<?php
namespace App\Models;
use PDO;
use PDOException;


require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/SMTP.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function MailGonderData( $posta_mail, $posta_konu, $posta_mesaj ) {

    $mail = new PHPMailer();
    try {
        //Sunucu ayarları
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // Hata ayıklamak için debug etkin
        $mail->isSMTP();
        // SMTP kullanarak gönderim
        $mail->Host       = 'smtp.gmail.com';
        // SMTP sunucusu
        $mail->SMTPAuth   = true;
        // SMTP kimlik doğrulaması etkin
        $mail->Username   = 'asd12312312@gmail.com';
        // SMTP kullanıcısı
        $mail->Password   = 'lvgg123123cguz123jlckdsjo';
        // SMTP şifre
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // TLS ile şifreleme etkin
        $mail->Port       = 587;
        // SMTP port
        //Karakter ayarları
        $mail->CharSet  = 'utf-8';
        //Türkçe karakter sorununun önüne geçecektir.
        $mail->Encoding = 'base64';
        // Alıcılar
        $mail->setFrom( $posta_mail, $posta_konu );
        $mail->addAddress( $posta_mail, $posta_konu );
        // Alıcı
        //$mail->addReplyTo( 'info@ornek.com', 'Bilgi' );
        //$mail->addCC( 'cc@ornek.com' );
        //$mail->addBCC( 'bcc@ornek.com' );
        // İçerik
        $mail->isHTML( true );
        // Mail HTML formatında olacaktır.
        $mail->Subject = $posta_konu;
        $mail->Body    = $posta_mesaj;
        $mail->AltBody = 'non-HTML mail istemcileri için mesaj gövdesidir.';
        $mail->send();

    } catch ( Exception $e ) {

    }

}

MailGonderData("deneme@gmail.com","test baslik","test mesaj");


