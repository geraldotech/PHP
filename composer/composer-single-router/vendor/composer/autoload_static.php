<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb24ef80dcfdc342aefdbb8386fb46cd
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'HelloWorld\\' => 11,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'HelloWorld\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb24ef80dcfdc342aefdbb8386fb46cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb24ef80dcfdc342aefdbb8386fb46cd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb24ef80dcfdc342aefdbb8386fb46cd::$classMap;

        }, null, ClassLoader::class);
    }
}
