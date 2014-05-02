{*

<div id="{$item['contentID']}" class="block-edit text">
	<div class="content">
		{$item['content']}
	</div>
</div>

 need to set semiphore for open editing windows, could cause an error if too many are open *}

<div id="{$item['contentID']}" class="block-edit text" data-contentid="{$item['contentID']}">
	<div class="content">
		{$item['content']}
	</div>
</div>
