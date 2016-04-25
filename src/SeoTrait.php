<?php

namespace Mixdinternet\Seo;

trait SeoTrait
{

    public function seo()
    {
        return $this->morphMany('Mixdinternet\Seo\Seo', 'modullable');
    }

    public function getSeoAttribute()
    {
        $seo = $this->seo()->first();

        if (!$seo) {
            $seo = new Seo();
        }

        return $seo;
    }

    public function getSeoTitleAttribute()
    {
        return $this[$this->seomap['title']];
    }

    public function getSeoDescriptionAttribute()
    {
        return $this[$this->seomap['description']];
    }

    public function getSeoKeywordsAttribute()
    {
        return $this->seo->keywords;
    }
}