<article class="mini">
   <time datetime="{$newsitem.date_update|date_format:'%e/%m/%Y'}">  
   <span class="day">{$newsitem.date_update|date_format:'%e'}</span>
   <span class="mounth">{$newsitem.date_update|date_format:'%b'}</span>
   <span class="time">{$newsitem.date_update|date_format:'%I:%M %p'}</span>
   </time>
   <div class="entry-content">
     <h4>{$newsitem.news_title}"</h4>
    <p>{$newsitem.news_pre_content}</p>
    <p>{$newsitem.news_content}</p>
   </div>
</article>
<span style="float:right;"><a href="{if $smarty.get.pid!=''}?pid={$smarty.get.pid}{else}index.php{/if}" class="btn btn-info"/>Powrot</a></span>