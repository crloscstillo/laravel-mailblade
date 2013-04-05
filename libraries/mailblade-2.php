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
   * The template name.
   * 
   * @var string
   */
  private $name;

  /**
   * The template data.
   * 
   * @var array
   */
  private $view;

  /**
   * The path to the template on disk.
   *
   * @var string
   */
  private $path;

  /**
   * Template compiled into valid PHP
   * 
   * @var string
   */
  private $compiled;

  /**
   * Create a new Mailblade instance
   *
   * @param   string  $name
   * @param   array   $data
   * @return  void
   */
  public function __construct($name, $data = array())
  {
    // Set name
    $this->name = $name;

    // Set data
    $this->data = $data;

    // Set path
    $this->path = $this->path($name);

    if (! $this->path)
    {
      throw new \Exception("<b>Mailblade:</b> Template [$name] doesn't exist.");
    }
  }

  /**
   * Create a new Mailblade instance
   * 
   * @param  string $name  
   * @param  array  $data
   * @return Template
   */
  public static function make($name, $data = array())
  {
    return new static($name, $data);
  }

  /**
   * Check that a given template exists
   * @param   string  $view
   * @return  bool
   */
  public function exists($view)
  {
    return $this->path($view) ? true : false;
  }

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

}