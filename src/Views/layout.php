<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */
echo view_cell('AdminAuthLayout', [
    'lang' => service('request')->getLocale(),
    'title' => $title ?? null,
    'description' => $description ?? null,
    'content' => $this->renderSection('main'),
    'styles' => $this->renderSection('pageStyles'),
    'scripts' => $this->renderSection('pageScripts'),
    'error' => session('error'),
    'errors' => session('errors'),
    'message' => session('message')
]);