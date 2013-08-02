{php}

//print_r($vars['page']);
$form = new Form('categoryform');
$form->setAttributes(
    array(
    "width"=>'950px',
    "action" => '',
    "preventJQueryUILoad"=>0,
    "preventDefaultCSS"=>0,
    "map"=>array(2,3,1,1)
      
 ));
$form->addButton('Zapisz','submit',array("name"=>"category_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"category_save_close"));
$form->addButton('Anuluj','button',array("name"=>"category_cancel","onclick" =>"window.location.href = '".BASEURL."admin/news/category';"));



$form->addDate('data','data','',array("tooltip"=>"jakis tekst"));
$form->render();
{/php}