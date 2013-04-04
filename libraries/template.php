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
  public function __construct($name, array $params = NULL)
  {
    // Set name
    $this->name = $name;
    // Set parameters
    if ($params) $this->params = $params;
    // Get contents of template
    $this->set_template('html');
    $this->set_template('txt');
  }

  /**
   * Create a new Template instance
   * 
   * @param  string $name  
   * @param  array  $params
   * @return Template
   */
  public static function make($name, array $params = NULL)
  {
    return new static($name, $params);
  }

  #             ~ ---------- ~              #
  
  /**
   * Set ALL parameters for the email template
   * 
   * @param  array  $params
   * @return Template
   */
  public function parameters(array $params)
  {
    $this->params = $params;
    return $this;
  }

  /**
   * Set a parameter for the template.
   * 
   * @param  string $param
   * @param  string $value
   * @return Template
     */
  public function with($param, $value)
  {
    $this->params[$param] = $value;
    return $this;
  }

  #             ~ ---------- ~              #
  
  /**
   * Set appropriate email template content
   * 
   * @param   string    $type
   * @return  Template
   */
  private function set_template($type)
  {
    $dir  = 'templates';
    $lang = Config::get('application.language');
    $file = Bundle::path('mailblade').$dir.DS.$lang.DS.$this->name.'.'.$type;
    $this->$type = file_get_contents($file);
    return $this;
  }

  /**
   * Compile the email template specific version
   *
   * @param   string     $version   Template version (html|txt)
   * @return  Mailblade
   */
  public function compile($type)
  {
    $content = $this->$type;
    $params  = $this->params;

    foreach ($params as $param => $value) {
      $content = str_replace('{{'.$param.'}}', $value, $content);
      $content = str_replace('{{ '.$param.' }}', $value, $content);
    }

    $this->$type = $content;    
  }

  #             ~ ---------- ~              #

  /**
   * Get a template version
   * 
   * @param  string $version
   * @return string
   */
  public function get($version)
  {
    return $this->$version;
  }

}