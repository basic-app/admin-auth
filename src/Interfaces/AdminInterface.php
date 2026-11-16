<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */

namespace BasicApp\AdminAuth\Interfaces;

use BasicApp\AdminAuth\Config\AdminAuth as AdminAuthConfig;

interface AdminInterface
{
    public function __construct(AdminAuthConfig $authConfig);

    public function getAdminName(): ?string;

    public function getAdminEmail(): ?string;

    public function getAdminAvatarImageUrl(?string $default = null): ?string;

    public function getAdminLogoutUrl(): ?string;

    public function getAdminAccountMenu(): array;
}
