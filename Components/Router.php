<?php

namespace Components;


class Router
{

    public function process(array $url)
    {
        $name = '\Controllers\\' . ($url['ctrl'] ?: 'News');

        switch ($name) {
            case '\Controllers\News':
                $action = $url['action'] ?: 'Index';
                break;
            case '\Controllers\AdminPanel':
                $action = $url['action'] ?: 'NewsAll';
                break;
        }

        $mass = [
            'controller' => $name,
            'action' => $action,
        ];

        return $mass;
    }
}