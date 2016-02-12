<?php

namespace Templates\php;


class View implements \Countable
{
    /**
     * trait Templates
     */
    use \Components\View;

    /**
     * Метод - готовит к показу шаблон
     * @param $template путь до шаблона
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Метод - показать обработанный шаблон
     * @param $template путь до шаблона
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * Метод - счетчик количества элементов в объекте
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}