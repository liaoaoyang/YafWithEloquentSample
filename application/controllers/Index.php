<?php
/**
 * @name IndexController
 * @author iay
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */

use Yaf\Controller_Abstract as YController_Abstract;

class IndexController extends YController_Abstract
{

    /**
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/YafNSSample/index/index/index/name/iay 的时候, 你就会发现不同
     */
    public function indexAction($name = "Stranger")
    {
        //1. fetch query
        $get = $this->getRequest()->getQuery("get", "default value");

        //2. fetch model
        $model = new SampleModel();

        //3. assign
        $this->getView()->assign("content", $model->selectSample());
        $this->getView()->assign("name", $name);

        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return true;
    }

    public function dbtest1Action()
    {
        var_dump(Test\DBSampleModel::find(['id' => 1])->toArray());
        return false;
    }

    public function dbtest2Action()
    {
        $record = Test\DBSampleModel::find(['id' => 1])->first();
        $record->name = '数据：' . rand(1, 10000);
        var_dump($record->save());
        return false;
    }

    public function psr4test1Action()
    {
        models\Test\Psr4test::sayMyName();
        return false;
    }
}
