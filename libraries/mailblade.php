<?php

/**
 * Mailblade class
 *
 * A Laravel bundle for managing your email templates
 * using the Blade templating language.
 * 
 * @package    Mailblade
 * @author     Carlos Castillo (http://carlos.castillo.com.co)
 * @link       https://github.com/crlosmify/laravel-mailblade
 * @license    MIT License
 */

class Mailblade {

  /**
   * The template view.
   * 
   * @var string
   */
  private $view;

  /**
   * The template language
   * 
   * @var string
   */
  private $lang;

  /**
   * The template data.
   * 
   * @var array
   */
  private $data;

  #             ~ ---------- ~              #

  /**
   * Create a new Mailblade instance
   *
   * @param   string  $view
   * @param   array   $data
   * @return  void
   */
  public function __construct($view, $data = array())
  {
    // Set view
    $this->view = $view;

    // Set language
    $this->lang = Config::get('application.language');

    // Set data
    $this->data = $data;

    // Check for existance
    if (! $this->exists())
    {
      throw new \Exception("<b>Mailblade:</b> Template [$view] doesn't exist.");
    }
  }

  /**
   * Create a new Mailblade instance
   *
   * @param   string     $view
   * @param   array      $data
   * @return  Mailblade
   */
  public static function make($view, $data = array())
  {
    return new static($view, $data);
  }

  #             ~ ---------- ~              #
  
  /**
   * Check that a given template exists
   * 
   * @return  bool
   */
  public function exists()
  {
    // Get the template directory
    $dir = Bundle::path('mailblade').'views'.DS;

    // Mailblade is language aware
    $lang = $this->lang.DS;

    // Name of the view file
    $view = $this->view;

    // We use Laravel's dot notation
    $view = str_replace('.', '/', $view);

    if (file_exists($dir.$lang.$view.EXT))
    {
      return true;
    }
    elseif (file_exists($dir.$lang.$view.BLADE_EXT))
    {
      return true;
    }

    return false;
  }

  #             ~ ---------- ~              #

  /**
   * Add a key / value pair to the template data.
   *
   * Bound data will be available to the view as variables.
   *
   * @param  string  $key
   * @param  mixed   $value
   * @return Mailblade
   */
  public function with($key, $value = null)
  {
    if (is_array($key))
    {
      $this->data = array_merge($this->data, $key);
    }
    else
    {
      $this->data[$key] = $value;
    }

    return $this;
  }

  #             ~ ---------- ~              #

  /**
   * Get the array of template data for the template instance.
   *
   * It is also possible to get just one key of the data array
   * by passing the $key parameter
   *
   * @param   string  $key
   * @return  mixed
   */
  public function data($key = null)
  {
    if ($key)
    {
      return $this->data[$key];
    }

    return $this->data;
  }

  /**
   * Return html version of the template
   * 
   * @return string
   */
  public function html()
  {
    // Name of the template
    $view = 'mailblade::'.$this->lang.'.'.$this->view;

    return View::make($view)
      ->with($this->data)
      ->render();
  }

  /**
   * Return text version of the template
   * 
   * @return string
   */
  public function text()
  {
    // Directory
    $dir = Bundle::path('mailblade').'views'.DS;
    
    // File
    $file = $dir.$this->lang.DS.$this->view.'.txt';

    if (! file_exists($file))
    {
      throw new \Exception("<b>Mailblade:</b> Text version for the template [$this->view] wasn't found.");
    }

    // Run blade compilers on the text version
    $compiled = Blade::compile_string(file_get_contents($file));

  }

}