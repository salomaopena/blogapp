<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'member';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */

    public array $groups = [
        'admin' => [
            'title' => 'Admin',
            'description' => 'Administradores do sistema.',
        ],
        'editor' => [
            'title' => 'Editor',
            'description' => 'Pode criar e editar posts.',
        ],
        'member' => [
            'title' => 'Membro',
            'description' => 'Utilizador comum do site.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'posts.create'  => 'Pode criar posts',
        'posts.edit'    => 'Pode editar posts',
        'posts.delete'  => 'Pode apagar posts',
        'users.manage'  => 'Pode girir utilizadores e papéis',
        // 'admin.access' => 'Can access the sites admin area',
        // 'admin.settings' => 'Can access the main site settings',
        // 'users.manage-admins' => 'Can manage other admins',
        // 'users.create' => 'Can create new non-admin users',
        // 'users.edit' => 'Can edit existing non-admin users',
        // 'users.delete' => 'Can delete existing non-admin users',
        // 'beta.access' => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'admin' => [
            'posts.*',
            'users.*',
        ],
        'editor' => [
            'posts.create',
            'posts.edit',
        ],
        'member' => [],
    ];
}
