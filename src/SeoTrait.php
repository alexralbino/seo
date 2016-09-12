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
        $from = $this->seomap['title'];
        if (!is_array($from)) {
            return $from;
        }
        $source = array_map([$this, 'generateSourceSeo'], (array)$from);
        return join($source, ' ');
    }
   
    public function getSeoDescriptionAttribute()
    {
        $from = $this->seomap['description'];
        if (!is_array($from)) {
            return $from;
        }
        $source = array_map([$this, 'generateSourceSeo'], (array)$from);
        return join($source, ' ');
    }

    public function getSeoKeywordsAttribute()
    {
        return $this->seo->keywords;
    }

    /**
     * Get value for seo.
     *
     * @param string $key
     * @return string|null
     */
    private function generateSourceSeo($key)
    {
        if (isset($this->{$key})) {
            return $this->{$key};
        }

        $object = $this;
        foreach (explode('.', $key) as $segment) {
            if (!is_object($object) || !$tmp = $object->{$segment}) {
                return null;
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}