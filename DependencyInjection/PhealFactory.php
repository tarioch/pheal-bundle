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
    /**
     * @DI\InjectParams({
     * "kernel" = @DI\Inject("kernel"),
     * "userAgent" = @DI\Inject("%tarioch.phealbundle.user_agent%")
     * })
     */
    public function __construct(Kernel $kernel, $userAgent)
    {
        $this->configurePheal($kernel, $userAgent);
    }

    private function configurePheal(Kernel $kernel, $userAgent)
    {
        $config = Config::getInstance();
        $cacheDir = $kernel->getCacheDir() . '/pheal/';
        if (!is_dir($cacheDir)) {
            if (false === @mkdir($cacheDir, 0777, true)) {
                throw new \RuntimeException(sprintf('Could not create cache directory "%s".', $cacheDir));
            }
        }
        $config->cache = new HashedNameFileStorage($cacheDir);
        $config->access = new StaticCheck();
        $config->http_user_agent = $userAgent; 
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
