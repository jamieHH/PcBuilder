<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('default', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ProfilerConnectionWrapper',
  'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=PcBuilder',
  'user' => 'root',
  'password' => '',
  'options' =>
  array (
    'ATTR_PERSISTENT' => false,
  ),
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => false,
    'ATTR_TIMEOUT' => 30,
  ),
  'settings' =>
  array (
    'charset' => 'utf8mb4',
    'queries' =>
    array (
      0 => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('default');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setAdapterClass('mysql', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ProfilerConnectionWrapper',
  'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=PcBuilder',
  'user' => 'root',
  'password' => '',
  'options' =>
  array (
    'ATTR_PERSISTENT' => false,
  ),
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => false,
    'ATTR_TIMEOUT' => 30,
  ),
  'settings' =>
  array (
    'charset' => 'utf8mb4',
    'queries' =>
    array (
      0 => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('mysql');
$serviceContainer->setConnectionManager('mysql', $manager);
$serviceContainer->setDefaultDatasource('mysql');
$serviceContainer->setProfilerClass('Propel\Runtime\Util\Profiler');
$serviceContainer->setProfilerConfiguration(array (
  'slowTreshold' => 0.1,
  'details' =>
  array (
    'time' =>
    array (
      'precision' => 3,
      'pad' => 8,
      'name' => 'Time',
    ),
    'memDelta' =>
    array (
      'precision' => 3,
      'pad' => 8,
      'name' => 'Memory Delta',
    ),
    'memPeak' =>
    array (
      'precision' => 3,
      'pad' => 8,
      'name' => 'Memory Peak',
    ),
    'mem' =>
    array (
      'name' => 'Memory',
      'precision' => 3,
      'pad' => 8,
    ),
  ),
  'innerGlue' => ':',
  'outerGlue' => '|',
));