<?php

namespace Sample\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class SampleController extends AbstractActionController
{
    public function indexAction() {
        
        $data['title'] = 'Index View';
        $data['greetings'] = \Sample\Model\ModelTest::sayHello(TRUE);
        
        return new ViewModel($data);
    }
    
    public function layoutAction() {
        
        $data['title'] = 'Index View';
        $data['greetings'] = \Sample\Model\ModelTest::sayHello(TRUE);
        
		/*
        $layout = new ViewModel();
        $layout     ->setTerminal(TRUE)
                    ->setTemplate('sample/layout/basicLayout')
                    ->setVariables($data);
        
        $content = new ViewModel();
        $content    ->setTemplate('sample/sample/index')
                    ->setVariables($data);
        
        $layout     ->addChild($content);
        return $layout;
		*/
		
		// Get the "layout" view model and set an alternate template
        $layout = $this->layout();
        $layout->setTemplate('sample/layout/basicLayout');
		
		$view = new ViewModel();
		$view	->setTemplate('sample/sample/index')
				->setVariables($data);

		return $view;
    }
    
    public function jsonAction() {
        $jsonModel = new JsonModel();
        $jsonModel->setVariables(array(
          'dat1' => 'sample data',
          'jsonVar1' => 'jsonVal2',
          'jsonArray' => array(1,2,3,4,5,6)
        ));
        return $jsonModel; 
    }
    
    public function testAction() {
        
        $htmlViewPart = new ViewModel();
        $htmlViewPart->setTerminal(true)
            ->setTemplate('layout/blank')
            ->setVariables(array(
           'data1' => 'World'
        ));
        
        $content = new ViewModel();
        $content->setTemplate('error/index');
        
        $content2 = new ViewModel();
        $content2->setTemplate('error/404');
        
        $content3 = new ViewModel();
        $content3->setTemplate('error/404');
        
        
        $htmlViewPart
                ->addChild($content, 'content', TRUE)
                ->addChild($content2, 'content', TRUE)
                ->addChild($content3, 'others');
        
        return $htmlViewPart;
    }
}
