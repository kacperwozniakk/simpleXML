<?php

$fn = __DIR__ . '/feed_sample.xml';

$tag = 'offer';
$reader = new \XMLReader();

if (!$reader->open($fn)) {
    throw new \RuntimeException("Could not open {$fn} with XMLReader");
}

while ($reader->read()) {


    while ($tag === $reader->name) {

        $elem = new \SimpleXMLElement($reader->readOuterXML());
        $opening_times = (string) $elem->opening_times;
        $opening_times_array = explode('"', $opening_times);
        print_r($opening_times_array);
        $add = $elem->addChild('is_active', 'true');

        $reader->next($tag);
        $elem->asXML('outputSimple.xml');
    }

}