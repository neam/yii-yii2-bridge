<?php

namespace neam\yii_yii2_bridge\components;

use Yii;

class Application extends \yii\web\Application
{

    /**
     * Sets some aliases that yii2 widgets expect
     */
    public function registerYii2Aliases()
    {
        Yii::setAlias('@vendor', Yii::getPathOfAlias('vendor'));
        Yii::setAlias('@bower', Yii::getPathOfAlias('vendor') . DIRECTORY_SEPARATOR . 'bower');
    }

    /**
     * Overriden to run registerYii2Aliases()
     */
    public function getView()
    {
        $this->registerYii2Aliases();
        return parent::getView();
    }

    /**
     * Overrides the configuration of core application components so that our View bridge class is used as the default View component
     * @see set()
     */
    public function coreComponents()
    {
        $classMap = parent::coreComponents();
        $classMap['view'] = ['class' => 'neam\yii_yii2_bridge\components\View'];
        //$classMap['assetManager'] = ['class' => 'neam\yii_yii2_bridge\components\AssetManager'];
        return $classMap;
    }

    /**
     * Overridden not to register the Yii 2 errorHandler component as a PHP error handler,
     * since that would leave us with both yii 1 and yii 2 error handlers active. Chaos.
     * @param array $config application config
     */
    protected function registerErrorHandler(&$config)
    {
        if (false && YII_ENABLE_ERROR_HANDLER) {
            if (!isset($config['components']['errorHandler']['class'])) {
                echo "Error: no errorHandler component is configured.\n";
                exit(1);
            }
            $this->set('errorHandler', $config['components']['errorHandler']);
            unset($config['components']['errorHandler']);
            $this->getErrorHandler()->register();
        }
    }

}