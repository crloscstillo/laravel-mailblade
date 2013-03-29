<?php namespace Mailblade;

use \Config;
use \Bundle;

class Template {

  /**
   * The template name.
   * @var string
   */
  public $name;

  /**
   * The template parameters.
   * @var array
   */
  private $params = array();

  /**
   * HTML version of the message
   * @var string
   */
  private $html;

  /**
   * Text version of the message
   * @var string
   */
  private $txt;

  #             ~ ---------- ~              #
  
  /**
   * Create a new Template instance
   *
   * @param   string  $name
   * @param   array   $params
   * @return  void
   */
  public function __construct($name=null, array $params=null)
  {
    
  }

  /**
   * Create a new Template instance
   * 
   * @param  string $name  
   * @param  array  $params
   * @return Template
   */
  public static function make($name=null, array $params=null)
  {
    return new static($name, $params);
  }

}