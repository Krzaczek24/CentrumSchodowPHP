<?php

namespace CS\Models;

class SiteMapModel
{
    private $displayName;
    private $address;
    private $subSites;
    private $hasSubSites;

    public function __construct($displayName, $address, $subSites = [])
    {
        $this->displayName = $displayName;
        $this->address = $address;
        $this->subSites = $subSites;
        $this->hasSubSites = count($subSites) > 0;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getSubSites()
    {
        return $this->subSites;
    }

    public function hasAnySubSites()
    {
        return $this->hasSubSites;
    }
}