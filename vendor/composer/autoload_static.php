<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8cb448b189d002b86e2c95ce3f20541c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8cb448b189d002b86e2c95ce3f20541c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8cb448b189d002b86e2c95ce3f20541c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8cb448b189d002b86e2c95ce3f20541c::$classMap;

        }, null, ClassLoader::class);
    }
}
