<?php

namespace Nakrani\Richsnippets\Block\Richsnippets;

use Magento\Catalog\Block\Product\Context;
use Magento\Store\Model\StoreManagerInterface;

class Organization extends \Magento\Framework\View\Element\Template 
{

  /**
   * @var \Magento\Store\Model\StoreManagerInterface
   */
  protected $_storeManager;

  /**
   * @param \Magento\Catalog\Block\Product\Context
   * @param \Magento\Store\Model\StoreManagerInterface
   * @param array
   * @return void
   */
  public function __construct(
    Context $context, 
    StoreManagerInterface $storeManager,
    array $data = []
  ) {
      $this->_storeManager = $storeManager;
      parent::__construct($context, $data);
  }

  protected function _prepareLayout()
  {
      return parent::_prepareLayout();
  }

  /**
   * @return string
   */
  public function getStoreUrl()
  {
    return $this->_storeManager->getStore()->getBaseUrl();
  }
   
}
