<?php

namespace Nakrani\Richsnippets\Model\Config\Source;

class AreaServed implements \Magento\Framework\Option\ArrayInterface
{
	/**
	 * @return array
	 */
	public function toOptionArray()
	{
		return [
	    	['value' => 'at', 'label' => __('AT')],
	    	['value' => 'be', 'label' => __('BE')],
	    	['value' => 'br', 'label' => __('BR')],
	    	['value' => 'ca', 'label' => __('CA')],
	    	['value' => 'in', 'label' => __('IN')],
	    	['value' => 'mx', 'label' => __('MX')],
	    	['value' => 'us', 'label' => __('US')]
	  	];
	}
}