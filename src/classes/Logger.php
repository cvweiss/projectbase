<?php

namespace Project\Base;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Logger
{
    private static $logger;

    protected static function getLogger()
    {
        if (self::$logger == null)
        {
            self::$logger = new Logger('Project.Base');
            self::$logger->pushHandler(new StreamHandler('/tmp/project.base.log'));
        }
        return self::$logger;
    }

    public static function debug($string)
    {
        return self::getLogger()->debug($string);
    }

    public static function info($string)
    {
        return self::getLogger()->info($string);
    }

    public static function notice($string)
    {
        return self::getLogger()->notice($string);
    }
}