<?php

$tmpIndices = yaml_parse_file('sureselectXT_8bp_SI.yml');
$indices = array();
foreach ($tmpIndices as $name => $seq) {
    $newName = $name . ' (' . $seq . ')';
    $indices[$newName] = $seq;
}
$groupName = 'SureSelectXT_8bp_SI';

$i = 0;
$configElement = simplexml_load_file(__DIR__ . '/../XmlTemplate/indices.xsd');
$typesElement = $configElement->ReagentTypes;

foreach ($indices as $indexName => $indexSeq) {
    $typeElement = $typesElement->addChild('reagent-type', null, 'http://genologics.com/ri/reagenttype');
    $typeElement->addAttribute('name', $indexName);
    $specialElement = $typeElement->addChild('special-type', null, '');
    $specialElement->addAttribute('name', 'Index');
    $attributeElement = $specialElement->addChild('attribute');
    $attributeElement->addAttribute('value', $indexSeq);
    $attributeElement->addAttribute('name', 'Sequence');
    $categoryElement = $typeElement->addChild('reagent-category', $groupName, '');
}

$doc = new \DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->loadXML($configElement->asXML());
echo $doc->saveXML();
