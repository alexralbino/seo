<?php

namespace Mixdinternet\Seo;

interface SeoInterface
{
    public function seo();

    public function getSeoAttribute();

    public function getSeoTitleAttribute();

    public function getSeoDescriptionAttribute();
}