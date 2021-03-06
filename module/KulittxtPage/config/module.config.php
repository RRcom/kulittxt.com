<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'KulittxtPage\Controller\Home',
                        'action'     => 'index',
                    ),
                ),
            ),
            'kulittxt_page' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/[:username[/:controller[/:action[/:param]]]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'username'   => '[a-zA-Z][a-zA-Z0-9_\-\.]*',
                        'param'      => '[a-zA-Z0-9]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'KulittxtPage\Controller',
                        'controller'    => 'Home',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'KulittxtPage\Controller\Home' => 'KulittxtPage\Controller\HomeController',
            'KulittxtPage\Controller\Album' => 'KulittxtPage\Controller\AlbumController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'            => __DIR__ . '/../view/layout/default.phtml',
            'kulittxt-page/home/index' => __DIR__ . '/../view/page/index.phtml',
            'kulittxt-page/album/index' => __DIR__ . '/../view/page/album.phtml',
            'error/404'                => __DIR__ . '/../view/error/404.phtml',
            'error/index'              => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
