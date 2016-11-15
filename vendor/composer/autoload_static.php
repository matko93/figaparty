<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb26d1e5684614f0c47845b89b743dbdb
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb26d1e5684614f0c47845b89b743dbdb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb26d1e5684614f0c47845b89b743dbdb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
