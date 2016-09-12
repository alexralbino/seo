## Seo

[![Total Downloads](https://poser.pugx.org/mixdinternet/seo/d/total.svg)](https://packagist.org/packages/mixdinternet/seo)
[![Latest Stable Version](https://poser.pugx.org/mixdinternet/seo/v/stable.svg)](https://packagist.org/packages/mixdinternet/seo)
[![License](https://poser.pugx.org/mixdinternet/seo/license.svg)](https://packagist.org/packages/mixdinternet/seo)

![Área administrativa](http://mixd.com.br/github/0df460e4bc591ff10bc30776e0e3585f.png "Área administrativa")

Adiciona a opção de personalizar o titulo e a descrição dos gerenciadores.

## Instalação

Adicione no seu composer.json

```js
  "require": {
    "mixdinternet/seo": "0.1.*"
  }
```

ou

```js
  composer require mixdinternet/seo
```

## Service Provider

Abra o arquivo `config/app.php` e adicione

`Mixdinternet\Seo\Providers\SeoServiceProvider::class`

## Migrations

```
  php artisan vendor:publish --provider="Mixdinternet\Seo\Providers\SeoServiceProvider" --tag="migrations"`
  php artisan migrate
```

## Aplicação

```
...
use Mixdinternet\Seo\SeoTrait;
use Mixdinternet\Seo\SeoInterface;

class Article extends Model implements SeoInterface
{
    use SeoTrait;

    /* linka o campo name (articles) para o title (seo) */
    protected $seomap = [
        'title' => ['name'],
        'description' => 'description'
    ];
...
}
```
