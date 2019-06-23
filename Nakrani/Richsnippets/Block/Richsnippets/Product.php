<?php

namespace Nakrani\Richsnippets\Block\Richsnippets;

use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Registry;
use Magento\Catalog\Helper\Image;
use Magento\Catalog\Helper\Output;
use Magento\Review\Model\ReviewFactory;
use Magento\Store\Model\StoreManagerInterface;

class Product extends \Magento\Framework\View\Element\Template 
{

	/**
	 * @var \Magento\Framework\Registry
	 */
	protected $_registry;

	/**
	 * @var \Magento\Catalog\Helper\Image
	 */
	protected $_imageHelper;

	/**
	 * @var \Magento\Catalog\Helper\Output
	 */
	protected $_productDescription;

	/**
	 * @var \Magento\Review\Model\ReviewFactory
	 */
	protected $_reviewFactory;

	/**
	 * @var \Magento\Store\Model\StoreManagerInterface
	 */
	protected $_storeManager;

	/**
	 * @param \Magento\Catalog\Block\Product\Context
	 * @param \Magento\Framework\Registry
	 * @param \Magento\Catalog\Helper\Image
	 * @param \Magento\Catalog\Helper\Output
     * @param \Magento\Review\Model\ReviewFactory
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
     * @return void
	 */
    public function __construct(
    	Context $context, 
    	Registry $registry,
    	Image $imageHelper,
    	Output $productDescription,
    	ReviewFactory $reviewFactory,
    	StoreManagerInterface $storeManager,
    	array $data = []
    ) {
    	$this->_registry = $registry;
    	$this->_imageHelper = $imageHelper;
    	$this->_productDescription = $productDescription;
    	$this->_reviewFactory = $reviewFactory;
    	$this->_storeManager = $storeManager;
		parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    /**
     * @return array
     */
    public function getCurrentProduct()
    {
    	return $this->_registry->registry('current_product');
    }

    /**
     * @return array
     */
    public function getCurrentCategory()
    {
    	return $this->_registry->registry('current_category');
    }

    /**
     * @param object
     * @return string
     */
    public function getImageUrl($product)
    {
		return $this->getBaseUrl() . 'pub/media/catalog/product/' . $product->getImage();
    }

    /**
     * @param object
     * @return string
     */
    public function getProductDescription($product)
    {
    	return $this->_productDescription->productAttribute($product, $product->getDescription(), 'description');
    }

    /**
     * @return int
     */
   	public function getReviewSummary()
	{
		return $this->getCurrentProduct()->getRatingSummary()->getReviewsCount();
	}

	/**
	 * @return int
	 */
	public function getRatingCount()
	{
		$product = $this->getCurrentProduct();
		$this->_reviewFactory->create()->getEntitySummary($product, $this->_storeManager->getStore()->getId());
		$ratingGlobal = $product->getRatingSummary()->getReviewsCount();
		return $ratingGlobal;
	}

	/**
	 * @param string 
	 */
	public function getCurrencyCode()
	{
		return $this->_storeManager->getStore()->getCurrentCurrencyCode();
	}

    /**
     * @param string
     * @return string
     */
    public function changeDateFormat($date)
    {
        $newDateFormat = date_create($date);
        return date_format($newDateFormat, "Y-m-d");
    }
}
