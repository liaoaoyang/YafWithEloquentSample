<?php

use Illuminate\Database\Capsule\Manager as IlluminateCapsule;
use Illuminate\Database\Eloquent\Model as IlluminateModel;


class BaseModel extends IlluminateModel
{
    protected        $config  = null;
    protected static $capsule = null;
    protected static $fakeApp = [];

    protected $connection = 'default';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $dbConfigKey = DATABASE_CONFIG_KEY;
        $this->config = YRegistry::get('config');

        if (!$this->config->$dbConfigKey) {
            throw new Exception("Must configure database in .ini first");
        }

        $this->config = $this->config->$dbConfigKey->toArray();

        if (!self::$capsule) {
            self::$capsule = new IlluminateCapsule();
            self::$capsule->bootEloquent();
            self::$fakeApp = [
                'db' => self::$capsule->getDatabaseManager(),
            ];
            Illuminate\Support\Facades\DB::setFacadeApplication(self::$fakeApp);
        }

        self::$capsule->addConnection($this->config, $this->connection);
    }
}
