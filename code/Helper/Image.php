<?php

class AspenDigital_TrafficMan_Helper_Image extends Mage_Catalog_Helper_Image
{
    
    /**
     * Return Image URL
     *
     * @return string
     */
    public function __toString()
    {
        try {
            $model = $this->_getModel();

            if ($this->getImageFile()) {
                $model->setBaseFile($this->getImageFile());
            } else {
                $model->setBaseFile($this->getProduct()->getData($model->getDestinationSubdir()));
            }

            if ($model->isCached()) {
                return $model->getUrl();
            } else {
                if ($this->_scheduleRotate) {
                    $model->rotate($this->getAngle());
                }

                if ($this->_scheduleResize) {
                    $model->resize();
                }

                if ($this->getWatermark()) {
                    $model->setWatermark($this->getWatermark());
                }

                // -------------------
                // Aspen Digital - pete@aspendigital.com (10/26/12)
                // -------------------
                // Helpful when Base Media URL is set to another domain
                // Returns the baseurl+media to render image from it's original location before it's synced remotely

                $url = str_replace(Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA), Mage::getBaseUrl().'media/', $model->saveFile()->getUrl());

                // was $url = $model->saveFile()->getUrl();
                // -------------------
            }
        } catch (Exception $e) {
            $url = Mage::getDesign()->getSkinUrl($this->getPlaceholder());
        }
        return $url;
    }

}
