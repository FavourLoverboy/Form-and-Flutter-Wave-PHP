<?php include('includes/header.php'); ?>
    <?php 

        if($_POST){
            $_SESSION['err'] = false;
            $type = "danger";
            // Process Image Function
            function processImage($extension, $size, $basename, $source){
                $pictureAllowed = array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'webp', 'WEBP', 'jfif', 'JFIF');

                // checking file extension
                if(!in_array($extension, $pictureAllowed)){
                    return 'Invalid Ext';
                }
                
                // checking file size
                if(!($size <= 1048576 * 2)){
                    return 'Image too large';
                    // if(!is_dir("../pics/$this->my_id/chat")){
                    //     mkdir("../pics/$this->my_id/chat", 0777, true);
                    // }
                    // $destination = "../pics/$this->my_id/chat/" . $basename;
                    // if(move_uploaded_file($source, $destination)){
                    //     $this->allFiles .= "$this->my_id/chat/" . $basename . ',' . $type . ',-';
                    // }
                }
                return 'Valid';
            }
            
            // passport Image Properties
            $filename            = "pp-" . uniqid();
            $size                = $_FILES['passport']['size'];
            $extension           = pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION);
            $basename_passport   = $filename . "." . $extension;
            $source_passport     = $_FILES['passport']['tmp_name'];

            $passportPhoto = processImage($extension, $size, $basename_passport, $source_passport);
            if($passportPhoto != "Valid"){
                $_SESSION['err'] = true;
                if($passportPhoto == 'Invalid Ext'){
                    $_SESSION['errMsg'] = 'Invalid Passport Extension';
                }else{
                    $_SESSION['errMsg'] = 'Passport file too large';
                }
            }

            // Multiple Images / Credentials
            $_SESSION['credentials'] = "";
            if(!$_SESSION['err']){
                foreach($_FILES['credential']['tmp_name'] as $key => $value){
                    $filename   = "cre-" . uniqid();
                    $size       = $_FILES['credential']['size'][$key];
                    $extension  = pathinfo($_FILES['credential']['name'][$key], PATHINFO_EXTENSION);
                    $basename   = $filename . "." . $extension;
                    $source     = $_FILES['credential']['tmp_name'][$key];
                    
                    if($extension){
                        $credentials = processImage($extension, $size, $basename, $source);
                        if($credentials == "Valid"){
                            $_SESSION['credentials'] .= $source . ',--,' . $basename . ',00,';
                        }else{
                            $_SESSION['err'] = true;
                            if($credentials == 'Invalid Ext'){
                                $_SESSION['errMsg'] = 'Invalid Credential Extension';
                            }else{
                                $_SESSION['errMsg'] = 'Credential file too large';
                            }
                            break;
                        }
                    }
                }
                $_SESSION['credentials'] = rtrim($_SESSION['credentials'], ",00,");
            }

            
            extract($_POST);
            $_SESSION['show'] = true;
            $_SESSION['fname']              = htmlspecialchars(ucfirst($fname));
            $_SESSION['mname']              = htmlspecialchars(ucfirst($mname));
            $_SESSION['lname']              = htmlspecialchars(ucfirst($lname));
            $_SESSION['dob']                = htmlspecialchars($dob);
            $_SESSION['gender']             = htmlspecialchars($gender);
            $_SESSION['nationality']        = htmlspecialchars($nationality);
            $_SESSION['number']             = htmlspecialchars($number);
            $_SESSION['email']              = htmlspecialchars(lcfirst($email));
            $_SESSION['mos']                = htmlspecialchars($mos);
            $_SESSION['address']            = htmlspecialchars(ucfirst($address));
            $_SESSION['city']               = htmlspecialchars(ucfirst($city));
            $_SESSION['state']              = htmlspecialchars(ucfirst($state));
            $_SESSION['country']            = htmlspecialchars($country);
            $_SESSION['daf']                = htmlspecialchars($daf);
            $_SESSION['cos']                = htmlspecialchars($cos);
            $_SESSION['referral']           = htmlspecialchars(ucfirst($referral));
            $_SESSION['passport_basename']  = $basename_passport;
            $_SESSION['passport_source']    = $source_passport;

            // payment amount
            $_SESSION['amt'] = 5000;
            $_SESSION['name'] = $_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['lname'];

            if(!$_SESSION['err']){
                echo "<script>  window.location='payment' </script>";
            }
        }

    ?>
    <div class="container">
        <?php 
        
            if($_SESSION['show'] AND $_SESSION['err'] AND !($_SESSION['success'])){
                $type = 'danger';
                echo "
                    <div id='liveAlertPlaceholder'>
                        <div class='alert alert-$type alert-dismissible' role='alert'>
                            $_SESSION[errMsg]
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                ";
            }else if($_SESSION['success']){
                $type = 'success';
                $_SESSION['errMsg'] = 'Complete';
                echo "
                    <div id='liveAlertPlaceholder'>
                        <div class='alert alert-$type alert-dismissible' role='alert'>
                            $_SESSION[errMsg]
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                ";
            }
        
        ?>
        
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="header">
                    <h1 class="p-5 text-center">Form Details</h1>
                </div>

                <div class="row form-box">
                    <label class="box-title">Student Name <span class="text-danger">*</span></label>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $_SESSION['fname']; ?>">
                        <label for="fname" class="form-label">First Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $_SESSION['mname']; ?>">
                        <label for="mname" class="form-label">Middle Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $_SESSION['lname']; ?>">
                        <label for="lname" class="form-label">Last Name</label>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Date of Birth <span class="text-danger">*</span></label>
                        
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $_SESSION['dob']; ?>">
                        <label for="dob" class="form-label">Date</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Gender <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="gender">
                            <?php
                                if($_SESSION['gender']){
                                    echo "
                                        <option value='$_SESSION[gender]'>$_SESSION[gender]</option>
                                    ";
                                }else{
                                    echo "
                                        <option value=''>Please Select</option>
                                    ";
                                }
                            ?>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Nationality <span class="text-danger">*</span></label>

                        <select class="form-control" name="nationality">
                            <?php
                                if($_SESSION['nationality']){
                                    echo "
                                        <option value='$_SESSION[nationality]'>$_SESSION[nationality]</option>
                                    ";
                                }
                                include('includes/countries.php');
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="box-title">Phone Number <span class="text-danger">*</span></label>
                        
                        <input type="text" class="form-control" name="number" value="<?php echo $_SESSION['number']; ?>">
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Email <span class="text-danger">*</span></label>
                        
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                        <label for="email" class="form-label">example@example.com</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Mode of Study <span class="text-danger">*</span></label>

                        <select class="form-control" name="mos">
                            <?php
                                if($_SESSION['mos']){
                                    echo "
                                        <option value='$_SESSION[mos]'>$_SESSION[mos]</option>
                                    ";
                                }else{
                                    echo "
                                        <option value=''>Please Select</option>
                                    ";
                                }
                            ?>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                        </select>
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Address <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['address']; ?>">
                        <label for="address" class="form-label">Street Address</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $_SESSION['city']; ?>">
                        <label for="city" class="form-label">City</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="State/Province" name="state" value="<?php echo $_SESSION['state']; ?>">
                        <label for="State/Province" class="form-label">State / Province</label>
                    </div>

                    <div class="col-md-12">
                        <select class="form-dropdown form-control" id="country" name="country">
                            <?php
                                if($_SESSION['country']){
                                    echo "
                                        <option value='$_SESSION[country]'>$_SESSION[country]</option>
                                    ";
                                }
                                include('includes/countries.php');
                            ?>
                        </select>
                        <label for="country" class="form-label">Country</label>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Degree Aimed For <span class="text-danger">*</span></label>
                        
                        <select class="form-control" name="daf">
                            
                            <?php 
                                if($_SESSION['daf']){
                                    echo "
                                        <option value='$_SESSION[daf]'>$_SESSION[daf]</option>
                                    ";
                                }
                                include('includes/degree.php');
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Course of Study <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="cos">
                            <?php 
                                if($_SESSION['cos']){
                                    echo "
                                        <option value='$_SESSION[cos]'>$_SESSION[cos]</option>
                                    ";
                                }
                                include('includes/courses.php');
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Upload Passport Photograph <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="passport">
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Upload Credentials <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="upload" name="credential[]" multiple>
                        <label for="upload" class="form-label">WAEC RESULT, LGA IDENTIFICATION, BIRTH CERTIFICATE/AGE DECLARATION</label>
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Who introduced you to Estam University Akpakpa Campus? <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="referral" value="<?php echo $_SESSION['referral']; ?>">
                    </div>
                </div>

                <div class="footer text-center">
                    <input type="submit" class="m-5 text-center btn btn-success" value="PROCEED TO PAYMENT">
                </div>
            </form>
        </div>
    </div>
<?php include('includes/footer.php'); ?>