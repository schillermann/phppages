<?php
namespace PhpPages\Page;

use PhpPages\OutputInterface;
use PhpPages\PageInterface;

class PageWithType implements PageInterface
{
    private PageInterface $origin;
    private string $contentType;

    function __construct(PageInterface $origin, string $contentType)
    {
        $this->origin = $origin;
        $this->contentType = $contentType;
    }

    function withMetadata(string $name, string $value): PageInterface
    {
        return $this->origin->withMetadata($name, $value);
    }

    function viaOutput(OutputInterface $output): OutputInterface
    {
        return $this->origin->viaOutput(
            $output->withMetadata('Content-Type', $this->contentType)
        );
    }
}