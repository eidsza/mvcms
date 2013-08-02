<ul class="tabs">
{section name=r loop=$cats}
   <li {if $smarty.section.r.index==0} class="active" {/if}><a href="#{$cats[r].fk_news_category_id}" ><span>{$cats[r].category_title}</span></a></li>
{/section}
</ul>
{section name=r loop=$cats}

 <div class="" id="{$cats[r].fk_news_category_id}">  
  {section name=row loop=$news}
   
    {if $cats[r].fk_news_category_id == $news[row].fk_category_id} 
    <article class="mini">
      <time datetime="{$news[row].date_publish|date_format:'%e/%m/%Y'}">  
        <span class="day">{$news[row].date_publish|date_format:'%e'}</span>
        <span class="mounth">{$news[row].date_publish|date_format:'%b'}</span>
        <span class="time">{$news[row].date_publish|date_format:'%I:%M %p'}</span>
      </time>
      <div class="entry-content">
      <a href="?pid={$smarty.get.pid}&amp;nid={$news[row].id}" class="title">{$news[row].news_title}"</a>
       <p>{$news[row].news_pre_content}</p>
      </div>
    </article>
   {/if} 
  {/section}
 </div>
{/section}      
         
        