<?php

/*
|--------------------------------------------------------------------------
| Mailblade Start File
|--------------------------------------------------------------------------
*/

# The master class
Autoloader::map(array(
  'Mailblade' => Bundle::path('mailblade').'libraries'.DS.'mailblade.php'
));

# The namespace
Autoloader::namespaces(array(
  'Mailblade' => Bundle::path('mailblade').'libraries',
));

# Allow Blade to use text files
define('BLADE_TXT', '.txt.php');