<?php include('includes/header.php'); ?>
    <?php 

        function processImage($extension, $size, $basename, $source){
            $pictureAllowed = array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'webp', 'WEBP', 'jfif', 'JFIF');

            // checking file extention
            if(!in_array($extension, $pictureAllowed)){
                return 'Invalid Ext';
            }
            
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

        $filename   = "pp-" . uniqid();
        $size = $_FILES['passport']['size'];
        $extension  = pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION);
        $basename   = $filename . "." . $extension;
        $source     = $_FILES['passport']['tmp_name'];

        $feedback = processImage($extension, $size, $basename, $source);
        echo 'feedback ' . $feedback . '<br/>';


        foreach($_FILES['credential']['tmp_name'] as $key => $value){
            $filename   = "cre-" . uniqid();
            $size = $_FILES['credential']['size'][$key];
            $extension  = pathinfo($_FILES['credential']['name'][$key], PATHINFO_EXTENSION);
            $basename   = $filename . "." . $extension;
            $source     = $_FILES['credential']['tmp_name'][$key];
            
            if($extension){
                $err = processImage($extension, $size, $basename, $source);
                echo 'Multiple Image ' . $err . '<br>';
            }else{
                // $err = 'at least one file is required';
            }
        }

        if($_POST){
            extract($_POST);
            echo 'First name ' . $fname . '<br/>';
            echo 'Middle name ' . $mname . '<br/>';
            echo 'Last name ' . $lname . '<br/>';
            echo 'Date of Birth ' . $dob . '<br/>';
            echo 'Gender ' . $gender . '<br/>';
            echo 'Nationality ' . $nationality . '<br/>';
            echo 'Number ' . $number . '<br/>';
            echo 'Email ' . $email . '<br/>';
            echo 'Mode of Study ' . $mos . '<br/>';
            echo 'Address ' . $address . '<br/>';
            echo 'City ' . $city . '<br/>';
            echo 'State ' . $state . '<br/>';
            echo 'Country ' . $country . '<br/>';
            echo 'Degree Aimed For ' . $daf . '<br/>';
            echo 'Course of Study ' . $cos . '<br/>';
            echo 'Referral ' . $referral . '<br/>';
            echo 'Image Name ' . $filename . '<br/>';
            echo 'Image Size ' . $size . '<br/>';
            echo 'Image Extension ' . $extension . '<br/>';
            echo 'Image BaseName ' . $basename . '<br/>';
            echo 'Image Source ' . $source . '<br/>';
        }

    ?>
    <div class="container">
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="header">
                    <h1 class="p-5 text-center">Form Details</h1>
                </div>

                <div class="row form-box">
                    <label class="box-title">Student Name <span class="text-danger">*</span></label>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>">
                        <label for="fname" class="form-label">First Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $mname; ?>">
                        <label for="mname" class="form-label">Middle Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>">
                        <label for="lname" class="form-label">Last Name</label>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Date of Birth <span class="text-danger">*</span></label>
                        
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                        <label for="dob" class="form-label">Date</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Gender <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="gender">
                            <?php
                                if($gender){
                                    echo "
                                        <option value='$gender'>$gender</option>
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
                                if($nationality){
                                    echo "
                                        <option value='$nationality'>$nationality</option>
                                    ";
                                }
                                include('includes/countries.php');
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="box-title">Phone Number <span class="text-danger">*</span></label>
                        
                        <input type="text" class="form-control" name="number" value="<?php echo $number; ?>">
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Email <span class="text-danger">*</span></label>
                        
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        <label for="email" class="form-label">example@example.com</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Mode of Study <span class="text-danger">*</span></label>

                        <select class="form-control" name="mos">
                            <?php
                                if($mos){
                                    echo "
                                        <option value='$mos'>$mos</option>
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
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                        <label for="address" class="form-label">Street Address</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>">
                        <label for="city" class="form-label">City</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="State/Province" name="state" value="<?php echo $state; ?>">
                        <label for="State/Province" class="form-label">State / Province</label>
                    </div>

                    <div class="col-md-12">
                        <select class="form-dropdown form-control" id="country" name="country">
                            <?php
                                if($country){
                                    echo "
                                        <option value='$country'>$country</option>
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
                                if($daf){
                                    echo "
                                        <option value='$daf'>$daf</option>
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
                                if($cos){
                                    echo "
                                        <option value='$cos'>$cos</option>
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
                        <input type="text" class="form-control" name="referral" value="<?php echo $referral; ?>">
                    </div>
                </div>

                <div class="footer text-center">
                    <input type="submit" class="m-5 text-center btn btn-success" value="PROCEED TO PAYMENT">
                </div>
            </form>
        </div>
    </div>
<?php include('includes/header.php'); ?>