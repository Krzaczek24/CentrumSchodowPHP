<?php

namespace CS\Enums;

use CS\Core\Enum;

abstract class OfferGalleryMode extends Enum
{
    const None                  = "NONE";
    const InvertedSideBySide    = "INVERTED_SIDE_BY_SIDE";
    const SideBySide            = "SIDE_BY_SIDE";
    const Tiles                 = "TILES";
}