<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-widgets
 * @version 1.0.0
 */

namespace bamboo\ueditor;

use Yii;
use yii\web\AssetBundle;
/**
 * Asset bundle for Select2 Widget
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class UeditorAsset extends AssetBundle
{

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/editor');
        $this->setupAssets('js', ['ueditor.config','ueditor.all.min']);
		$this->setupAssets('css', ['themes/default/css/ueditor']);
		
        parent::init();
    }
    
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }
    
    protected function setupAssets($type, $files = [])
    {
        $srcFiles = [];
        $minFiles = [];
        foreach ($files as $file) {
            $srcFiles[] = "{$file}.{$type}";
			$minFiles[] = "{$file}.{$type}";
        }
        if (empty($this->$type)) {
            $this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        }
        
    }
}
