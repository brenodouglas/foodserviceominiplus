<?php
namespace Base;

return array(
    
     'doctrine' => array(
        'driver' => array(
            __NAMESPACE__.'_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__.'/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__.'_driver'
                ),
            ),
        ),
    ),
    
    'data-fixture' => array(
        'Base/DataFixture' => __DIR__ . '/../src/Base/DataFixture',
    ),

);