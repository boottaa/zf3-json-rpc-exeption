<?php


namespace Json;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ConfigInterface;
use Zend\ServiceManager\ServiceManager;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
	/**
	 * Returns configuration to merge with application configuration
	 *
	 * @return array|\Traversable
	 */
	public function getConfig()
	{
		return include __DIR__ . '../../config/module.config.php';
	}

	/**
	 * Expected to return \Zend\ServiceManager\Config object or array to
	 * seed such an object.
	 *
	 * @return array|\Zend\ServiceManager\Config
	 */
	public function getServiceConfig()
	{

		return 0;
	}

	/**
	 * Expected to return \Zend\ServiceManager\Config object or array to seed
	 * such an object.
	 *
	 * @return array|\Zend\ServiceManager\Config
	 */
	public function getControllerConfig()
	{
		return 0;
	}
}