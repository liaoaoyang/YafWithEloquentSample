<?php

use Yaf\Application as YApplication;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Database\Capsule\Manager as IlluminateCapsule;


class BaseModel extends IlluminateModel {
    protected $config = null;
    protected $capsule = null;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $dbConfigKey  = DATABASE_CONFIG_KEY;
        $this->config = YApplication::app()->getConfig();

        if (!$this->config->$dbConfigKey) {
            throw new Exception("Must configure database in .ini first");
        }

        $this->config = $this->config->$dbConfigKey->toArray();
        $this->capsule = new IlluminateCapsule();
        $this->capsule->addConnection($this->config);
        $this->capsule->bootEloquent();
    }
}
