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

    protected static function getLayoutContent($page, $data)
    {

        $path = ['header' => Application::$ROOT_DIR . '/views/layouts/headers' . $page . '.php', 'main' => Application::$ROOT_DIR . '/views/layouts/mains' . $page . '.php', 'footer' => Application::$ROOT_DIR . '/views/layouts/footers' . $page . '.php'];

        foreach ($data as $key => $value) {

            $$key = $value;
        }

        ob_start();

        if (file_exists($path['header'])) {

            include_once $path['header'];
        }

        if (file_exists($path['main'])) {

            include_once $path['main'];
        }

        if (file_exists($path['footer'])) {

            include_once $path['footer'];
        }

        return ob_get_clean();
    }

    // public static function getViewSections($page)
    // {

    //     ob_start();


    //     return ob_get_clean();
    // }

    // public static function getHeader($page)
    // {


    //     return false;
    // }

    // public static function getMain($page)
    // {


    //     return false;
    // }

    // public static function getFooter($page)
    // {



    //     return false;
    // }

    public static function renderView($page, $data = [])
    {

        $html = self::getHTML();
        // $view_content = self::getViewSections($page, $data);

        // $header = self::getHeader($page);
        // $main = self::getMain($page);
        // $footer = self::getFooter($page);

        // $view_content = str_replace('a"[page_header]"a', $header, $view_content);
        // $view_content = str_replace('a"[main_section]"a', $main, $view_content);
        // $view_content = str_replace('a"[page_footer]"a', $footer, $view_content);

        $view_content = self::getLayoutContent($page, $data);

        return str_replace('a"[content_of_the_page]"a', $view_content, $html);
    }
}
