<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64dcd1c1d442bcd91bd2b9dc7638468c
{
    public static $files = array (
        '2f83faa57ceb90c6be4c48dc099afccf' => __DIR__ . '/../..' . '/config/session.php',
        '644a458d0936c492613fb150098ec0fb' => __DIR__ . '/../..' . '/config/db_connect.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit64dcd1c1d442bcd91bd2b9dc7638468c::$classMap;

        }, null, ClassLoader::class);
    }
}
