<?php

    if (isset($_GET['function'])=='logout')
    {
        session_unset();
        header("Location: index.php"); 
        
    }


?>