<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Symmetrics
 * @package   Symmetrics_Buyerprotect
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Torsten Walluhn <tw@symmetrics.de>
 * @copyright 2010 Symmetrics Gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */

/**
 * Price Model for buyerprotect product type
 *
 * @category  Symmetrics
 * @package   Symmetrics_Buyerprotect
 * @author    Symmetrics GmbH <info@symmetrics.de>
 * @author    Torsten Walluhn <tw@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_Buyerprotect_Model_Type_Buyerprotect_Price
    extends Mage_Catalog_Model_Product_Type_Price
{
    /**
     * Get product final price
     *
     * @param double                     $qty     qty to calculate price
     * @param Mage_Catalog_Model_Product $product protuct to get price for
     * 
     * @return  double
     */
    public function  getFinalPrice($qty, $product)
    {
        if (is_null($qty) && !is_null($product->getCalculatedFinalPrice())) {
            return $product->getCalculatedFinalPrice();
        }

        $finalPrice = $product->getPrice();
        //$finalPrice = $this->_applyTierPrice($product, $qty, $finalPrice);
        //$finalPrice = $this->_applySpecialPrice($product, $finalPrice);
        $product->setFinalPrice($finalPrice);

        // Mage::dispatchEvent('catalog_product_get_final_price', array('product'=>$product, 'qty' => $qty));

        // $finalPrice = $product->getData('final_price');
        // $finalPrice = $this->_applyOptionsPrice($product, $qty, $finalPrice);

        return max(0, $finalPrice);
    }
}