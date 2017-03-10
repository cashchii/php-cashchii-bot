<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit204b2b50d01d1bcd5c40461d4bef39fe
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit204b2b50d01d1bcd5c40461d4bef39fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit204b2b50d01d1bcd5c40461d4bef39fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
