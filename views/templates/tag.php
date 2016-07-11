<!-- Tag Template -->
<script id="tagTemplate" type="text/x-handlebars-template">
 	{{#each tags }}
	<span class='tag'>
		<span id="frm-delete-tag-{{slug}}" class="cmt-request" cmt-controller="tag" cmt-action="delete" action="<?= $removeUrl ?>&tagSlug={{slug}}" method="post">
			<div class="max-area-cover spinner">
				<div class="valign-center cmti cmti-spinner-1 spin"></div>
			</div>
			<i class="btn-delete cmti cmti-close-c cmt-click"></i>
		</span>
		<span class="text">{{name}}</span>
	</span>
	{{/each}}
</script>