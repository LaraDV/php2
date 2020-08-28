<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <ul id = "goods">
        <?php include 'query.php';
        ?>
    </ul>
    <input id="more" value="loadmore" type="submit" />

    <script>
    
    $(document).ready(function(){
        var i=1;
        $("more").click(function(){
            i++;
            $.post("query.php", {more:i}, function(data){
                $("#goods").html(data);
            });
            return false;
        })
    })

</script>
</body>
</html>