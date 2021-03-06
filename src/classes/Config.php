<?php

namespace cvweiss\projectbase;

class Config
{
    private static $instance = null;

    public static function getInstance()
    {
        self::$instance = self::$instance ?? new Config();
        return self::$instance;
    }

    private $settings = ['debug' => true];

    public function get(string $key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    public function getAll():array
    {
        return $this->settings;
    }

    public function set(string $key, $value)
    {
        $this->settings[$key] = $value;
    }

    public function setAll(array $keys)
    {
        foreach ($keys as $key=>$value) {
            $this->set($key, $value);
        }
    }
}
