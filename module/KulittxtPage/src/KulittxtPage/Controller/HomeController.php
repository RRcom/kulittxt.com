<?php
namespace KulittxtPage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use KulittxtPage\Library\TextHelper;
class HomeController extends AbstractActionController
{
    public function indexAction()
    {
        $textHelper = new TextHelper();
        $viewModel = new ViewModel();
        $viewModel->setVariable('textHelper', $textHelper);
        return $viewModel;
    }
}