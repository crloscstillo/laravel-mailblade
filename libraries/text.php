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
   * Determine if the given text view exists.
   *
   * @param  string       $view
   * @param  boolean      $return_path
   * @return string|bool
   */
  public static function exists($view, $return_path = false)
  {
    // Get the template directory
    $dir = Config::get('mailblade::options.template_dir');

    // Use custom templates folder if found
    if (! empty($dir))
    {
      $path = static::custom_path($view, $dir);
    }
    else
    {
      // If there is no custom folder, use Mailblade's default
      $dir = $dir = Bundle::path('mailblade').'views'.DS;
      // Mailblade is language-aware
      $lang = Config::get('application.language').DS;

      $view = str_replace('.', '/', $view);

      // Determine the path ourselves
      $path = file_exists($dir.$lang.$view.TXT_EXT)
        ? $dir.$lang.$view.TXT_EXT
        : null;
    }

    if (! is_null($path))
    {
      return $return_path ? $path : true;
    }

    return false;
  }

    /**
   * Get the path to a given view on disk.
   *
   * @param  string  $view
   * @return string
   */
  protected function path($view)
  {
    if ($path = $this->exists($view, true))
    {
      return $path;
    }
    
    throw new \Exception("<b>Mailblade:</b> Text version for the template [$view] doesn't exist in the specified folder.");
  }

  /**
   * Get the custom path to a given text view on disk.
   * 
   * @param  string $view
   * @param  string $view
   * @return string
   */
  protected static function custom_path($view, $dir)
  {
    // Get application language
    $lang = Config::get('application.language').DS;

    // We use Laravel's date(format)ot notation for file paths
    $view = str_replace('.', '/', $view);

    $dir = $dir.DS;

    // Full path
    $path = $dir.$lang.$view;

    if (file_exists($path = $dir.$lang.$view.TXT_EXT))
    {
      return $path;
    }

    return false;
  }
}