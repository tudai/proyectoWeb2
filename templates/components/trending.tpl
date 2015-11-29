<div>
	<h3>Últimos libros agregados</h3>
	<div class="col-md-12">
	{if $books}
		{foreach $books as $book}
		<a href="{$book['url_libro']}">
			<div class="col-xs-10 col-md-2 bookWrapper">
				<img class="bookImg" src="{$book['img_libro']}" alt="imagen-{$book['img_libro']}" id="{$book['id_libro']}" />
				<div class="bookCaption">
					<div>
						<span>{$book['nombre_libro']}</span>
						<span>{$book['autor_libro']}</span>
						<span>{$book['seccion_id_seccion']}</span>
					</div>
				</div>
			</div>
		</a>
		{/foreach}
	{/if}
	</div>
</div>
