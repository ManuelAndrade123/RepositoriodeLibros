<?php
if ($_SESSION['UserPrivilege']=='Admin') {
    
}  else {
    header("Location: ../process/logout.php");
    exit();
}

