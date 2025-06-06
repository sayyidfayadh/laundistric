<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita453094c4babd5b5c59296e6fa1a569d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita453094c4babd5b5c59296e6fa1a569d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita453094c4babd5b5c59296e6fa1a569d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita453094c4babd5b5c59296e6fa1a569d::$classMap;

        }, null, ClassLoader::class);
    }
}
