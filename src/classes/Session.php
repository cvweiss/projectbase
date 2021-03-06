<?php

namespace cvweiss\projectbase;

class Session
{
    private static $session = null;
    private static $segment = null;

    public static function getSession($segmentName = __NAMESPACE__)
    {
        if (self::$segment === null) {
            $sessionTimeout = (int) Config::getInstance()->get("session_timeout", 3600);

            session_set_save_handler(new RedisSessionHandler(), true);
            $sessionFactory = new \Aura\Session\SessionFactory;

            self::$session = $sessionFactory->newInstance($_COOKIE);
            self::$session->setCookieParams(['lifetime' => $sessionTimeout, 'secure' => true, 'httponly' => true]);
            self::$segment = self::$session->getSegment($segmentName);
        }
        return self::$segment;
    }

    public static function destroy()
    {
        self::$session->destroy();
    }

    public static function commit()
    {
        self::$session->commit();
    }
}
