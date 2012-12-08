<?php

namespace FSC\HateoasBundle\Metadata;

interface RelationMetadataInterface
{
    /**
     * @return string
     */
    public function getRel();

    /**
     * @return string
     */
    public function getRoute();

    /**
     * @return array
     */
    public function getParams();

    /**
     * @return null|RelationContentMetadataInterface
     */
    public function getContent();

    /**
     * Whether that Relation has a templated URL
     * @return boolean
     */
    public function getTemplated();
}
