{if isset($komunikaty)}

{foreach name=outer from=$komunikaty item=komunikat}
<article>
	<p>{$komunikat.content}</p>
	— {$komunikat.date|date_format}
</article>
{/foreach}

{else}
Wystąpił błąd
{/if}