<?php
/**
 * @name SamplePlugin
 * @desc Yaf定义了如下的6个Hook,插件之间的执行顺序是先进先Call
 * @see http://www.php.net/manual/en/class.yaf-plugin-abstract.php
 * @author iay
 */

use Yaf\Plugin_Abstract as YPlugin_Abstract;
use Yaf\Request_Abstract as YRequest_Abstract;
use Yaf\Response_Abstract as YResponse_Abstract;

class SamplePlugin extends YPlugin_Abstract
{

    public function routerStartup(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }

    public function routerShutdown(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }

    public function dispatchLoopStartup(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }

    public function preDispatch(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }

    public function postDispatch(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }

    public function dispatchLoopShutdown(YRequest_Abstract $request, YResponse_Abstract $response)
    {
    }
}
