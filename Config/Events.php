<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
use CodeIgniter\Events\Events;

Events::on('pre_system', function() {

    helper(['admin_auth']);
});