<?php

namespace Nakrani\Richsnippets\Model\Config\Source;

class ContactOption implements \Magento\Framework\Option\ArrayInterface
{
	/**
	 * @return array
	 */
	public function toOptionArray()
	{
		return [
	    	['value' => 'tollfree', 'label' => __('TollFree')],
	    	['value' => 'hearingimpairedsupported', 'label' => __('HearingImpairedSupported')]
	  	];
	}
}
