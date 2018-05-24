<?php

namespace OpenDota\OfficialAccount\Matches;

use OpenDota\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author overtrue <i@overtrue.me>
 */
class Matches extends BaseClient
{
    /**
     * Get all menus.
     *
     * @return mixed
     */
    public function list()
    {
        return $this->httpGet('cgi-bin/menu/get');
    }

    /**
     * Get current menus.
     *
     * @return mixed
     */
    public function current()
    {
        return $this->httpGet('cgi-bin/get_current_selfmenu_info');
    }

    /**
     * Add menu.
     *
     * @param array $buttons
     * @param array $matchRule
     *
     * @return mixed
     */
    public function create(array $buttons, array $matchRule = [])
    {
        if (!empty($matchRule)) {
            return $this->httpPostJson('cgi-bin/menu/addconditional', [
                'button' => $buttons,
                'matchrule' => $matchRule,
            ]);
        }

        return $this->httpPostJson('cgi-bin/menu/create', ['button' => $buttons]);
    }

    /**
     * Destroy menu.
     *
     * @param int $menuId
     *
     * @return mixed
     */
    public function delete(int $menuId = null)
    {
        if (is_null($menuId)) {
            return $this->httpGet('cgi-bin/menu/delete');
        }

        return $this->httpPostJson('cgi-bin/menu/delconditional', ['menuid' => $menuId]);
    }

    /**
     * Test conditional menu.
     *
     * @param string $userId
     *
     * @return mixed
     */
    public function match(string $userId)
    {
        return $this->httpPostJson('cgi-bin/menu/trymatch', ['user_id' => $userId]);
    }
}
