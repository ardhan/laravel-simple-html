# Laravel Simple HTML
> Membuat HTML tanpa harus berpindah dari controller.

Package ini akan membantu anda untuk membuat html melalui controller.

## Cara Installasi

```sh
composer require ardhan/laravel-simple-html
```

## Contoh Penggunaan
```php
<?php
namespace App\Http\Controllers;

use Page;
use Element;

class PageController extends Controller{
  function halaman()
  {
    $page = Page::author('Ardhan Wahyu Rahmanu')->description('ini adalah halaman')->title('Halaman');
    $div = Element::div('ini adalah div')->cls('attribut_kelas')->id('attribut_id');
    $page->content($div);
    
    echo $page;
  }
}

```


## Meta

Ardhan Wahyu Rahmanu – [https://rahmanu.com](https://rahmanu.com) – ardhan.matematika@gmail.com

[https://github.com/ardhan/](https://github.com/ardhan/)
