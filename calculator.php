<link rel='stylesheet' type='text/css' href='styles.css'>
<div class='main'>
<h1><p style='text-align:center'>calculator</p></h1>

    <div class='main2'>
    <!-- CALCULATOR FORM START -->
    <form method='post'>
        First number:<br>
        <input name='number1' type='text' value='<?php echo htmlspecialchars($_POST['number1'] ?? '', ENT_QUOTES); ?>'><br>
        Second number:<br>
        <input name='number2' type='text' value='<?php echo htmlspecialchars($_POST['number2'] ?? '', ENT_QUOTES); ?>'><br>
        Operator:<br>
        <input type='radio' id='add' name='operator' value='1'>
        <label for='add'>Addition+</label><br>
        <input type='radio' id='sub' name='operator' value='2'>
        <label for='sub'>Subtraction-</label><br>
        <input type='radio' id='mul' name='operator' value='3'>
        <label for='mul'>Multiplication*</label><br>
        <input type='radio' id='div' name='operator' value='4'>
        <label for='div'>Division/</label><br>
        <p><input type='submit' name='submit' value='Submit'><br>
        <input type='reset' name='unset' value='Reset'></p>
    </form>

<?php
    #if Submit button has been clicked
    if(isset($_POST['submit'])){

        $number1=$_POST['number1'];
        $number2=$_POST['number2'];
        
        #check if either one numbers contains letter(s) or has a negative number
        if(preg_match('/[A-Za-z]/',$number1)or($number1<=0)||preg_match('/[A-Za-z]/',$number2)or($number2<=0)){
            echo"You used letter(s) or negative number(s).";
        }else{
            #check if operator got chosen
            if(isset($_POST['operator'])){
                
                $i=$_POST['operator'];

                #check which operator got chosen
                switch($i){
                    case 1:
                        $result=$number1+$number2;
                        echo"$number1 + $number2 = <b>",$result;
                    break;
                    case 2:
                        $result=$number1-$number2;
                        echo"$number1 - $number2 = <b>",$result;
                    break;
                    case 3:
                        $result=$number1*$number2;
                        echo"$number1 * $number2 = <b>",$result;
                    break;
                    case 4:
                        $result=$number1/$number2;
                        echo"$number1 / $number2 = <b>",$result;
                        echo"</b><br>Rounded up: <b>",ceil($result);
                    break;
                }

            }else{
                echo"Pick an operator.";
            }

        }

    }

?>
    
    </div>
</div>