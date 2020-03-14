<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private $mailer;
    public $error;

    public function __construct($modelo = null)
    {
        $this->mailer = new PHPMailer(true);

        $this->mailer->isSMTP();                                            
        $this->mailer->Host       = CONFIG["MAILERHOST"]; 
        $this->mailer->SMTPAuth   = CONFIG["MAILERSMTPAUTH"];
        $this->mailer->Username   = CONFIG["MAILERUSER"];
        $this->mailer->Password   = CONFIG["MAILERPASSWORD"];
        $this->mailer->SMTPSecure = CONFIG["MAILERSMTPSECURE"];
        $this->mailer->Port       = CONFIG["MAILERPORT"];
        $this->mailer->CharSet    = 'UTF-8';

        $this->mailer->setFrom(CONFIG["MAILERACCOUNT"], CONFIG["MAILERACCOUNTNAME"]);
        $this->mailer->Subject = CONFIG["MAILERDEFAULTSUBJECT"];
        $this->mailer->isHTML(true);  

        ob_start();
        // include './views/Templates/' . ( empty($modelo) ? "Mailer" : $modelo ) . '.htm';
        include CONFIG["BASEDIR"]. '/views/Templates/' . ( empty($modelo) ? "Mailer" : $modelo ) . '.htm';
        $body = ob_get_clean();

        $this->mailer->Body    = $body;
    }      
    
    public function to($email, $name = null): Mailer
    {
        try {
            if(!empty($name)) {
                $this->mailer->addAddress($email, $name);
            }
            else {
                $this->mailer->addAddress($email);
            }
        } catch (Exception $e) {
            $this->error = $e;
        }
        return $this;
    }

    public function cc($email, $name = null): Mailer
    {
        try {
            if(!empty($name)) {
                $this->mailer->addCC($email, $name);
            }
            else {
                $this->mailer->addCC($email);
            }
        } catch (Exception $e) {
            $this->error = $e;
        }        
        return $this;
    } 
    
    public function bcc($email, $name = null): Mailer
    {
        try {
            if(!empty($name)) {
                $this->mailer->addBCC($email, $name);
            }
            else {
                $this->mailer->addBCC($email);
            }
        } catch (Exception $e) {
            $this->error = $e;
        }        
        return $this;
    }  
    
    public function body($body): Mailer
    {
        try {
            $this->mailer->Body = str_replace('{body}', $body, $this->mailer->Body);        
        } catch (Exception $e) {
            $this->error = $e;
        }
        return $this;
    }    

    public function subject($subject): Mailer
    {
        try {
            $this->mailer->Subject = $subject;
        } catch (Exception $e) {
            $this->error = $e;
        }
        return $this;        
    }

    public function send(): Mailer
    {
        try {
            $this->mailer->send();
        } catch (Exception $e) {
            $this->error = $e;
        }                    

        return $this;
    }

}