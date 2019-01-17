<?php

class View {
  function __construct($name,$data = array()){

    require_once SITE_DIR . 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem(SITE_DIR . 'views');
    $twig = new Twig_Environment($loader, [
      // 'debug' => true,
      'cache' => SITE_DIR . 'cache/dev/twig',
    ]);

    // $twig->addExtension(new Twig_Extension_Debug());

    echo $twig->render($name,$data);

  }
}
