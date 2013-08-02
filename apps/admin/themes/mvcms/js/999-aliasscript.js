(function($) {
/*
 * Function: fnGetColumnData
 * Purpose:  Return an array of table values from a particular column.
 * Returns:  array string: 1d data array 
 * Inputs:   object:oSettings - dataTable settings object. This is always the last argument past to the function
 *           int:iColumn - the id of the column to extract the data from
 *           bool:bUnique - optional - if set to false duplicated values are not filtered out
 *           bool:bFiltered - optional - if set to false all the table data is used (not only the filtered)
 *           bool:bIgnoreEmpty - optional - if set to false empty values are not filtered from the result array
 * Author:   Benedikt Forchhammer <b.forchhammer /AT\ mind2.de>
 */
$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
	// check that we have a column id
	if ( typeof iColumn == "undefined" ) return new Array();
	
	// by default we only wany unique data
	if ( typeof bUnique == "undefined" ) bUnique = true;
	
	// by default we do want to only look at filtered data
	if ( typeof bFiltered == "undefined" ) bFiltered = true;
	
	// by default we do not wany to include empty values
	if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
	
	// list of rows which we're going to loop through
	var aiRows;
	
	// use only filtered rows
	if (bFiltered == true) aiRows = oSettings.aiDisplay; 
	// use all rows
	else aiRows = oSettings.aiDisplayMaster; // all row numbers

	// set up data array	
	var asResultData = new Array();
	
	for (var i=0,c=aiRows.length; i<c; i++) {
		iRow = aiRows[i];
		var aData = this.fnGetData(iRow);
		var sValue = aData[iColumn];
		
		// ignore empty values?
		if (bIgnoreEmpty == true && sValue.length == 0) continue;

		// ignore unique values?
		else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
		
		// else push the value onto the result data array
		else asResultData.push(sValue);
	}
	
	return asResultData;
}}(jQuery));

(function($) {
$.fn.getNonColSpanIndex = function() {
    if(! $(this).is('td') && ! $(this).is('th'))
        return -1;

    var allCells = this.parent('tr').children();
    var normalIndex = allCells.index(this);
    var nonColSpanIndex = 0;

    allCells.each(
        function(i, item)
        {
            if(i == normalIndex)
                return false;

            var colspan = $(this).attr('colspan');
            colspan = colspan ? parseInt(colspan) : 1;
            nonColSpanIndex += colspan;
        }
    );

    return nonColSpanIndex;
}}(jQuery));

(function($) {
$.fn.dataTableExt.oApi.fnFilterClear  = function ( oSettings )
{
	/* Remove global filter */
	oSettings.oPreviousSearch.sSearch = "";
	
	/* Remove the text of the global filter in the input boxes */
	if ( typeof oSettings.aanFeatures.f != 'undefined' )
	{
		var n = oSettings.aanFeatures.f;
		for ( var i=0, iLen=n.length ; i<iLen ; i++ )
		{
			$('input', n[i]).val( '' );
		}
	}
	
	/* Remove the search text for the column filters - NOTE - if you have input boxes for these
	 * filters, these will need to be reset
	 */
	for ( var i=0, iLen=oSettings.aoPreSearchCols.length ; i<iLen ; i++ )
	{
		oSettings.aoPreSearchCols[i].sSearch = "";
	}
	
	/* Redraw */
	oSettings.oApi._fnReDraw( oSettings );
}}(jQuery));




function fnCreateSelect( aData )
{
	var r='<select><option value=""></option>', i, iLen=aData.length;
	for ( i=0 ; i<iLen ; i++ )
	{
		r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}
	return r+'</select>';
}















