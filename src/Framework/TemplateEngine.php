<?php


declare(strict_types=1);

namespace Framework;

class TemplateEngine
{

    private array $globalTemplateData = [];
    public function __construct(private string $path)
    {
    }

    public function render(string $template, array $data = null)
    {
        extract($data, EXTR_SKIP);
        extract($this->globalTemplateData, EXTR_SKIP);
        ob_start();
        include $this->resolve($template);
        $output = ob_get_contents();

        ob_end_clean();
        return $output;
    }
    public function resolve(string $path)
    {
        return "{$this->path}/{$path}";
    }

    public function addGlobalData(string $key, mixed $value)
    {
        $this->globalTemplateData[$key] = $value;
    }
}
