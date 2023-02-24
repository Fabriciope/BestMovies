<?php
namespace App\Utils\controller;


class Action{


    /**
     * Metodo responsável por retornar o conteúdo de uma página ou layout
     *
     * @param string $page
     * @param string $layout
     * @return string
     */
    public static function getContentView(string $page,string $layout){
        
        $file= empty($page) ? __DIR__.'./../../Views/' . $layout .'.phtml' : __DIR__.'./../../Views/' . $page .'.phtml';
        if(file_exists($file)){

            return file_get_contents($file);
            
        }else{
            // Retornar a home
            echo 'mds mn to';
            echo $file;
        }
    }

    /**
     * Metodo responsável por retornar o conteúdo já renderizado
     *
     * @param string|null $page
     * @param array|null $vars
     * @param string $layout
     * @return string
     */
    public static function render(string|null $page,array|null $vars= [],string $layout= ''){
        $contentPage= self::getContentview($page, $layout);

        $keys= array_keys($vars);
        $keys= array_map(function($key){
            return '{{' . $key . '}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contentPage);
    }

    /**
     * Metodo responsável por retornar o conteúdo de algum layout 
     *
     * @param string $title
     * @param mixed $content
     * @param string $layout
     * @return string
     */
    public static function getLayout(string $title, $content,string $layout){
        return self::render('', [
            'title' => $title,
            'content' => $content
        ], $layout);
    }
}