<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Sample\Controller\Sample' => 'Sample\Controller\SampleController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'sample' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/sample[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Sample\Controller\Sample',
                        'action'     => 'index',
                    ),
                ),
            ),
            
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'sample' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        'template_map' => array(
            'sample/sample/index' => __DIR__ . '/../view/sample/sample/index.phtml',
            'sample/layout/basicLayout' => __DIR__ . '/../view/layout/basicLayout.phtml',
        ),
    ),

);
