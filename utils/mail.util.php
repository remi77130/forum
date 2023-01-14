<?php
class MailUtil{
    
    public static function send($from, $to, $subject, $body){

        $headers = '';
        $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n";
        $headers .= 'Return-Path: ' . $from . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
        $headers .= rtrim(chunk_split(base64_encode($body)));
        if (mail($to, $subject, $body, $headers)) {
            return true;
        }
        return false;
    }
}