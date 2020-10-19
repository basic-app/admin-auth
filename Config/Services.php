<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuth\Config;

use Exception;
use CodeIgniter\Config\Services as CoreServices;
use BasicApp\Auth\Libraries\AuthService;

class Services extends CoreServices
{

    public static function adminAuth($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(AdminAuth::class);

        if (!$config)
        {
            throw new Exception(AdminAuth::class . ' not found.');
        }

        return new AuthService($config->modelClass);
    }

}