<!-- Tag Template -->
<script id="tagTemplate" type="text/x-handlebars-template">
	{{#each tags }}
	<span class='tag'>
		<span class="text">{{name}}</span>
		<span id="frm-delete-tag-{{slug}}" cmt-app="main" cmt-controller="tag" cmt-action="delete" action="<?= $removeUrl ?>&tag-slug={{slug}}" method="post">
			<div class="max-area-cover spinner">
				<div class="valign-center cmti cmti-spinner-1 spin"></div>
			</div>
			<i class="btn-delete cmti cmti-close-c cmt-click"></i>
		</span>
	</span>
	{{/each}}
</script>