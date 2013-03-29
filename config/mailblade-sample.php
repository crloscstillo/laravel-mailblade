<?php

/*
|--------------------------------------------------------------------------
| Mailblade Configuration and Options
|--------------------------------------------------------------------------
*/
 
return array(

  /*
  |--------------------------------------------------------------------------
  | Email Sending Method
  |--------------------------------------------------------------------------
  |
  | Choose the way you want to send your email.
  | You can send emails either from your own server or using
  | other service providers (currently only supporting Mandrill and Postmark).
  |
  | Currently we support these: smtp | mandrill | postmark
  |
  */

  'sending_method' => 'smtp',

  /*
  |--------------------------------------------------------------------------
  | Incoming email inbox
  |--------------------------------------------------------------------------
  |
  | This is the inbox where you want to receive the messages
  |
  */
 
  'inbound_inbox' => 'example@gmail.com',

  /*
  |--------------------------------------------------------------------------
  | Template name
  |--------------------------------------------------------------------------
  |
  | Put here the name of the email template used when
  | sending the message.
  | You can style it at wish or just use the included message by default.
  |
  | Contacto is aware of your application's language and
  | it tracks the email templates by language.
  | So make sure you save your templates following this convention:
  | 'contacto/templates/[language]/[template.html]'
  |
  */
 
 'template_name' => 'contact-message',

);