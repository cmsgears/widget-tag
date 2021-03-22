<?php
$model		= $widget->model;
$disabled	= $widget->disabled;

$notes		= $widget->notes;
$showNotes	= $widget->showNotes;

$mapperClass = $widget->mapperClass;

$app		= $widget->app;
$controller	= $widget->controller;

$mapAction		= $widget->mapAction;
$mapActionUrl	= $widget->mapActionUrl;

$deleteAction		= $widget->deleteAction;
$deleteActionUrl	= $widget->deleteActionUrl;

$modelTags = $model->activeModelTags;
?>
<div class="<?= $mapperClass ?>" template="tagMapperTemplate">
	<?php if( !$disabled ) { ?>
	<div class="frm-field-button" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>">
		<input type="hidden" name="widget-slug" value="<?= $widget->widgetSlug ?>" />
		<input type="hidden" name="template-id" value="<?= $widget->templateId ?>" />
		<input type="text" name="list" placeholder="Tags CSV" />
		<span class="btn cmt-click">Add</span>
	</div>
	<div class="filler-height"></div>
	<div class="mapper-items">
	<?php
		foreach( $modelTags as $modelTag ) {

			$tag = $modelTag->model;

			$deleteUrl = "$deleteActionUrl&cid=$modelTag->id";
	?>
		<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteUrl ?>">
			<span class="spinner hidden-easy">
				<span class="cmti cmti-spinner-1 spin"></span>
			</span>
			<span class="mapper-item-remove btn-icon-o"><i class="icon cmti cmti-close cmt-click"></i></span>
			<span class="name"><?= $tag->name ?></span>
			<input class="cid" type="hidden" name="cid" value="<?= $modelTag->id ?>" />
		</div>
	<?php } ?>
	</div>
	<?php } else { ?>
	<div class="mapper-items">
	<?php
		foreach( $modelTags as $modelTag ) {

			$tag = $modelTag->model;
	?>
		<div class="mapper-item">
			<span class="name"><?= $tag->name ?></span>
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
