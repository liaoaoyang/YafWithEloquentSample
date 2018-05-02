<?php
/**
 * Created by PhpStorm.
 * User: iay
 * Date: 17/7/31
 * Time: 下午3:29
 */

/**
 * CREATE TABLE `db_sample` (
 *     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 *     `name` varchar(100) NOT NULL DEFAULT '',
 *     PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */

namespace Test;

class DBSampleModel extends \BaseModel
{
    protected $table = 'db_sample';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}