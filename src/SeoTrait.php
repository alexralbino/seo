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
        $source = array_map([$this, 'generateSourceSeo'], (array)$from);
        return join($source, ' ');
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
    
    public function getSeoDescriptionAttribute()
    {
        return $this[$this->seomap['description']];
    }

    public function getSeoKeywordsAttribute()
    {
        return $this->seo->keywords;
    }
}