$(document).ready(function() {

/*  
 if ($(".cms_standard").length > 0){
   
   var oTable =   $(".cms_standard").dataTable( {
					"bStateSave": true,
					"aaSorting": [],
				  "fnFilter" : "",
					"oLanguage": {
                "sUrl": "plugins/translations/datatable/pl.txt"
           }
          
				});

  
 oTable.fnFilterClear();
  			
 /*Add a select menu for each TH element in the table footer /
 
  $("tfoot th.lang").each( function ( i ) {
	//var aPos = oTable.fnGetPosition( this );
    var index = $(this).getNonColSpanIndex();
   
  	this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(index) );
	  
    $('select', this).change( function () {
      	
      oTable.fnFilter( $(this).val(), index );
		} );
	} );
				
}		
*/ 
 if ($(".cms_pages").length > 0){
   var oTable =   $(".cms_pages").dataTable( {
					"bDestroy" : true,
					"aoColumns": [
                      { "bSortable": false },
                      { "bSortable": false },
                      { "bSortable": true },
                      { "bSortable": true },
                      { "bSortable": true },
                      { "bSortable": true },
                      { "bSortable": false }
                      ],
          "bStateSave": true,
          "asSorting": [[]],
          "bSortable" : false,
	  "fnFilter" : "",
	  "oLanguage": {
                "sProcessing":   "Proszę czekać...",
                "sLengthMenu":   "Pokaż _MENU_ pozycji",
                "sZeroRecords":  "Nie znaleziono żadnych pasujących indeksów",
                "sInfo":         "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                "sInfoEmpty":    "Pozycji 0 z 0 dostępnych",
                "sInfoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                "sInfoPostFix":  "",
                "sSearch":       "Szukaj:",
                "sUrl":          "",
                "oPaginate": {
                "sFirst":    "Pierwsza",
                "sPrevious": "Poprzednia",
                "sNext":     "Następna",
                "sLast":     "Ostatnia"
                }
           }
	});
 
    }
	if ($(".cms_standard").length > 0){
   var oTable =   $(".cms_standard").dataTable( {
					"bDestroy" : true,
					
          "bStateSave": true,
          "asSorting": [[]],
          "bSortable" : false,
	  "fnFilter" : "",
                "oLanguage": {
                "sProcessing":   "Proszę czekać...",
                "sLengthMenu":   "Pokaż _MENU_ pozycji",
                "sZeroRecords":  "Nie znaleziono żadnych pasujących indeksów",
                "sInfo":         "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                "sInfoEmpty":    "Pozycji 0 z 0 dostępnych",
                "sInfoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                "sInfoPostFix":  "",
                "sSearch":       "Szukaj:",
                "sUrl":          "",
                "oPaginate": {
                "sFirst":    "Pierwsza",
                "sPrevious": "Poprzednia",
                "sNext":     "Następna",
                "sLast":     "Ostatnia"
                }
           }
           
	});
	
  oTable.fnFilterClear();
 	
  
  $("tfoot th.lang, thead th.lang").each( function ( i ) {
    var index = $(this).getNonColSpanIndex();
   	this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(index) );
	  $('select', this).change( function () {
    oTable.fnFilter( $(this).val(), index );
		});
	});

  }
	
if ($( ".column" ).length>0){		
$( ".column" ).nestedSortable({
     connectWith: ".column",
     cursor: 'move' ,
     update:function(evetnt, ui){
     serial = jQuery('.column').sortable('serialize');
     jQuery('input[name=sortorder]').val(serial);
	         //alert(serial);
           }
});
}
		    
		    
		    /*
		    $( "#widget-list" ).sortable({
			     connectWith: ".widget-sortables",
			     cursor: 'move' 
			               
		    });
		    */
		  
      function updateSidebarPlugins(sidebarid){
      var pluginArray = jQuery('#'+sidebarid).sortable('toArray');
      $.ajax({
            url: "plugins.php?update=1",
            type: "post",
            data: ({plugin_array:pluginArray, sidebarId:sidebarid}),
            error: function(){
            alert("Theres an error with AJAX");
            },
            success:function(response){
            alert(response);
            }
            });
      }
      
      function DeleteSidebarPlugin(sidebarid, id){
      var plugin = new Object();
      plugin.Sidebarid = sidebarid;
      plugin.Name = $('#'+sidebarid).find('#'+id).find('input[name=pluginname]').val();
      plugin.Id = $('#'+sidebarid).find('#'+id).find('input[name=pluginid]').val();
      alert(plugin.Id);
      plugin.Title = $('#'+sidebarid).find('#'+id).find('input[name=title]').val(); 
      $.ajax({
            url: "plugins.php?delete=1",
            type: "post",
            data: ({plugin_array:plugin}),
            error: function(){
            alert("Theres an error with AJAX");
            },
            success:function(response){
            alert(response);
            }
            });
      }
      
      function AddSidebarPlugins(sidebarid, id, order){
      
      var plugin = new Object();
      plugin.Sidebarid = sidebarid;
      plugin.Name = $('#'+sidebarid).find('#'+id).find('input[name=pluginname]').val();
      plugin.Id = $('#'+sidebarid).find('#'+id).find('input[name=pluginid]').val();
      plugin.Order = order;
      plugin.Title = $('#'+sidebarid).find('#'+id).find('input[name=title]').val(); 
      
      
      $.ajax({
            url: "plugins.php?update=0",
            type: "post",
            data: ({plugin_array:plugin}),
            error: function(){
            alert("Theres an error with AJAX");
            },
            success:function(response){
            alert(response);
            }
            });
      }
        
		  var sidebarPlugins =   $( ".widgets-sortables" ).sortable({
			//revert: true,
	   
      update:function(evetnt, ui){
      //alert($(this).attr("id"));
      //var item_count = $(this).find(".plugin-portlet").size();
      //if (receive == 1) {$(ui.item).attr("id",id+"_"+item_count);}
      
      //serial = jQuery('.widgets-sortables').sortable('serialize');
	    //jQuery('input[name=sortorder]').val(serial);
	    //alert(serial);
      },
      start: function(event, ui) {
      $(ui.item).find('.widget-inside').hide();
      receive = 0;
      del = 0;
      },
      stop:function(e, ui){
      /*      
      if (del == 1){
      //jQuery('input[name=pluginid]').val($(ui.item).attr("id"));
      
      //alert($(ui.item).attr("id"));
      //DeleteSidebarPlugin($(this).attr("id"));
      
      }
      */
      if (receive == 1) {
          var id = $(ui.item).find("input[name=pluginname]").val();
          var item_count = $(this).find(".plugin-portlet").size(); 
          $(ui.item).attr("id",id+"_"+item_count);
          $(ui.item).find('input[name=pluginid]').val($(ui.item).attr("id"));
          //plugin_array = jQuery('.widgets-sortables').sortable('toArray');
          //alert(jQuery('#'+ $(this).attr("id")).sortable('serialize'));
          //alert(ui.item.index());
          //jQuery('input[name=pluginid]').val($(ui.item).attr("id"));
          //id = $(ui.item).attr("id");
          AddSidebarPlugins($(this).attr("id"), $(ui.item).attr("id"), ui.item.index());
          updateSidebarPlugins($(this).attr("id"));
      } else { 
	   
      updateSidebarPlugins($(this).attr("id"));
      }},
      receive: function(e, ui) {
      sortableIn = 1; 
      receive = 1;
     
      $(this).find('.widget-inside').show();
      
      },
      over: function(e, ui) { sortableIn = 1; },
      out: function(e, ui) { sortableIn = 0;},
      beforeStop: function(e, ui) {
      if (sortableIn == 0) { 
         id = $(ui.item).attr("id");
         DeleteSidebarPlugin($(this).attr("id"), id);
         ui.item.remove();
         del = 1;
        
      } else $(this).find('.widget-inside').show(); }
      });
		  
      $( ".plugin-portlet" ).draggable({
			connectToSortable: ".widgets-sortables",
			helper: "clone"
		  //revert: "invalid"
		  });
		    
		  
     

		$( ".portlet, .plugin-portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".portlet-content" );

		/*
    $( ".portlet-header .ui-icon" ).live("click",function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".portlet:first, .plugin-portlet:first" ).find( ".portlet-content" ).toggle();
		});
		*/
		$(".sidebar-name-arrow").click(function(){
    $(this).parent().next().slideToggle();
		return false;
    }
    );
    
    /*
    $("body").each(function(){
      $('form[name=widgetoptionsform]', this).live('submit',function(e){
      e.preventDefault();
     
      var plugin = new Object();
      
      //plugin.Name = $(this).find('input[name=pluginname]').val();
      //plugin.Id = $(this).find('input[name=pluginid]').val();
      //plugin.Title = $(this).find('input[name=title]').val(); 
      
      //alert(plugin.Id);
      var sidebar = $(this).parent().parent().parent().parent().attr("id");
      
      var data = $(this).serialize();
      $.ajax({
            url: "plugins.php?updateoptions=1",
            type: "post",
            data: ({options:data, sidebarid:sidebar}),
            error: function(){
            alert("Theres an error with AJAX");
            },
            success:function(response){
            alert(response);
            }
            });
      
      
      return false;
      });
    
    })
    */
    
      //$(".pagetable tr:master").addClass("master");
      //$(".pagetable tr:not(.master)").hide();  
      //$(".pagetable tr:detail").hide();           
      //$(".pagetable tr:first-child").show();                        
      
      /*
      $(".pagetable thead th:eq(0)").toggle(
      function(){
         $(".arrow").toggleClass("up"); 
         $('.subtable_details').show();
      },
      function(){
        $('.subtable_details').hide();
         $(".arrow").toggleClass("up"); 
      }
      );
      *//*
       $(".cms_pages thead th:eq(0)").toggle(
      function(){
         $('.subtable_details').show();
         $(".locked").addClass("unlocked"); 
         $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
         this.checked = 1;
         var id = $(this).val();
        
        if ($(".cms_pages").hasClass("pages")) $.cookie('lockedtablerows['+id+']', true);
           if ($(".cms_pages").hasClass("news")) $.cookie('lockedtablerows_news['+id+']', true);
            if ($(".cms_pages").hasClass("newscategory")) $.cookie('lockedtablerows_newscategory['+id+']', true);
              if ($(".cms_pages").hasClass("pictures")) $.cookie('lockedtablerows_pictures['+id+']', true);
                if ($(".cms_pages").hasClass("gallery")) $.cookie('lockedtablerows_gallery['+id+']', true);
       alert($.cookie('lockedtablerows['+id+']')) ;
        })
      },
      function(){
         $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
         this.checked = 0;
         var id = $(this).val();
        
        if ($(".cms_pages").hasClass("pages")) $.cookie('lockedtablerows['+id+']', false);
         if ($(".cms_pages").hasClass("news")) $.cookie('lockedtablerows_news['+id+']', false);
          if ($(".cms_pages").hasClass("newscategory")) $.cookie('lockedtablerows_newscategory['+id+']', false);
            if ($(".cms_pages").hasClass("pictures")) $.cookie('lockedtablerows_pictures['+id+']', false);
              if ($(".cms_pages").hasClass("gallery")) $.cookie('lockedtablerows_gallery['+id+']', true);
         })
         $('.subtable_details').hide();
         $(".locked").removeClass("unlocked");
          
      }
      );
  
      $(".cms_pages tr.master td:nth-child(1)").click(function(){
      $(this).parent().find('.subtable_details').toggle();    
      $(this).find(".locked").toggleClass("unlocked");
      var status = $(this).find("input:checkbox").attr('checked');
      
      $(this).find("input:checkbox").attr('checked',!status);
      var id = $(this).find("input:checkbox").val();
           
      if ($(".cms_pages").hasClass("pages")) $.cookie('lockedtablerows['+id+']', !status);
       if ($(".cms_pages").hasClass("news")) $.cookie('lockedtablerows_news['+id+']', !status);
         if ($(".cms_pages").hasClass("newscategory")) $.cookie('lockedtablerows_newscategory['+id+']', !status);
          if ($(".cms_pages").hasClass("pictures")) $.cookie('lockedtablerows_pictures['+id+']', !status);
                   if ($(".cms_pages").hasClass("gallery")) $.cookie('lockedtablerows_gallery['+id+']', !status);
      
      }); 
      
  */    
      /*
      $(".pagetable tr.master td:nth-child(1)").click(function(){
      $(this).parent().find('.subtable_details').toggle();
      $(this).find(".arrow").toggleClass("up");
      }); 
      */
      
      
      $(".cms_pages thead tr th:eq(1) input:checkbox, .cms_pages tfoot tr th:eq(1) input:checkbox").click(function(){
      var checkedStatus = this.checked;
      $(".cms_pages tfoot tr th:eq(1) input:checkbox, .cms_pages thead tr th:eq(1) input:checkbox").attr('checked',  checkedStatus);
      
      $(".cms_pages tbody tr td:nth-child(2) input:checkbox ").each(function(){
      this.checked = checkedStatus;
      })
      });
      
      $(".cms_standard thead tr th:eq(0) input:checkbox, .cms_standard tfoot tr th:eq(0) input:checkbox").click(function(){
      var checkedStatus = this.checked;
     
      $(".cms_standard tfoot tr th:eq(0) input:checkbox, .cms_standard thead tr th:eq(0) input:checkbox").attr('checked',  checkedStatus);
      
      $(".cms_standard tbody tr td:nth-child(1) input:checkbox ").each(function(){
      this.checked = checkedStatus;
      })
      })
    
      
     
    
    
    
    
    
    $("a.select-all").toggle(
      function() {
            $("ul#pagechecklist li input:checkbox").each(function(){
      this.checked = 1;
      })},
      //return false;
      function() {
            $("ul#pagechecklist li input:checkbox").each(function(){
      this.checked = 0;
      })} 
    );
    
    
    $("a.delete").click(function(){
    $(".allForms").submit();
    return false;
    })
    

    
    var currentForm;
    
    $("#dialog-confirm").dialog({
        resizable: false,
        autoOpen:false,
        modal: true,
        buttons: {
            'Usuń wszystko': function() {
                currentForm.submit();
            },
            'Anuluj': function() {
                $(this).dialog('close');
            }
        }
    });
    
    
    
    $('.allForms').submit(function(){
      currentForm = this;
     
      $('#dialog-confirm').dialog('open');
      return false;
    });   
    
    
    $("#dialog-confirm1").dialog({
        resizable: false,
        autoOpen:false,
        modal: true,
        buttons: {
            'Usuń wszystko': function() {
                $('#role-items-form').attr('action','index.php?module=security&action=deleteResource')
                
                currentForm.submit();
            },
            'Anuluj': function() {
                $(this).dialog('close');
            }
        }
    });
    
    $('#deleteResource').click(function(){
      currentForm = $('#role-items-form');
      $('#dialog-confirm1').dialog('open');
      return false;
    });
    
    
    $('#custom_link_form').submit(function(){
    link = $('input[name="custom-link-data[url]"]').val();
    title = $('input[name="custom-link-data[title]"]').val(); 
    //alert(link+' '+title);
    if (link=='http://' || (title.length==0)){
    $('input[name="custom-link-data[title]"]').val('Wpisz etykietę');
     $('input[name="custom-link-data[url]"]').val('http://tutaj wpisz adres strony');
    return false; 
    }
    else return true;
    
    });
          
    $( "#posttype-page" ).tabs();
    /*
    $("a.item-edit").click(function(){
    $(this).parent().parent().parent().parent().find("div.menu-item-settings").slideToggle('fast');
    });
    */
     if ($('ul.ui-sortable').length > 0){
      var nestedArray;
      $('ul.ui-sortable').nestedSortable({
			
      stop: function() {
      nestedArray = $('ul.ui-sortable').nestedSortable('toArray',{startDepthCount: 0});
      var serstring = '';
      for( index in nestedArray )
      {
      serstring += nestedArray[index]['item_id']+':'+nestedArray[index]['parent_id']+':'+nestedArray[index]['depth']+':'+nestedArray[index]['left']+':'+nestedArray[index]['right']+'|';
      }
      $('#menu-items-array').val(serstring);
      //alert(serstring);
      //var_dump(nestedArray);
      //var_dump(nestedArray[1]['id']);
      //document.getElementById("menu-items-array").value = serstring;
      //$("#menu-instructions").html(serstring);
      },	  
			
      forcePlaceholderSize: true,
      items: 'li',
			helper: 'clone',
			maxLevels: 3,
      listType:'ul',
			opacity: .6,
		  placeholder: 'placeholder',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div'
			
	});
     }  
		
/*		
      $("a[rel='colorbox']").colorbox({
      slideshow:true,
      previous: "&#171;&nbsp;",
      next:"&nbsp;&#187;",
      current:"zdjęcie {current} z {total}",
      close: "Zamknij",
      slideshowStart: "Start slide",
      slideshowStop : "Stop slide"
      });
    /*
    $('#menu-items-form').submit(function(){
      currentForm = this;
     
      currentForm.submit();
      return false;
    });  
    */
    
    
    
});