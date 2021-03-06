<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit23f5a3ccda28e6b5a3082ae36b156eee
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit23f5a3ccda28e6b5a3082ae36b156eee', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit23f5a3ccda28e6b5a3082ae36b156eee', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit23f5a3ccda28e6b5a3082ae36b156eee::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit23f5a3ccda28e6b5a3082ae36b156eee::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire23f5a3ccda28e6b5a3082ae36b156eee($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire23f5a3ccda28e6b5a3082ae36b156eee($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
