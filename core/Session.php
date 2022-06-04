<?php

namespace App\core;

class Session
{
    public static function exists($name) : bool
    {
        return isset($_SESSION[$name]);
    }

    public static function put($name, $value) : void
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name) : string
    {
        return $_SESSION[$name];
    }

    public static function delete($name)
    {
        unset($_SESSION[$name]);
    }

    public static function flash ($name, $string = 'null') {

        if(isset($_SESSION[$name]))
        {
            echo self::get($name);
            self::delete($name);
        }else
        {
            self::put($name, $string);
        }

        // در صورتی که سشن به اسم مورد نظر وجود داشت ، مقدار سشن رو برمیگردونه و خود سسشن رو پاک میکنه
        // در صورتی که سشن وجود نداشت یک سشن به اسم $name و مقدار $string میسازه
    }
}