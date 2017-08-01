<script id="tagMapperTemplate" type="text/x-handlebars-template">
	{{#each tags }}
	<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteActionUrl ?>">
		<span class="spinner hidden-easy">
			<span class="cmti cmti-spinner-1 spin"></span>
		</span>
		<span class="mapper-item-remove btn-icon-o"><i class="icon fa fa-close cmt-click"></i></span>
		<span class="name">{{name}}</span>
		<input type="hidden" name="tagId" value="{{id}}" />
	</div>
	{{/each}}
</script>
