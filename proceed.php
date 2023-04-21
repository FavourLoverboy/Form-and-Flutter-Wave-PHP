<?php include('includes/header.php'); ?>
<?php
    $_SESSION['credentials_basename'] = $_SESSION['passport_basename'];
    $tblquery = "INSERT INTO users VALUES(:id, :fname, :mname, :lname, :dob, :gender, :nationality, :phone_number,:email, :mos, :ads, :city, :state, :country, :daf, :cos, :passport, :credentials, :referral, :dates)";
    $tblvalue = array(
        ':id' => NULL, 
        ':fname' => $_SESSION['fname'], 
        ':mname' => $_SESSION['mname'], 
        ':lname' => $_SESSION['lname'],
        ':dob' => $_SESSION['dob'],
        ':gender' => $_SESSION['gender'],
        ':nationality' => $_SESSION['nationality'],
        ':phone_number' => $_SESSION['number'],
        ':email' => $_SESSION['email'],
        ':mos' => $_SESSION['mos'],
        ':ads' => $_SESSION['address'],
        ':city' => $_SESSION['city'],
        ':state' => $_SESSION['state'],
        ':country' => $_SESSION['country'],
        ':daf' => $_SESSION['daf'],
        ':cos' => $_SESSION['cos'],
        ':passport' => $_SESSION['passport_basename'],
        ':credentials' => $_SESSION['credentials_basename'],
        ':referral' => $_SESSION['referral'],
        ':dates' => date('Y-m-d h:i:s')
    );
    $insert = $collect->tbl_insert($tblquery, $tblvalue);
    if($insert){
        $_SESSION['success'] = true;
        echo "<script>  window.location='form' </script>";
    }

?>
<?php include('includes/footer.php'); ?>