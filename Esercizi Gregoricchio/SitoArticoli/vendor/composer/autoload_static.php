<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd140a7d92bd5f0c3da3f953da83f9ae8
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd140a7d92bd5f0c3da3f953da83f9ae8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd140a7d92bd5f0c3da3f953da83f9ae8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
