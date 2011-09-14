{if isset($komunikaty)}

{foreach name=outer from=$komunikaty item=komunikat}
<article class="hentry">
	<p class="entry-title">{$komunikat.content}</p>
	<footer class="vcard author">
		<em class="fn">{$komunikat.author}</em>
		<span>Dodano: <time class="updated">{$komunikat.date_added|date_format}</time></span>
	</footer>
</article>
{/foreach}

{else}
Wystąpił błąd
{/if}