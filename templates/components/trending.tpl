<div>
	<div class="col-md-12">
	{if $books}
		{foreach $books as $book}
		<a href="{$book['url_libro']}">
			<div class="bookWrapper">
				<img class="bookImg" src="{$book['img_libro']}" alt="imagen-{$book['img_libro']}" id="{$book['id_libro']}" />
				<div class="bookCaption">
					<div>
						<span>{$book['nombre_libro']}</span>
						<span>{$book['autor_libro']}</span>
					</div>
				</div>
			</div>
		</a>
		{/foreach}
	{/if}
	</div>
</div>