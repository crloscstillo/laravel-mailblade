<?php use Laravel\FilesystemIterator as fIterator; use Laravel\Closure as Closure;

/**
 * Mailblade class
 *
 * A Laravel bundle for managing your email templates
 * and sending them.
 * 
 * @package    Mailblade
 * @author     Carlos Castillo (http://carlos.castillo.com.co)
 * @link       https://github.com/crlosmify/laravel-mailblade
 * @license    MIT License
 */

class Mailblade {

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
   * @param   array   $params
   * @return  void
   */
  public function __construct($name, array $params = NULL)
  {

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

}