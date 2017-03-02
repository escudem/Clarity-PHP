<?php

namespace Clarity\Entity;

use Clarity\Entity\ApiResource;

/**
 * Description of Lab
 *
 * @author Mickael Escudero
 */
class Lab extends ApiResource
{
    
    /**
     *
     * @var string $clarityName
     */
    protected $clarityName;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function xmlToLab()
    {
        $labElement = new \SimpleXMLElement($this->xml);
        $this->clarityUri = $labElement['uri']->__toString();
        $this->clarityName = $labElement->name->__toString();
    }
    
    /**
     * 
     * @param string $clarityName
     */
    public function setClarityName($clarityName)
    {
        $this->clarityName = $clarityName;
    }
    
    /**
     * 
     * @return string
     */
    public function getClarityName()
    {
        return $this->clarityName;
    }
    
}