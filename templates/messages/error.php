<?php
use LTucillo\View\Messages\ErrorMessage;
/** @var ErrorMessage $this */ ?>
<div class = "notice notice-error">
    <p><?php echo $this->getMessage() ?></p>
</div>
