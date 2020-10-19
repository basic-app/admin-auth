<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuth\Models;

use Exception;
use BasicApp\AdminAuth\Config\Admin as AdminConfig;
use BasicApp\Auth\Interfaces\AuthModelInterface;

class AdminModel implements AuthModelInterface
{

    public $primaryKey = 'username';

    public $returnType = 'array';    

    public function findAll(bool $refresh = false)
    {
        static $admins;

        if ($refresh || ($admins === null))
        {
            $config = config(AdminConfig::class);

            if (!$config)
            {
                throw new Exception(AdminConfig::class . ' not found.');
            }

            $admins = $config->admins;
        }

        return $admins;
    }

    public function findByField($field, $value, bool $refresh = false)
    {
        foreach($this->findAll($refresh) as $id => $admin)
        {
            if ($admin[$field] == $value)
            {
                return $admin;
            }
        }

        return null;
    }    

    public function find($id = null)
    {
        foreach($this->findAll($refresh) as $key => $admin)
        {
            if ($key == $id)
            {
                return $admin;
            }
        }

        return null;
    }

    public function encodePassword($user, string $password) : string
    {
        return $password;
    }

    public function checkPassword($user, string $password) : bool
    {
        return $password === $user[$password];
    }

}