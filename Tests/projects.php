<?php

namespace Clarity\Tests;

require_once(__DIR__ . '/../autoload.php'); 

//use Clarity\Entity\Project;
//use Clarity\EntityRepository\ResearcherClarityRepository;
use Clarity\Connector\ClarityApiConnector;
use Clarity\EntityRepository\ProjectClarityRepository;
//use Clarity\Entity\Project;

//$project = new Project();
//var_dump($project);

$connector = new ClarityApiConnector('test');
$projectRepo = new ProjectClarityRepository($connector);
//$researcherRepo = new ResearcherClarityRepository($connector);

$myproject = $projectRepo->find('BIO901');
$myproject->projectToXml();
var_dump($myproject);

/*
$myresearcher = $researcherRepo->find('654');
$newproject = new Project();
$newproject->setClarityName('Micka API project');
$newproject->setOpenDate('2017-03-14');
$newproject->setResearcherUri($myresearcher->getClarityUri());

$myproject = $projectRepo->find('BIO901');
$udfs = array(
    'Funding source' => array('name' => 'Funding source', 'value' => 'Internal'),
    'Project type' => array('name' => 'Project type', 'value' => 'Whole Exome'),
    'Sample quota' => array('name' => 'Sample quota', 'value' => '50'),
    'Sequencer type' => array('name' => 'Sequencer type', 'value' => 'HiSeq'),
);
$myproject->setClarityUDFs($udfs);
$myproject->projectToXml();
var_dump($myproject);
//var_dump($newproject);
$updatedproject = $projectRepo->save($myproject);
var_dump($updatedproject);
*/
