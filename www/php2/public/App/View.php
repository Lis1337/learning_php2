<?php

namespace App;


class View implements \Countable
{
    use SetAndGet;

    protected array $data = [];

    public function assign(string $key, string $data)
    {
        $this->data[$key] = $data;
    }

    public function display(string $template)
    {
        include $template;
    }

    public function render(string $template)
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    public function count(): int
    {
        return count($this->data);
    }
}
