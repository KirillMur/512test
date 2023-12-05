<?php
declare(strict_types=1);

namespace helpers;

class RenderHelper
{
    public static function render($viewName, $vars = []): void
    {
        extract($vars, EXTR_SKIP);

        include($viewName);
    }
}

