Pheal Bundle
============

Copyright (C) 2013 by Patrick Ruckstuhl
All rights reserved.

Symfony bundle for Pheal - EVE Online API Library

## LICENSE
Pheal Bundle is licensed under a MIT style license, see LICENSE.txt
for further information

## INSTALLATION
First you need to add `tarioch/pheal-bundle` to `composer.json`:

```json
{
   "require": {
        "tarioch/pheal-bundle": "dev-master"
    }
}
```

You also have to add `TariochPhealBundle` to your `AppKernel.php`:

```php
// app/AppKernel.php
//...
class AppKernel extends Kernel
{
    //...
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Tarioch\PhealBundle\TariochPhealBundle()
        );
        //...

        return $bundles;
    }
    //...
}
```

And you have to enable the annotation parsing for the bundle in your `config.yml`:

```yml
// app/config/config.yml
// ...
jms_di_extra:
    locations:
        all_bundles: false
        bundles: [TariochPhealBundle]
```
