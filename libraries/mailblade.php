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

    // Set data
    $this->data = $data;
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
    return Mailblade\View::make($this->view)
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
    // Implement text rendering
    return Mailblade\Text::make($this->view)
      ->with($this->data)
      ->render();
  }

}