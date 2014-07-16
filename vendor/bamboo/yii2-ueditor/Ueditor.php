<?php

namespace bamboo\ueditor;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class Ueditor extends InputWidget
{
    //编辑器配置选项
    public $editorOptions = array(
        'wordCount' => false,
    );

    /**
     * 设置加载JS的服务器, 默认本地加载,可以填写'baidu'其它字符来使用服务器加载
     * @var string
     */
    public $file_server      = 'local';
    public $UEDITOR_HOME_URL = '/';
    private $_base_url;
    private $_js;
    public $_editor_id;
    private $asset;

    public function init()
    {
        parent::init();
//        $this->_editor_id = "article-content";
        $this->asset = UeditorAsset::register($this->getView());
        $this->renderInput();
        $this->genarateJs();
       
        $this->view->registerJs($this->_js);
        
    }

    public function run()
    {
        if (false !== $this->_js)
        {
//            Yii::$app->clientScript->registerScript('ueditor' . $this->getId(), $this->_js, CClientScript::POS_END);
        }
    }
    
    protected function renderInput()
    {
        echo Html::activeTextarea($this->model, $this->attribute, $this->options);
    }

    /**
     * 生成必须的JS代码
     */
    private function genarateJs()
    {
        if (!isset($this->editorOptions) || empty($this->editorOptions))
            return false;

        $this->editorOptions                     = array_merge($this->_getDefaultSetting(), $this->editorOptions);
        $this->editorOptions['UEDITOR_HOME_URL'] = $this->asset->baseUrl.$this->UEDITOR_HOME_URL;
        $options                           = json_encode($this->editorOptions);

        $this->_js                         = <<<EOP
UE.getEditor('{$this->_editor_id}',{$options});
EOP;
    }

    /**
     * 生成Toolbar
     * @param $toolbar array()
     */
    private function genarateToolBar($toolbarOptions)
    {
        $toolbar = '';
        foreach ($toolbarOptions as $value)
        {
            if (is_array($value))
            {
                $value = $this->genarateToolBar($value);
                $toolbar .=",{$value}";
            }
            else
            {
                $toolbar .=",'{$value}'";
            }
        }

        $toolbar = "[" . trim($toolbar, ',') . "]";
        return $toolbar;
    }

    /**
     * 获取编辑器的默认配置项目
     * @return array
     */
    private function _getDefaultSetting()
    {
        $_imgUrl  = "http://localhost/makeup";
        return array(
            'initialFrameWidth'       => '100%', //默认宽度
            'wordCount'               => true, //统计字数
            'focus'                   => false, //自动焦点
            'autoFloatEnabled'        => true, //工具栏浮动
            'autoClearinitialContent' => false, //自动焦点清空内容
            'autoHeightEnabled'       => true, //自动长高
            'elementPathEnabled'      => true, //底部路径提示
            'imagePopup'              => true, //图片浮层
            'sourceEditor'            => false, // 源码高亮
            /* 图片上传处理 */
            'imageUrl'                => Yii::$app->urlManager->createUrl('/site/uploadimg'),
            'imagePath'               => $_imgUrl . '/',
            /* 附件图片列表 */
            'imageManagerUrl'         => Yii::$app->urlManager->createUrl('/site/backimg'),
            'imageManagerPath'        => $_imgUrl . '/',
            /* 涂鸦 */
            'scrawlUrl'               => Yii::$app->urlManager->createUrl('/site/scrawup'),
            'scrawlPath'              => $_imgUrl . '/',
            /* 附件上传 */
            'fileUrl'                 => Yii::$app->urlManager->createUrl("/site/fileup"),
            'filePath'                => $_imgUrl . "/",
            /* 视频搜索 */
            'getMovieUrl'             => Yii::$app->urlManager->createUrl("/site/getmovie"),
            /* Word 转存 */
            'wordImageUrl'            => Yii::$app->urlManager->createUrl('/site/uploadimg'),
            'wordImagePath'           => $_imgUrl . '/',
            /* 远程抓取 */
            'catcherUrl'              => Yii::$app->urlManager->createUrl("/site/RemoteImage"), //处理远程图片抓取的地址
            'catcherPath'             => $_imgUrl . "/",
            'autoHeightEnabled'                   =>false,
        );
    }

}
