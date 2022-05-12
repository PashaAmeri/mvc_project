<?php

namespace App_hospital\views;

use App_hospital\core\Application;

class ViewRender
{

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

        $layout_content = self::getLayoutContent();
        $view_content = self::renderViewContent($page);
    }
}
