<?php

namespace Clarity\Tests;

require_once(__DIR__ . '/../autoload.php');

use Clarity\Connector\ClarityApiConnector;
use Clarity\EntityRepository\ContainerClarityRepository;
//use Clarity\Entity\Tube;


$connector = new ClarityApiConnector('test');
$containerRepo = new ContainerClarityRepository($connector);

$tube = $containerRepo->find('27-1401');
$tube->setClarityName('blablabla');
$tube->containerToXml();
var_dump($tube);
