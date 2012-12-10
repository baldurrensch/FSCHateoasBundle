<?php

namespace FSC\HateoasBundle\Factory;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use FSC\HateoasBundle\Model\Link;

abstract class AbstractLinkFactory
{
    protected $urlGenerator;
    protected $templatedUrlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator, UrlGeneratorInterface $templatedUrlGenerator = null)
    {
        $this->urlGenerator = $urlGenerator;
        $this->templatedUrlGenerator = ($templatedUrlGenerator) ? $templatedUrlGenerator : $urlGenerator;
    }

    public static function createLink($rel, $href)
    {
        $link = new Link();
        $link->setRel($rel);
        $link->setHref($href);

        return $link;
    }

    public function generateUrl($name, $parameters = array(), $templated = false)
    {
        ksort($parameters); // Have consistent url query strings, for the tests

        $urlGenerator = $templated ? $this->templatedUrlGenerator : $this->urlGenerator;

        return $urlGenerator->generate($name, $parameters);
    }
}
