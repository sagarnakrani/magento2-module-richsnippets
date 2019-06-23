<?php

namespace Nakrani\Richsnippets\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{

	/**
	 * @var Magento\Framework\App\Config\ScopeConfigInterface
	 */
	protected $_scopeConfig;

	/**
	 * @param Magento\Framework\App\Config\ScopeConfigInterface
	 * @return void
	 */
	public function __construct(
		ScopeConfigInterface $scopeConfig
	) {
		$this->_scopeConfig = $scopeConfig;
	}

	/**
	 * @var string
	 * @return string
	 */
	public function getConfig($config_path)
	{
	    return $this->_scopeConfig->getValue(
	        $config_path,
	        \Magento\Store\Model\ScopeInterface::SCOPE_STORE
	        );
	}
}
