<?php
    include "database.php";
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta namme="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>
<body class="body">
    <?php
        if(isset($_POST["sub"]))
        {   
            $sql="select * from faculty where email='{$_POST['email']}'";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {   
                $ro=$res->fetch_assoc();
                $to       = $ro["email"];
                $subject  = 'PASSWORD';
                $message  = $ro["password"];
                $headers  = 'From: librarycommercesf@cmscollege.ac.in' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';


                if(mail($to, $subject, $message, $headers))
                {
    
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL SENT</span></center>";
                }
                else
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL DID NOT SENT</span></center>";
                }
            }

    ?>

        <center><div class="search">
    <form action="" method="post">
        <br>
        <label><b>Enter Mail ID<b></label>
        <input type="text" class="input" placeholder="Enter your mail ID" name="email" size="50">
        <button type="submit" class="button" name="sub">GET</button>
    
    </form>

</div>
</center>
    

</body>
</html>