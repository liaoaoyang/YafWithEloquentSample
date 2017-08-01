<?php

use Illuminate\Database\Capsule\Manager as IlluminateCapsule;
use Illuminate\Database\Eloquent\Model as IlluminateModel;


class BaseModel extends IlluminateModel
{
    protected $config = null;
    protected $capsule = null;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $dbConfigKey = DATABASE_CONFIG_KEY;
        $this->config = Yaf_Registry::get('config');

        if (!$this->config->$dbConfigKey) {
            throw new Exception("Must configure database in .ini first");
        }

        $this->config = $this->config->$dbConfigKey->toArray();
        $this->capsule = new IlluminateCapsule();
        $this->capsule->addConnection($this->config);
        $this->capsule->bootEloquent();
    }
}
