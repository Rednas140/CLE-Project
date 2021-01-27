<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc48a2936f2b6775b1c904e8c7e30428c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc48a2936f2b6775b1c904e8c7e30428c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc48a2936f2b6775b1c904e8c7e30428c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc48a2936f2b6775b1c904e8c7e30428c::$classMap;

        }, null, ClassLoader::class);
    }
}
