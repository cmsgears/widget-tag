<?php
$model		= $widget->model;
$disabled	= $widget->disabled;
$notes		= $widget->notes;
$showNotes	= $widget->showNotes;

$app			= $widget->app;
$controller		= $widget->controller;

$mapAction		= $widget->mapAction;
$mapActionUrl	= $widget->mapActionUrl;

$deleteAction		= $widget->deleteAction;
$deleteActionUrl	= $widget->deleteActionUrl;

$tags	= $model->getTagIdNameMap( true );
?>
<div class="mapper mapper-submit mapper-submit-tags">
	<?php if( !$disabled ) { ?>
	<div class="frm-field-button" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>">
		<input type="text" name="tags" />
		<span class="btn cmt-click">Add</span>
	</div>
	<div class="filler-height"></div>
	<div class="mapper-items">
	<?php foreach ( $tags as $key => $value ) { ?>
		<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteActionUrl ?>">
			<span class="spinner hidden-easy">
				<span class="cmti cmti-spinner-1 spin"></span>
			</span>
			<span class="mapper-item-remove btn-icon-o"><i class="icon fa fa-close cmt-click"></i></span>
			<span class="name"><?= $value ?></span>
			<input type="hidden" name="tagId" value="<?= $key ?>" />
		</div>
	<?php } ?>
	</div>
	<?php } else { ?>
	<div class="mapper-items">
	<?php foreach ( $tags as $key => $value ) { ?>
		<div class="mapper-item">
			<span class="name"><?= $value ?></span>
			<input type="hidden" name="tagId" value="<?= $key ?>" />
		</div>
	<?php } ?>
	</div>
	<?php } ?>
</div>

<div class="clear filler-height"></div>

<?php if( !$disabled && $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>

<?php include 'templates/tag.php'; ?>
