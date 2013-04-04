<?php use Laravel\FilesystemIterator as fIterator; use Laravel\Closure as Closure;

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
   * @var string
   */
  private $name;

  /**
   * The template data.
   * @var array
   */
  private $data;

  /**
   * The same compiler functions used by Blade.
   *
   * @var array
   */
  protected static $compilers = array(
    'extensions',
    'layouts',
    'comments',
    'echos',
    'forelse',
    'empty',
    'endforelse',
    'structure_openings',
    'structure_closings',
    'else',
    'unless',
    'endunless',
    'includes',
    'render_each',
    'render',
    'yields',
    'yield_sections',
    'section_start',
    'section_end',
  );

  #             ~ ---------- ~              #

  /**
   * Create a new Template instance
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

    // Check for template existance
    if (! $this->exists($name))
    {
      throw new \Exception("<b>Mailblade:</b> Template [$name] doesn't exist.");
    }   

  }

  /**
   * Create a new Template instance
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

  #             ~ ---------- ~              #
  
  /**
   * Get the path to a given view
   * @param  string   $view
   * @return string
   */
  protected function path($view)
  {
    // Get the template directory set by the user
    $dir = Config::get('mailblade::mailblade.template_dir');

    // If user didn't set any custom directory
    // use Mailblade's default option
    if (! $dir OR $dir === 'default')
    {
      $dir = Bundle::path('mailblade').'templates'.DS;
    }

    // Mailblade is language aware
    $lang = Config::get('application.language').DS;
   

    // Mailblade should only handle the rendering of views which
    // end with the Blade extension.
    if (file_exists($path = $dir.$lang.$view.BLADE_EXT))
    {
      return $path;
    }

    return false;
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