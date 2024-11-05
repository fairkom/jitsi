<?php

declare(strict_types=1);

use OCA\fairmeeting\AppInfo\Application;

/**
 * @var array $_
 */

script(Application::APP_ID, 'room');

?>

<div
    id="fairmeeting"
    data-help-link="<?= $_['helpLink'] ?>"
    data-server-url="<?= $_['serverUrl']; ?>"
    data-display-join-using-the-fairmeeting-app="<?= $_['display_join_using_the_fairmeeting_app'] ? 'true' : 'false'; ?>"
    data-display-all-sharing-invites="<?= $_['display_all_sharing_invites'] ? 'true' : 'false'; ?>">
</div>
