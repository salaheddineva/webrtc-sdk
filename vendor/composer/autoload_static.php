<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8b40b5d95e5c4b17bfd56ba5389e3099
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Veniseactivation\\WebrtcSdk\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Veniseactivation\\WebrtcSdk\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8b40b5d95e5c4b17bfd56ba5389e3099::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8b40b5d95e5c4b17bfd56ba5389e3099::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8b40b5d95e5c4b17bfd56ba5389e3099::$classMap;

        }, null, ClassLoader::class);
    }
}
