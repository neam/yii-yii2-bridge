Yii <- Yii 2 Bridge
================

Use Yii 2 widgets in legacy Yii 1 applications.

## Requirements

* Yii 1.1.15 application

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist "neam/yii-yii2-bridge" "*"
```

or add

```json
"neam/yii-yii2-bridge" : "*"
```

to the require section of your application's `composer.json` file.

Make sure you have the following in your yii 1 app's composer.json:

```json
"extra": {
    "asset-installer-paths": {
        "npm-asset-library": "vendor/npm",
        "bower-asset-library": "vendor/bower"
    }
},
```

In your index.php, instead of including yii.php, do the following (which will include yii 1 and yii 2):

    $approot = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
    require("$approot/vendor/neam/yii-yii2-bridge/include.php");

Make sure that your layout or view file includes:

    // Necessary in order to publish the yii2 assets required for this view
    Yii::$app->getView()->registerYii2Assets();

## Usage

Install yii 2 widgets via composer and use them as usual.

## What this extension does

* Loads but does not run a Yii 2 app, so that it is available under Yii::$app.
* Overrides the core yii 2 view component to register asset files using Yii 1 client script.
* Disables the yii 2 error handler so that both error handlers are not activated at the same time.

## What this extension does not do (yet... pull requests are welcome)

* Does not handle InputWidgets, only Widgets at the moment.

