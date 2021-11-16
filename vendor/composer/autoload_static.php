<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8fa56d1c59cdd00927e87e5026d31360
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8fa56d1c59cdd00927e87e5026d31360::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8fa56d1c59cdd00927e87e5026d31360::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8fa56d1c59cdd00927e87e5026d31360::$classMap;

        }, null, ClassLoader::class);
    }
}
