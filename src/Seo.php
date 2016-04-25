<?php

namespace Mixdinternet\Seo;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';

    protected $fillable = ['title', 'description', 'keywords'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = str_limit($this->sanitizeText($value), 80);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = str_limit($this->sanitizeText($value), 140);
    }

    private function sanitizeText($value)
    {
        $bad = ['"', "“", "”"];
        $good = ['\'', '\'\'', '\'\''];
        $value = str_replace($bad, $good, strip_tags(html_entity_decode($value)));
        $value = filter_var($value, FILTER_SANITIZE_STRING);

        return str_replace(["\r\n", "\r", "\n"], ' ', $value);
    }

    public function modullable()
    {
        return $this->morphTo();
    }
}
