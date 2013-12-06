<?php
    use Sami\Sami;
    use Symfony\Component\Finder\Finder;
    require ('vendor/autoload.php');
    
    $iterator = Finder::create()
                      ->files()
                      ->name( '*.php' )
                      ->exclude( 'tests' )
                      ->in( $dir = __DIR__ . '/src' );

    return new Sami( $iterator, array(
        'theme'                => 'enhanced',
        'title'                => 'PHP .Net Documentation',
        'build_dir'            => __DIR__ . '/docs/documentation',
        'cache_dir'            => __DIR__ . '/docs/documentation/cache',
        'default_opened_level' => 1,
    ));