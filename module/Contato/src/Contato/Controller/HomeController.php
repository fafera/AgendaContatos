<?php

namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
// import Zend\Db
use Zend\Db\Adapter\Adapter as AdaptadorAlias,
Zend\Db\Sql\Sql,
Zend\Db\ResultSet\ResultSet;
// imort Model\ContatoTable com alias
use Contato\Model\ContatoTable as ModelContato;
class HomeController extends AbstractActionController
{
    /**
    * action index
    * @return \Zend\View\Model\ViewModel
    */
    // GET /contatos
    public function indexAction()
    {
        // localizar adapter do banco
        $adapter = $this->getServiceLocator()->get('AdapterDb');

        // model ContatoTable instanciado
        $modelContato = new ModelContato($adapter); // alias para ContatoTable

        // enviar para view o array com key contatos e value com todos os contatos
        return new ViewModel(array('contatos' => $modelContato->fetchAll()));
    }
    public function sobreAction()
    {
        return new ViewModel();
    }

}

