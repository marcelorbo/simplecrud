<?php

namespace Core;

class Pay
{
    public function __construct()
    {
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
        
        \PagSeguro\Configuration\Configure::setEnvironment(CONFIG["PAGSEGURO_ENVIRONMENT"]); //production or sandbox
        \PagSeguro\Configuration\Configure::setAccountCredentials(
            CONFIG["PAGSEGURO_EMAIL"],
            CONFIG["PAGSEGURO_TOKEN"]
        ); 

        \PagSeguro\Configuration\Configure::setCharset('UTF-8'); // UTF-8 or ISO-8859-1        
    }  
    
    public function createSession()
    {
        try {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
        
            return $sessionCode->getResult();
        } catch (Exception $e) {
            return $e->getMessage();
        }        
    }
}