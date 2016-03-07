<?php
	$tags = $model->modelTags;
?>

<div id="request-tag" class='cmt-request' cmt-controller='tag' cmt-action='create' action="<?= $createUrl ?>" method="post">
	<div class="max-area-cover spinner">
		<div class="valign-center cmti cmti-3x cmti-flexible-o spin"></div>
	</div>

	<textarea name="tags" placeholder="Specify your tags in comma seperated values"></textarea>
	
	<div class="note"><?= $notes ?> </div>
	
	<div class="warning message"></div>
	
	<div class="frm-actions align align-center">
		<a href="#" class="btn btn-medium cmt-click">Add Tags</a>	
	</div>
</div>

<div class="wrap-tags">
	<?php 
		foreach ( $tags as $modelTag ) {

			if( $modelTag->active ) {

				$tag	= $modelTag->tag;
	?>
				<span class='tag'>
			 		<span id="frm-delete-tag-<?= $tag->slug ?>" class="cmt-request" cmt-controller="tag" cmt-action="delete" action="<?= $deleteUrl ?>&tslug=<?= $tag->slug ?>" method="post">
						<div class="max-area-cover spinner">
							<div class="valign-center cmti cmti-spinner-1 spin"></div>
						</div>
			 			<i class="btn-delete cmti cmti-close-c cmt-click"></i>
			 		</span>
			 		<span class="text"><?= $tag->name ?></span>
				</span>
	<?php 
			}
		}
	?>
</div>

<?php include 'templates/tag.php'; ?>