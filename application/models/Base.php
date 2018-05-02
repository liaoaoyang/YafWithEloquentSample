<?php

use Illuminate\Database\Capsule\Manager as IlluminateCapsule;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Yaf\Registry as YRegistry;


class BaseModel extends IlluminateModel
{
    protected        $config   = null;
    protected        $capsule  = null;
    protected static $capsules = [];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $dbConfigKey = DATABASE_CONFIG_KEY;
        $this->config = YRegistry::get('config');

        if (!$this->config->$dbConfigKey) {
            throw new Exception("Must configure database in .ini first");
        }

        $this->config = $this->config->$dbConfigKey->toArray();
        $entry = self::getCapsuleEntry($this->config);

        if (isset(self::$capsules[$entry])) {
            $capsule = self::$capsules[$entry];
        } else {
            $capsule = new IlluminateCapsule();
            $capsule->addConnection($this->config);
            $capsule->bootEloquent();
            self::$capsules[$entry] = $capsule;
        }

        $this->capsule = $capsule;
    }

    protected static function getCapsuleEntry($config)
    {
        if (!is_array($config)) {
            return '_';
        }

        $configValues = array_values($config);
        sort($configValues);

        return md5(join('_', $configValues));
    }
}
