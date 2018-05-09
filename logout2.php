 <?php
 
        session_start();
                    session_unset();
            session_destroy();
        
            header("location:index.php");

        $message = "Logout succeeded";
        echo "<script type='text/javascript'>alert('$message');</script>";



            
            ?>