<?php

use Mailblade\Template as Template;

/**
 * Mailblade class
 *
 * A Laravel bundle for managing your email templates
 * and sending them.
 * 
 * @package    Mailblade
 * @author     Carlos Castillo (http://carlos.castillo.com.co)
 * @link       https://github.com/crlosmify/laravel-mailblade
 * @license    MIT License
 */

class Mailblade {

  /**
   * Method of sending email messages (smtp, postmark or mandrill)
   * @var string
   */
  private $sending_method;

 /**
   * Inbox where you will receive the email messages
   * @var string
   */
  private $inbound_inbox;
  
  /**
   * Email template used for the message
   * @var Template
   */
  public $template;

  #             ~ ---------- ~              #
  
  /**
   * Create a new Mailblade instance
   *
   * @param  string   $sending_method
   * @param  string   $inbound_inbox
   * @return void
   */
  public function __construct($sending_method=null, $inbound_inbox=null)
  {
    if (! $sending_method) $sending_method = Config::get('mailblade::mailblade.sending_method');;
    if (! $inbound_inbox) $inbound_inbox   = Config::get('mailblade::mailblade.inbound_inbox');

    $this->sending_method = $sending_method;
    $this->inbound_inbox  = $inbound_inbox; 
  }

  /**
   * Create a new Mailblade instance
   *
   * @param  string    $sending_method
   * @param  string    $inbound_inbox 
   * @return Contacto
   */
  public static function make($sending_method=null, $inbound_inbox=null)
  {
    return new static($sending_method, $inbound_inbox);
  }

  #             ~ ---------- ~              #
  
  /**
   * Set email template to be used
   *
   * @param  string  $name     Name of the template
   * @param  array   $params   Parameters for the template
   * @return Template
   */
  public function template($name=null, array $params=null)
  {
    $this->template = Template::make($name, $params);
    return $this->template;
  }

  /**
   * Send email message
   * 
   * @param   array   $input
   * @return  bool
   */
  public function send(array $input)
  {
    
  }

  #             ~ ---------- ~              #
  
  /**
   * Use your own server to send the email
   * 
   * @param   array    $input Input from user
   * @return  bool
   */
  public function smtp(array $input)
  {

  }

  /**
   * Use Postmark to send the email
   * 
   * @param   array    $input Input from user
   * @return  bool
   */
  public function postmark(array $input)
  {

  }

}