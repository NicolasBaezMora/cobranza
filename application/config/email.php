<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  // You need to turn on your gmail setting first.
  // https://www.google.com/settings/security/lesssecureapps

  // $config['protocol'] = 'smtp';
  // $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
  // $config['smtp_port'] = '465'; //587
  // $config['smtp_user'] = 'developerh69@gmail.com'; //change this
  // $config['smtp_pass'] = 'diego'; //change this
  // $config['mailtype'] = 'html';
  // $config['charset'] = 'utf-8';
  // $config['wordwrap'] = TRUE;
  // $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard

  $config['protocol'] = 'smtp';
  $config['smtp_host'] = 'smtp.mailtrap.io'; //change this
  $config['smtp_port'] = '2525'; //587
  $config['smtp_user'] = ''; //change this
  $config['smtp_pass'] = ''; //change this
  $config['mailtype'] = 'html';
  $config['charset'] = 'utf-8';
  $config['wordwrap'] = TRUE;
  $config['crlf'] = "\r\n";
  $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard

/* End of file email.php */
/* Location: ./application/config/email.php */