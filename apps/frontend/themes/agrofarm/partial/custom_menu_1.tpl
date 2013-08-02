<ul class="sf-menu template-menu" id="custom_menu_1" name="Główne menu">
        {assign var='mdepth' value=1}
        {assign var='dph' value=0}
              {section name=row loop=$custom_menu_1}
                   {if ($custom_menu_1[row].depth < $mdepth)} </li> {/if}
                   {if ($custom_menu_1[row].depth > $mdepth)} 
                      {assign var='dph' value = $custom_menu_1[row].depth-$mdepth} {'<ul>'|str_repeat:$dph}
                   {/if}
                   {if ($custom_menu_1[row].depth < $mdepth)}  {assign var='dph' value = $mdepth-$custom_menu_1[row].depth} {'</ul>'|str_repeat:$dph} {/if}
                   <li class="item">                   
                   <a {if (isset($smarty.get.pid) && $smarty.get.pid == $custom_menu_1[row].fk_page_id)} class='active' {elseif (!isset($smarty.get.pid) && $smarty.section.row.index==0 ) }  class='active' {/if} href="{$BASEURL}page/show/{$custom_menu_1[row].fk_page_id}" title="{$custom_menu_1[row].title}" alt="{$custom_menu_1[row].title}">
                   {$custom_menu_1[row].title}
                   </a>
                  {assign var ='mdepth' value = $custom_menu_1[row].depth}
                                  
              {/section}
        </ul>
