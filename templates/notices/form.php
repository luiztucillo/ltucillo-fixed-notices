<?php /** @var Form $this */

use LTucillo\Helpers\Translate;
use LTucillo\Model\HtmlOption;
use LTucillo\Model\Notices;
use LTucillo\View\Admin\Notices\Form; ?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo Translate::__('Add Fixed Notice') ?></h1>
    <a href="<?php echo $this->getBackUrl() ?>" class="page-title-action"><?php echo Translate::__('List Notices') ?></a>
    <hr class="wp-header-end">
    <form name="save-fixed-notice" action="<?php echo $this->getFormAction() ?>" method="post">
        <input type="hidden" name="action" value="<?Php echo App::ACTION_ADD ?>"/>
        <table class="form-table" role="presentation">
            <tbody>
            <tr>
                <th scope="row"><label for="user-group"><?php echo Translate::__('User Group') ?></label></th>
                <td>
                    <?php /** @var HtmlOption $role */ ?>
                    <?php $i = 0 ?>
                    <?php foreach ($this->getRoles() as $role): ?>
                        <div style="display: inline-block;margin-right: 20px;">
                            <input type="checkbox" id="user-group<?php echo $i ?>" name="user-group[]"
                                   value="<?php echo $role->getValue() ?>"> <label
                                    for="user-group<?php echo $i ?>"><?php echo $role->getLabel() ?></label>
                        </div>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="notice-level"><?php echo Translate::__('Level') ?></label></th>
                <td>
                    <select id="notice-level" name="notice-level">
                        <option value="<?php echo Notices::LEVEL_SUCCESS ?>"><?php echo Notices::LEVEL_SUCCESS ?></option>
                        <option value="<?php echo Notices::LEVEL_WARNING ?>"><?php echo Notices::LEVEL_WARNING ?></option>
                        <option value="<?php echo Notices::LEVEL_ERROR ?>"><?php echo Notices::LEVEL_ERROR ?></option>
                        <option value="<?php echo Notices::LEVEL_INFO ?>"><?php echo Notices::LEVEL_INFO ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="message"><?php echo Translate::__('Message') ?></label></th>
                <td><textarea name="message" type="text" id="message" value="" class="regular-text"></textarea></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <p class="submit">
                        <input type="submit" name="create-fixed-notice" id="create-fixed-notice"
                               class="button button-primary" value="<?php echo Translate::__('Save Fixed Notice') ?>">
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
