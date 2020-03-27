<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;

$odmLoader = require_once(BASE_PATH . '/../vendor/autoload.php');

AnnotationRegistry::registerLoader([$odmLoader, 'loadClass']);

$config = include APP_PATH . "/config/config.php";

$odmClient = new Client(
    sprintf('mongodb://%s', $config->mongodb->host),
    [],
    [
        'typeMap' => DocumentManager::CLIENT_TYPEMAP,
    ]
);

$odmConfig = new Configuration();
$odmConfig->setProxyDir(BASE_PATH . '/proxies');
$odmConfig->setProxyNamespace('Proxies');
$odmConfig->setHydratorDir(BASE_PATH . '/hydrators');
$odmConfig->setHydratorNamespace('Hydrators');
$odmConfig->setMetadataDriverImpl(AnnotationDriver::create(APP_PATH . '/documents'));
$odmConfig->setDefaultDB('bookedplace_users');

$dm = DocumentManager::create($odmClient, $odmConfig);

spl_autoload_register($odmConfig->getProxyManagerConfiguration()->getProxyAutoloader());

return $dm;
