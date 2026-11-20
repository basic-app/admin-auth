<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */

namespace BasicApp\AdminAuth\Config;

use CodeIgniter\Config\BaseService;
use BasicApp\AdminAuth\Config\AdminAuth as AdminAuthConfig;
use BasicApp\AdminAuth\Interfaces\AdminInterface;

class Services extends BaseService
{
    public static function adminAuth($getShared = true): AdminInterface
    {
        if ($getShared) {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(AdminAuthConfig::class);

        $credentialClass = $config->credentialClass;

        assert(!empty($credentialClass), 'Config AdminAuth.credentialClass is empty.');

        assert(class_exists($credentialClass), $credentialClass . ' class is not found.');

        $return = new $credentialClass($config);

        assert(
            $return instanceof AdminInterface,
            $credentialClass . ' is not instance of ' . AdminInterface::class
        );

        return $return;
    }
}
