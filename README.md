MODX-Bootstrap
==============
[![Latest Stable Version](https://poser.pugx.org/earthperson/modx-bootstrap/v/stable.svg)](https://packagist.org/packages/earthperson/modx-bootstrap) [![Latest Unstable Version](https://poser.pugx.org/earthperson/modx-bootstrap/v/unstable.svg)](https://packagist.org/packages/earthperson/modx-bootstrap) [![License](https://poser.pugx.org/earthperson/modx-bootstrap/license.svg)](https://packagist.org/packages/earthperson/modx-bootstrap)

Extra for [MODX Revo][2] for starting with [Twitter Bootstrap][3] - open source front-end framework. This extra is especially useful for MODX Revo beginners and/or for the blank MODX Revo installation with Twitter Bootstrap framework in the future.

You'll find the [Transport Package][4] of this extra on [this page][1] or just install it via [Package Management][5].

On the [MODX-Bootstrap site][7] you'll find the [Screencast][8] and [Screenshots][10]. There are screencast on the [youtube][9] also.

### Latest Changes

For details read the [complete changelog][6].

### Build
```Shell
php build.transport.php 
```

You'll find your package in the `core/packages` directory of your `MODX_BASE_PATH`.

![Build][11]

### Install Via Composer

MODX-Bootstrap is available on [Packagist](https://packagist.org/packages/earthperson/modx-bootstrap). It can be installed by running:
```Shell
MODX_CORE_PATH='/path/to/modx/core/';\
composer create-project earthperson/modx-bootstrap MODX-Bootstrap --prefer-dist;\
cd MODX-Bootstrap/_build/;\
sed "3s|/.*/|$MODX_CORE_PATH|" build.config.sample.php > build.config.php;\
php build.transport.php
```
![Build2][12]

[1]: http://modx.com/extras/package/bootstrap
[2]: http://modx.com/get-modx/
[3]: http://getbootstrap.com/
[4]: http://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/package-management/transport-packages
[5]: http://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/package-management
[6]: https://github.com/earthperson/MODX-Bootstrap/blob/develop/core/components/bootstrap/docs/changelog.txt
[7]: http://earthperson.github.io/MODX-Bootstrap/
[8]: http://earthperson.github.io/MODX-Bootstrap/#screencast
[9]: http://youtu.be/_ti8B-tohbc
[10]: http://earthperson.github.io/MODX-Bootstrap/#screenshots
[11]: http://earthperson.github.io/MODX-Bootstrap/images/build.png
[12]: http://earthperson.github.io/MODX-Bootstrap/images/build2.png
