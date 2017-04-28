<?php
$tags		= $widget->model->modelTags;
$model		= $widget->model;
$assignUrl	= $widget->assignUrl;
$removeUrl	= $widget->removeUrl;
$disabled	= $widget->disabled;
$notes		= $widget->notes;
$showNotes	= $widget->showNotes;
?>

<?php if( !$disabled ) { ?>
	<div cmt-app="main" cmt-controller="tag" cmt-action="create" action="<?= $assignUrl ?>">
		<div class="max-area-cover spinner">
			<div class="valign-center cmti cmti-3x cmti-flexible-o spin"></div>
		</div>

		<textarea name="tags" placeholder="Specify your tags in comma seperated values"></textarea>

		<?php if( $showNotes ) { ?>
			<div class="note"><?= $notes ?></div>
		<?php } ?>

		<div class="warning message"></div>

		<div class="frm-actions align align-center">
			<a href="#" class="btn btn-medium cmt-click">Add Tags</a>
		</div>
	</div>
<?php } ?>

<div class="filler-height"></div>
<div class="wrap-tags">
	<?php
		foreach ( $tags as $modelTag ) {

			if( $modelTag->active ) {

				$tag	= $modelTag->tag;

				if( $disabled ) {
	?>
					<span class='tag'>
						<span class="text"><?= $tag->name ?></span>
					</span>
	<?php } else { ?>
					<span class='tag'>
						<span class="text"><?= $tag->name ?></span>
						<span id="frm-delete-tag-<?= $tag->slug ?>" cmt-app="main" cmt-controller="tag" cmt-action="delete" action="<?= $removeUrl ?>&tag-slug=<?= $tag->slug ?>">
							<div class="max-area-cover spinner">
								<div class="valign-center cmti cmti-spinner-1 spin"></div>
							</div>
							<i class="btn-delete cmti cmti-close-c cmt-click"></i>
						</span>
					</span>
	<?php
				}
			}
		}
	?>
</div>

<?php include 'templates/tag.php'; ?>