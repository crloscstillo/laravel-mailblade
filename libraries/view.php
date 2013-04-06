<?php namespace Mailblade;

use \Laravel\Config;
use \Laravel\Bundle;
use \Laravel\Session;
use \Laravel\Messages;

class View extends \Laravel\View {

  /**
   * Create a new View instance
   * 
   * @param  string  $view
   * @param  array   $data
   */
  public function __construct($view, $data = array())
  {
    $this->view = $view;
    $this->data = $data;

    // Mailblade allows you to load views from
    // anywhere in the application.
    // This is the main difference with the normal View class
    // See the path() method for further reference
    $this->path = $this->path($view);

    // If a session driver has been specified, we will bind an instance of the
    // validation error message container to every view. If an error instance
    // exists in the session, we will use that instance.
    if ( ! isset($this->data['errors']))
    {
      if (Session::started() and Session::has('errors'))
      {
        $this->data['errors'] = Session::get('errors');
      }
      else
      {
        $this->data['errors'] = new Messages;
      }
    }
  }

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

    if (file_exists($path = $dir.$lang.$view.EXT))
    {
      return $return_path ? $path : true;
    }
    elseif (file_exists($path = $dir.$lang.$view.BLADE_EXT))
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
    
    throw new \Exception("<b>Mailblade:</b> Template [$view] doesn't exist.");
  }

}