<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */




namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class IndexController extends AbstractActionController
{    
    public function indexAction()
    {        
        $cmd='curl -v -H "Accept: application/json" -H "Content-type: application/json" -X GET  https://app.alegra.com/api/v1/contacts/ -u "luiscarlgonzalez@hotmail.com:5c60262cb4d98e251346"';
        exec($cmd,$result);

        return new ViewModel(
              array(  'Contactos' => $result                 
                   )                                
                );
    }
    
    public function procesa($action)
    {
       //Recogemos el valor de la ruta
       $id = $this->numero;  
        //$cmd='curl -v -H "Accept: application/json" -H "Content-type: application/json" -X DELETE  https://app.alegra.com/api/v1/contacts/' . $id .  ' -u "luiscarlgonzalez@hotmail.com:5c60262cb4d98e251346"';
       $cmd='curl -v -H "Accept: application/json" -H "Content-type: application/json" -X GET  https://app.alegra.com/api/v1/contacts/ -u "luiscarlgonzalez@hotmail.com:5c60262cb4d98e251346"'; 
       exec($cmd,$result);

    }       
  
public function redirAction(){
         return $this->redirect()->toUrl(
              $this->getRequest()->getBaseUrl().'/application/procesa/index'
         );
}    
}
