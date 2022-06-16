<?php
namespace PhpPages;

class TextPage implements PageInterface
{
    private string $body;

    function __construct(string $text)
    {
        $this->body = $text;    
    }

    function page(string $name, string $value): PageInterface
    {
        return $this;
    }

    function output(OutputInterface $output): OutputInterface
    {
        return $output
            ->output('Content-Type', 'text/plain')
            ->output('Content-Length', strlen($this->body))
            ->output('PhpPages-Body', $this->body);
    }
}