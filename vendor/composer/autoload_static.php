<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite86755799dec4e3b459a55b156f9081b
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite86755799dec4e3b459a55b156f9081b::$classMap;

        }, null, ClassLoader::class);
    }
}
