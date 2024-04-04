<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="taxStatus">Tax Status:</label>
        <select name="taxStatus" id="taxStatus">
            <option value="TK0" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK0' ? 'selected' : ''; ?>>TK0</option>
            <option value="TK1" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK1' ? 'selected' : ''; ?>>TK1</option>
            <option value="TK2" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK2' ? 'selected' : ''; ?>>TK2</option>
            <option value="TK3" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK3' ? 'selected' : ''; ?>>TK3</option>
            <option value="K0" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K0' ? 'selected' : ''; ?>>K0</option>
            <option value="K1" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K1' ? 'selected' : ''; ?>>K1</option>
            <option value="K2" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K2' ? 'selected' : ''; ?>>K2</option>
            <option value="K3" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K3' ? 'selected' : ''; ?>>K3</option>
        </select>
        <br><br>
        <label for="salary">Salary:</label>
        <input type="text" name="salary" id="salary" required value="<?php echo isset($_POST['salary']) ? $_POST['salary'] : ''; ?>">
        <br><br>
        <label for="tax">TAX:</label>
        <input type="text" name="tax" id="tax" readonly value="<?php echo isset($_POST['tax']) ? $_POST['tax'] : ''; ?>">
        <br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $salary = $_POST["salary"];
        $taxStatus = $_POST["taxStatus"];
        $tax = 0;

        if($taxStatus == "TK0" || $taxStatus == "TK1" || $taxStatus == "K0"){
            if($salary <= 5400000){
                $tax = 0;
            }
            elseif($salary <= 5650000){
                $tax = $salary*0.0025;
                
            }
            elseif($salary <= 5950000){
                $tax = $salary*0.005;
            }
            elseif($salary <= 6300000){
                $tax = $salary*0.0075;
            }
            elseif($salary <= 6750000){
                $tax = $salary*0.01;
            }
            else{
                $tax = 0.02; 
            }
        }
        elseif($taxStatus == "TK2" || $taxStatus == "TK3" || $taxStatus == "K1" || $taxStatus == "K2"){
            if($salary <= 6200000){
                $tax = 0;
            }
            elseif($salary <= 6500000){
                $tax = $salary*0.025;
            }
            elseif($salary <= 6850000){
                $tax = $salary*0.005;
            }
            elseif($salary <= 7300000){
                $tax = $salary*0.0075;
            }
            elseif($salary <= 9200000){
                $tax = $salary*0.01;
            }
            else{
                $tax = 0.02; 
            }
        }
        elseif($taxStatus == "TK3"){
            if($salary <= 6600000){
                $tax = 0;
            }
            elseif($salary <= 6950000){
                $tax = $salary*0.025;
            }
            elseif($salary <= 7350000){
                $tax = $salary*0.005;
            }
            elseif($salary <= 7800000){
                $tax = $salary*0.0075;
            }
            elseif($salary <= 8850000){
                $tax = $salary*0.1;
            }
            else{
                $tax = 0.2; 
            }
        }

        $tax_rate = $tax; 
        echo '<script>document.getElementById("tax").value = "'.$tax_rate.'";</script>';
    }
    ?>
</body>
</html>
