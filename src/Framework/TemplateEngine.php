<?php


declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    public function __construct(private string $path)
    {
    }

    public function render(string $template, array $data = null)
    {
        extract($data);
        include $this->path . "/" . $template;
    }
}
