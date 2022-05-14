<?php

namespace App_hospital\core\view;

use App_hospital\core\Application;

class ViewRender
{

    protected static function getHTML()
    {

        ob_start();

        include_once Application::$ROOT_DIR . '/views/layouts/basic_html/index.php';

        return ob_get_clean();
    }

    protected static function getLayoutContent()
    {

        ob_start();

        include_once Application::$ROOT_DIR . '/views/layouts/basic_html/index.php';

        return ob_get_clean();
    }

    public static function renderViewContent($page)
    {

        ob_start();

        include_once Application::$ROOT_DIR . '/views/content' . $page . '/index.php';

        return ob_get_clean();
    }

    public static function renderView($page)
    {

        $html = self::getHTML();
        $view_content = self::renderViewContent($page);

        return str_replace('a"[content_of_the_page]"a', $view_content, $html);
    }
}
