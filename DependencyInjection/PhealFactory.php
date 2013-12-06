<?php
namespace Tarioch\PhealBundle\DependencyInjection;

use Symfony\Component\HttpKernel\Kernel;
use JMS\DiExtraBundle\Annotation as DI;
use Pheal\Pheal;
use Pheal\Core\Config;
use Pheal\Access\StaticCheck;
use Pheal\Cache\HashedNameFileStorage;

/**
 * @DI\Service("tarioch.pheal.factory")
 */
class PhealFactory
{
    private $kernel;

    /**
     * @DI\InjectParams({
     * "kernel" = @DI\Inject("kernel")
     * })
     */
    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
        $this->configurePheal();
    }

    private function configurePheal()
    {
        $config = Config::getInstance();
        $cacheDir = $this->kernel->getCacheDir() . '/pheal/';
        if (!is_dir($cacheDir)) {
            if (false === @mkdir($cacheDir, 0777, true)) {
                throw new \RuntimeException(sprintf('Could not create cache directory "%s".', $cacheDir));
            }
        }
        $config->cache = new HashedNameFileStorage($cacheDir);
        $config->access = new StaticCheck();
    }

    /**
     * @param integer $keyId
     * @param string $vCode
     * @return \Pheal\Pheal
     */
    public function createEveOnline($keyId = null, $vCode = null)
    {
        return new Pheal($keyId, $vCode);
    }
}
