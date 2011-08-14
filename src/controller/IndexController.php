<?php

namespace Foodalizr\Controller;

use Knid\Http;

class IndexController
{
    public function indexAction(Http\Request $request, Http\Response $response)
    {
        $response->addHeader(new Http\Header('Content-Type', 'text/html; charset=utf-8'));
        $response->setContent('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Foodalizr</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/excite-bike/jquery-ui.css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="js/css.js"></script>
    
<script type="text/javascript">
$(function() {
    var mealAddDialog = $("#person-add-dialog").dialog({
        autoOpen : false,
        buttons: {
            "Hinzufügen" : function() {
                // $(this).find("form").submit();
                $.ajax({
                    type: "POST",
                    url: "' . dirname($request->getServer('SCRIPT_NAME')) . '/person/post",
                    data: {"name":"Max Mustermann"},
                    success: function(data) { console.log(data); },
                    dataType: "json"
                });
                { $(this).dialog("close") }
            }
        },
        modal : true,
        resizable : false
    });
    $(".person-add").click(function() {
        mealAddDialog.dialog("open");
    });
});
</script>
</head>
<body>

<p>
    <button class="add meal-add">Essen</button>
    <button class="add person-add">Person</button>
</p>

<div id="person-add-dialog" title="Person hinzufügen">
<form action="' . dirname($request->getServer('SCRIPT_NAME')) . '/person/post" method="post">
    <label for="person-name">Name</label>
    <input type="text" name="name" id="person-name" />
</form>
</div>


</body>
</html>');
        
        return $response;
    }
}
