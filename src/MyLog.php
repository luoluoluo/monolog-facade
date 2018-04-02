<?php
namespace MonologFacade;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\LineFormatter;

class MyLog
{
    public static $logger = null;

    /**
     * 调用示例：MyLog::info('apis_cloud_subjects', $msg);
     */
    public static function __callStatic($func, $args)
    {
        if (!self::$logger) {
            self::$logger = new Logger('');
        }
        @list($name, $msg, $day) = $args;
        if (is_array($msg)) {
            $msg = json_encode($msg, JSON_PRETTY_PRINT);
        }
        $path   = storage_path() . '/logs/' . $name . '.log';
       
        $handler = new RotatingFileHandler($path, $day ? $day : 30);
        $handler->setFormatter(new LineFormatter(null, null, true, true));
        
        self::$logger->pushHandler($handler);
        self::$logger->$func($msg);
    }
}
