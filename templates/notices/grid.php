<?php
/** @var Grid $this */

use LTucillo\Entities\Notice;
use LTucillo\Helpers\Translate;
use LTucillo\View\Admin\Notices\Grid;

?>
<table class="wp-list-table widefat fixed striped users">
    <tbody>
    <thead>

    <tr>
        <th scope="col" id="user_groups" class="manage-column column-primary">
            <span><?php echo Translate::__('User Groups') ?></span>
        </th>

        <th scope="col" id="level" class="manage-column column-primary">
            <span><?php echo Translate::__('Level') ?></span>
        </th>
        <th scope="col" id="user_groups" class="manage-column column-primary">
            <span><?php echo Translate::__('Message') ?></span>
        </th>
        <th scope="col" id="user_groups" class="manage-column column-primary" width="50">
        </th>
    </tr>
    </thead>
    <tbody id="the-list" data-wp-lists="list:user">
    <?php /** @var Notice $notice */ ?>
    <?php foreach ($this->getNotices() as $notice): ?>
        <tr>
            <td><?php echo $notice->getUserGroup(true) ?></td>
            <td><?php echo $notice->getLevel() ?></td>
            <td><?php echo $notice->getMessage() ?></td>
            <td><a href="<?php echo $this->getRemoveUrl($notice) ?>"><?php echo Translate::__('Remove') ?></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
