<?php

namespace Nakrani\Richsnippets\Model\Config\Source;

class ContactType implements \Magento\Framework\Option\ArrayInterface
{
	/**
	 * @return array
	 */
	public function toOptionArray()
	{
		return [
	    	['value' => 'customer service', 'label' => __('Customer Service')],
	    	['value' => 'technical support', 'label' => __('Technical Support')]
	  	];
	}
}
