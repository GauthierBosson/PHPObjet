<?php

namespace Core\Model;

trait Helper {

    public function generateUrl($controller, $action) {
        return PATH_PUBLIC . '/' . $controller . '/' . $action;
    }
}