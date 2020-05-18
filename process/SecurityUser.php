<?php
if (!$_SESSION['UserPrivilege']=='') {
    
}  else {
    header("Location: process/logout.php");
    exit();
}
