<?php
function select_options($selected = array()){
    $output = '';
    foreach(json_decode(file_get_contents('names.json'), true) as $item){
        $output.= '<option value="' . $item['value'] . '"' . (in_array($item['value'], $selected) ? ' selected' : '') . '>' . $item['text'] . '</option>';
    }
    return $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Tokenize2 demo</title>
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../tokenize2.css" rel="stylesheet" />
    <script src="../tokenize2.js"></script>
    <link href="demo.css" rel="stylesheet" />
</head>
<body> 
    <div class="container"> 
        <div class="row">

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Default usage</h2>
                    </div>
                    <div class="panel-body">
                        <select class="tokenize-sample-demo1" multiple>
                            <?php echo select_options() ?>
                        </select>
                    </div>
                </div>
            </div> 
        </div>
          

        <script>
            $('.tokenize-sample-demo1').tokenize2(); 
        </script>

    </div>

</body>
</html>