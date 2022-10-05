<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link type="text/css" rel="stylesheet" href="styles/form.css" />
</head>

<div id="processing_input">
    <?php
    /*
    these three variables will be used
    as the default HTML input value attribute 

    https://www.youtube.com/watch?v=fMTvi3Rys-o&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=23

    they may end up being empty strings (no default value) 
    -or- 
    the cookie data as an input value (value='cookieData')
    */
    $firstName = "";	//store the cookie firstName
    $lastName = "";		//store the cookie lastName
    $clientEmail = ""; //store the cookie's email
    $rememberMe = "";	//if there is a cookie, pre-check the remember me box
                        //this variable may be a 
                        //	checked='checked'
                        // or an empty string
    /*
    if a cookie exists, load cookie data
    into page variables and use them to 
    pre populate the form
    */

    if(isset($_COOKIE['userinfo'])){
        //get cookie data
        $cookieData = $_COOKIE['userinfo'];
        //split the comma delimited string
        $arrayOfCookieData = explode(",",$cookieData);
        
        /*
        assign cookie data to variables
        we can use the numeric indeces 
        as long as we know what order the
        comma delimited string was built in
        firstName,lastName,email
        */
        $firstName = "value='".$arrayOfCookieData[1]."'"; 
        $lastName = "value='".$arrayOfCookieData[2]."'";
        $clientEmail = "value='".$arrayOfCookieData[3]."'";
        $hostEmail = "dickens.leung@outlook.com";
        $rememberMe = "checked='checked'";
    }
    ?>
</div>

<div id="processing_output">
    <?php
        /*storing client's first and last name in fullName */
        $fullName = $firstName + $lastName; 

        if(isset($_POST['submit'])){
            $mailFrom = $clientEmail;
            $mailTo = $hostEmail;
            $headers = "From: ".$mailFrom;
            $txt = "You have received an e-mail from".$name.". \n\n.$message"; 

            mail($mailTo, $text, $headers);
            header("Location: index.html?mailsend");
        }

        $linkToForm = "<p><a href='form.php' style='color:white'>Try the form again...</a></p>";
        $formIsValid = true;
        $validationMessages = "";


        /* first test each field to ensurethere is some data...*/
        if( !isset($_POST['firstname']) || $_POST['firstname'] == "" ){
            $validationMessages .= "Please fill out the firstname.<br />";
            $formIsValid = false;
        }
        if( !isset($_POST['lastname']) || $_POST['lastname'] == "" ){
            $validationMessages .= "You need to fill out the lastname.<br />";
            $formIsValid = false;
        }

        if( !isset($_POST['clientemail']) || $_POST['clientemail'] == "" ){
            $validationMessages .= "You need to fill out the email address.<br />";
            $formIsValid = false;
        }

        /*
        now perform more detailed validation
        */

        /*
        make the final test to determine what should happen
        if form is invalid, display error messages and stop processing
        */
        if(!$formIsValid){
            echo $validationMessages;
            echo $linkToForm;
            die(); //terminate the application
        }
        /*
        --------------------------------------------------------------------------
        if the script makes it this far without forwarding back to the form,
        all data is OK and its time to 
        -set cookie
        -output results
        */
        /*
        determine if a cookie should be created
        */
        if(isset($_POST['remember'])){
            	/*
                they want to be remembered,
                build a comma delimited string of cookie information
                */

                $cookieInfo = $_POST['clientemail'] . 
                "," . $_POST['firstname'] . 
                "," .$_POST['lastname'];
                //set cookie to live for one week
                setcookie("userinfo", $cookieInfo, time()+60*60*24*7);
                echo "<p>Your information will be remembered</p>";
        }else{
            //they dont want to be remembered,
            //delete cookie
            setcookie("userinfo", "", time()-1);	
            echo "<p>Your information will NOT be remembered</p>";
        }
        /*
        output an appropriate thank you to the user
        */
        echo "<h2>Marvelous!</h2><p>You have successfuly submitted the form. Thank you!</p>";

        //provide a link that will take the user back to the form
        echo $linkToForm;




    ?>
</div>

</html>