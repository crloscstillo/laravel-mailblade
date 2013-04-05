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

  public function html()
  {
    $lang = Config::get('application.language');
    $view = View::make();
  }

}