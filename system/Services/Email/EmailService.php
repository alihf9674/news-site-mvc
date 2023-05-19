<?php

namespace System\Services\Email;

use Application\Exceptions\PHPMailerException;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailService
{
    private $subject;
    private $message;
    const MAIL_HOST = "ssl://smtp.gmail.com:465";
    const SMTP_AUTH = true;
    const MAIL_USERNAME = "alihatffar.96@gmail.com";
    const MAIL_PASSWORD = "nrobfvexigwxtucx";
    const MAIL_PORT = 465;
    const SENDER_MAIL = "alihatffar.96@gmail.com";
    const SENDER_NAME = "News Site Admin";
    const CHAR_SET = "UTF-8";
    const SMTP_SECURE = 'tls';

    /**
     * @throws PHPMailerException
     */
    public function send($emailAddress)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = self::CHAR_SET;
            $mail->Host = self::MAIL_HOST;
            $mail->SMTPAuth = self::SMTP_AUTH;
            $mail->Username = self::MAIL_USERNAME;
            $mail->Password = self::MAIL_PASSWORD;
            $mail->SMTPSecure = self::SMTP_SECURE;
            $mail->Port = self::MAIL_PORT;
            $mail->setFrom(self::SENDER_MAIL, self::SENDER_NAME);
            $mail->addAddress($emailAddress);
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body = $this->message;
            $mail->send();
            return true;
        } catch (Exception $e) {
            throw new PHPMailerException("Failed to send email " . $e->getMessage());
        }
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}