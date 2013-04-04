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
  | Template directory
  |--------------------------------------------------------------------------
  |
  | Put here the name of the directory where you will be
  | storing the email templates.
  |
  | Choose 'default' to use mailblade's default options.
  | Mailblade is aware of your application's language and
  | it tracks the email templates by language.
  | So make sure you save your templates following this convention:
  |
  | '[template_dir]/[language]/[template_name.html]'
  |
  | for html tempaltes. And in the same folder
  |
  | '[template_dir]/[language]/[template_name.txt]'
  |
  | for the text version.
  |
  */
 
 'template_dir' => 'default',

);