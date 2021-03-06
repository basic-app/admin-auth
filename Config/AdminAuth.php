<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuth\Config;

use Admin\Models\AdminModel;

class AdminAuth extends \CodeIgniter\Config\BaseConfig
{

    public $modelClass = AdminModel::class;

    public $admins = [];

}