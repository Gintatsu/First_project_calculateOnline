<?php 
    $result="";
    $pheptinh ="";
    $a = "";
    $b = "";
    if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['pheptinh'])){
        $a = $_POST['a'];
        $b = $_POST['b'];
        $pheptinh = $_POST['pheptinh'];
        switch($pheptinh){
            case '+':{
                $result=$a+$b;
                break;
            }
            case '-':{
                $result=$a-$b;
                break;
            }
            case '/':{
                $result=$a/$b;
                break;
            }
            case '%':{
                $result=$a%$b;
                break;
            }
            case '*':{
                $result=$a*$b;
                break;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" style="css/text">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <form action="#" method="POST" class="form_get_info">
            <input style="display:none;" type="text" name="a" id="a" value="<?=$result?>">
            <input style="display:none;" type="text" name="b" id="b" value="">
            <input style="display:none;" type="text" name="pheptinh" id="pheptinh" value="<?=$pheptinh?>">
        </form>
        <div class="display">
            <div class="display_cal"><?php echo ''.$a.''.$pheptinh.''.$b.''?></div>
            <div class="display_result"><?=$result?></div>
        </div>
        <div class="interact">
            <div class="button" onclick="deleteall()">AC</div>
            <div class="button" onclick="setCal('/')">+/-</div>
            <div class="button" onclick="setCal('%')">%</div>
            <div class="button" onclick="setCal('/')">/</div><br>
            <div class="button" onclick="setValue(7)">7</div>
            <div class="button" onclick="setValue(8)">8</div>
            <div class="button" onclick="setValue(9)">9</div>
            <div class="button" onclick="setCal('*')">*</div>
            <div class="button" onclick="setValue(4)">4</div>
            <div class="button" onclick="setValue(5)">5</div>
            <div class="button" onclick="setValue(6)">6</div>
            <div class="button" onclick="setCal('-')">-</div>
            <div class="button" onclick="setValue(1)">1</div>
            <div class="button" onclick="setValue(2)">2</div>
            <div class="button" onclick="setValue(3)">3</div>
            <div class="button" onclick="setCal('+')">+</div>
            <div class="button button_0" onclick="setValue(0)">0</div>
            <div class="button" onclick="setValue('.')">.</div>
            <div class="button" onclick="submit(<?=$b?>)">=</div>
        </div>

        <script>
            var option = 1;
            function setValue(value){
                if(option==1){
                    $("#a").val($("#a").val()+value);
                    update();
                }
                else if(option==2){
                    $("#b").val($("#b").val()+value);
                    update();
                }
            }
            function setCal(value) {
                if($("#a").val()!=""){
                    $("#pheptinh").val(value);
                    option=2;
                    update();
                }
            }
            function update() {
                $(".display_cal").html($("#a").val()+$("#pheptinh").val()+$("#b").val());
            }
            function deleteall() {
                $("#a").val("");
                $("#b").val("");
                $("#pheptinh").val("");
                option=1;
                update();
                $(".display_result").html($("#result").val(0));
            }
            function submit(b){
                if($("#b").val()==""){
                    console.log("cc");  
                    $("#b").val(b);
                }
                $(".form_get_info").submit();   
                update();
            }
        </script>
    </div>
</body>
</html>