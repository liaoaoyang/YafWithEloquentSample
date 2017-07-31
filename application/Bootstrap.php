<?php
/**
 * @name Bootstrap
 * @author iay
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */

use Yaf\Bootstrap_Abstract as YBootstrap_Abstract;
use Yaf\Application as YApplication;
use Yaf\Registry as YRegistry;
use Yaf\Dispatcher as YDispatcher;
use Yaf\Loader as YLoader;

class Bootstrap extends YBootstrap_Abstract {

    public function _initLoader() {
        YLoader::import(APPLICATION_PATH . '/vendor/autoload.php');
    }

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = YApplication::app()->getConfig();
        YRegistry::set('config', $arrConfig);
	}

	public function _initPlugin(YDispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(YDispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
	}
	
	public function _initView(YDispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
	}
}
