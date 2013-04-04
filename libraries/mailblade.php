<?php

use Mailblade\Template as Template;
use Mailblade\Drivers\SMTP as SMTP;

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
   * The from address
   * 
   * @var string
   */
  private $from;

  /**
   * The reply-to email address
   * @var strinf
   */
  private $reply;

  /**
   * The subject of the message
   * @var string
   */
  private $subject;
  
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

  /**
   * Set the sending method
   * 
   * @param  string       $method
   * @return Mailblade
   */
  public function sending_method($method)
  {
    $this->sending_method = $method;
    return $this;
  }

  /**
   * Set the inbound inbox
   * 
   * @param  string      $inbox
   * @return Mailblade
   */
  public function inbound_inbox($inbox)
  {
    $this->inbound_inbox = $inbox;
    return $this;
  }

  #             ~ ---------- ~              #
  
  /**
   * Set email template to be used
   *
   * @param  string  $name     Name of the template
   * @param  array   $params   Parameters for the template
   * @return Template
   */
  public function template($name, array $params = NULL)
  {
    $this->template = Template::make($name, $params);
    return $this->template;
  }

  /**
   * Set from email address
   * @param  string     $email
   * @return Mailblade
   */
  public function from($email)
  {
    $this->from = $email;
    return $this;
  }

  /**
   * Set reply-to address
   * @param  string      $email
   * @return Mailblade
   */
  public function reply($email)
  {
    $this->reply = $email;
    return $this;
  }

  /**
   * Set message subject
   * @param  string      $subject
   * @return Mailblade
   */
  public function subject($subject)
  {
    $this->subject = $subject;
    return $this;
  }

  #             ~ ---------- ~              #

  /**
   * Send email message
   * 
   * @param   array   $input
   * @return  bool
   */
  public function send(array $input)
  {
    // First check if template is set
    if (! $this->template) throw new Exception('Mailblade: An email template has not yet been set.');

    // Compile template
    $this->template->parameters($input);
    $this->template->compile('html');
    $this->template->compile('txt');

    // Proceed to send the email message via the right method
    $sending_method = $this->sending_method;
    return $this->$sending_method($input);
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
    // Convert to individual variables
    extract($input);

    // Attempt to send the message
    $smtp = new SMTP;
    $smtp->to($this->inbound_inbox);
    $smtp->body($this->template->get('html'));
    $smtp->text($this->template->get('txt'));

    // Set this only if needed
    if ($this->from) $smtp->from($this->from);
    if ($this->reply) $smtp->reply($this->reply);
    if ($this->subject) $smtp->subject($this->subject);

    return $smtp->send();
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