<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInited3f9fe84298c8e5ffa16ac81985aefe
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
            $loader->prefixLengthsPsr4 = ComposerStaticInited3f9fe84298c8e5ffa16ac81985aefe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInited3f9fe84298c8e5ffa16ac81985aefe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInited3f9fe84298c8e5ffa16ac81985aefe::$classMap;

        }, null, ClassLoader::class);
    }
}
