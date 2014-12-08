<?php

$extensionroot = dirname(__FILE__);

$yii2path = "$approot/vendor/yiisoft/yii2";
require($yii2path . '/BaseYii.php'); // Yii 2.x

$yii1path = "$approot/vendor/yiisoft/yii/framework";
require($yii1path . '/YiiBase.php'); // Yii 1.x

// include the customized Yii class described below
require("$extensionroot/yii-class-bridges/Yii-1.1.15.php");
require("$extensionroot/components/View.php");
require("$extensionroot/components/Application.php");

// configuration for Yii 2 application
$yii2Config = require("$extensionroot/dummy-config/web.php");

new neam\yii_yii2_bridge\components\Application($yii2Config); // Do NOT call run()
