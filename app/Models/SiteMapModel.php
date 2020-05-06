<?php

namespace CS\Models;

/**
 * Contains information like displayed names or addresses for main menu buttons
 */
class SiteMapModel
{
    private $displayName;
    private $address;
    private $subSites;
    private $hasSubSites;

    /**
     * @param string $displayName
     * @param string $address
     * @param array $subSites
     */
    public function __construct($displayName, $address, $subSites = [])
    {
        $this->displayName = $displayName;
        $this->address = $address;
        $this->subSites = $subSites;
        $this->hasSubSites = count($subSites) > 0;
    }

    /**
     * @return string text shown in button
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return string redirection target address or anchor
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return array list of subsites for submenu
     */
    public function getSubSites()
    {
        return $this->subSites;
    }

    /**
     * @return bool true if has any subsite, otherwise returns false
     */
    public function hasAnySubSites()
    {
        return $this->hasSubSites;
    }
}