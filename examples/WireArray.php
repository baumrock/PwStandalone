<?php namespace ProcessWire;
$john = new WireData();
$john->name = 'John';
$john->address = 'Example Road 5';

$maria = new WireData();
$maria->name = 'Maria';
$maria->address = 'Example Road 10';

$persons = new WireArray();
$persons->add($john);
$persons->add($maria);

dump($persons);
dump($persons->each('name'));
dump($persons->get('Maria')->address);
