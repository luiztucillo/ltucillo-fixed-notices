<?php
use LTucillo\Helpers\Translate;
use LTucillo\View\Admin\Notices;
/** @var Notices $this */
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo Translate::__('Fixed Notices') ?></h1>
    <a href="<?php echo $this->getAddUrl() ?>" class="page-title-action"><?php echo Translate::__('Add Fixed Notice') ?></a>
    <hr class="wp-header-end">
    <?php if (!$this->hasNotices()): ?>
    <h2>No notices found</h2>
    <?php else: ?>
    <?php echo $this->renderNoticeList() ?>
    <?php endif ?>
</div>
