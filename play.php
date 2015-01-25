<?php

use Symfony\Component\HttpFoundation\Request;

B
A
D
C
C
B
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';


B
B
$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

// all the setup is done!!! Hooray!

use Yoda\EventBundle\Entity\Event;

$event = new Event();
$event->setName('Darth\'s surprise birthday party!');
$event->setLocation('Deathstar');
$event->setTime(new \DateTime('tomorrow noon'));
//$event->setDetails('Ha! Darth HATES surprises!!!!');

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();

