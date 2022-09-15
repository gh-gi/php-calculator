<!DOCTYPE html>
<html lang="en">
<!-- head element for metadata-->    
<head>
    <meta charset="utf-8"/>
    <title>Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--CSS-->
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .calculatorContainer {
            max-width: 1248px;
            min-height: 100vh;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calculatorInner {
            flex: 0 1 500px;
            padding: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2); /* gives it a shadow */
            display: flex;
            flex-direction: column;
        }

        h1 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 26px;
        }

        h3 {
            margin-top: 5px;
        }
        
        form {
            padding-top: 40px;
            display: grid;
            grid-template-rows: 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr;

        }
        
        .form-field {
            grid-template-rows: 1fr;
            grid-template-columns: 1fr;
            display: flex; /* to center form field contents */
            flex-direction: column; /* to center form field contents */
            align-items: center; /* to center form field contents */
            justify-content: center; /* to center form field contents */
        }

        .equalsButton {
            grid-column: 1 / span 3; /* the first child will span 2 columns, beginning in row 1 */
            margin-top: 15px;
            display: flex; /* to center form field contents */
            align-items: center; /* to center form field contents */
            justify-content: center; /* to center form field contents */   
        }

        .equalsButton > input {
            padding: 5px;
        }

        /* to add padding around the submit and equals buttons text */
        input[type="submit"], input[type="reset"] {
            box-sizing: content-box;
            -webkit-box-sizing: content-box;
        }

        .result {
            display: block;
            background-color: white;
            height: 40px;
            border: 1px;
            border-radius: 10px;
            padding: 2px;
            text-align: center;
            font-size: 18px;
            border: 2px solid #f5f5f5;
        }

    </style>
</head>
<!-- body element for visible content -->
    <body>
        <!-- div for the elements contained within the calculator -->    
        <div class="calculatorContainer">
            <div class="calculatorInner">
                <h1>PHP Calculator</h1>
                <!-- form for the user input fields -->
                <form method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" > <!-- PHP opening and closing tags; PHP_SELF to make the form post data back to itself when user hits submit -->
                    <div class="form-field"> 
                        <label for="numberOne">Enter first number:</label><br>
                        <input class="number" type="number" id="numberOne" name="numberOne" required> <!-- Class for CSS puroposes only. Input type 'number' so that only numerical values are allowed. Name defined for php values. -->
                    </div>
                    <div class="form-field">
                        <label for="selectBtn">Choose operator:</label><br>
                        <select id="selectBtn" name="selectFunction">
                            <option value="">Select</option>
                            <option value="add">Add</option>
                            <option value="subtract">Subtract</option>
                            <option value="multiply">Multiplied by</option>
                            <option value="divide">Divided by</option>
                        </select> 
                    </div>
                    <div class="form-field">
                        <label for="numberTwo">Enter second number:</label><br>
                        <input class="number" type="number" id="numberTwo" name="numberTwo" required>
                    </div>
                    <div class="equalsButton">
                        <input class="equals" type="submit" name="submit" value="Equals">
                    </div>
                </form>
                <h3>Result</h3>
                    <!-- div for outputs from the user inputs-->
                    <div class="result">    
                
                    <?php
                        # if statement for when a user clicks submit on the form.
                        if(isset($_POST["submit"])){
                            # if addition is selected
                            if($_POST["selectFunction"] == "add") {
                                $numberOne=$_POST["numberOne"];
                                $numberTwo=$_POST["numberTwo"];
                                $sum=$numberOne+$numberTwo;
                                echo $sum;
                            }
                            
                            # if subtraction is selected
                            if($_POST["selectFunction"] == "subtract") {
                                $numberOne=$_POST["numberOne"];
                                $numberTwo=$_POST["numberTwo"];
                                $sum=$numberOne-$numberTwo;
                                echo $sum;
                            }

                            # if multiplication is selected
                            if($_POST["selectFunction"] == "multiply") {
                                $numberOne=$_POST["numberOne"];
                                $numberTwo=$_POST["numberTwo"];
                                $sum=$numberOne*$numberTwo;
                                echo $sum;
                            }

                            # if division is selected
                            if($_POST["selectFunction"] == "divide") {
                                $numberOne=$_POST["numberOne"];
                                $numberTwo=$_POST["numberTwo"];
                                $sum=$numberOne/$numberTwo;
                                echo $sum;
                            }

                            # if a function isn't selected
                            elseif ($_POST["selectFunction"] == "") {
                                echo ("Please select a function.");
                            }
                        }
                    ?>
                </div> <!--end div result-->
            </div> <!--end calculatorInner -->
        </div> <!--end calculatorContainer --->
    </body>
</html>