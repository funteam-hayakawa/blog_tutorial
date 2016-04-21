<div class="categories form">
<?php echo $this->Form->create('Tag'); ?>
    <fieldset>
        <legend><?php echo __('Add Tag'); ?></legend>
        <?php echo $this->Form->input('name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
