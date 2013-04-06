<?php namespace Mailblade;

use \Laravel\Config;
use \Laravel\Bundle;

/**
 * Text class
 * 
 * @package    Mailblade
 * @author     Carlos Castillo (http://carlos.castillo.com.co)
 * @link       https://github.com/crlosmify/laravel-mailblade
 * @license    MIT License
 */

class Text extends View {

   /**
   * Determine if the given view exists.
   *
   * @param  string       $view
   * @param  boolean      $return_path
   * @return string|bool
   */
  public static function exists($view, $return_path = false)
  {
    // Get the template directory
    $dir = Config::get('mailblade::options.template_dir');

    if (! $dir OR $dir === 'default')
    {
      $dir = Bundle::path('mailblade').'templates'.DS;
    }

    // Mailblade is language aware
    $lang = Config::get('application.language').DS;

    // We use Laravel's dot notation for specifying file paths
    $view = str_replace('.', '/', $view);

    // Full path
    $path = $dir.$lang.$view;

    if (file_exists($path = $dir.$lang.$view.BLADE_TXT))
    {
      return $return_path ? $path : true;
    }
    
    return false;
  }

}