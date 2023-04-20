<?php include('includes/header.php'); ?>
    <div class="container">
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="header">
                    <h1 class="p-5 text-center">Form Details</h1>
                </div>

                <div class="row form-box">
                    <label class="box-title">Student Name <span class="text-danger">*</span></label>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="fname" name="fname">
                        <label for="fname" class="form-label">First Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="mname" name="mname">
                        <label for="mname" class="form-label">Middle Name</label>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lname" name="lname">
                        <label for="lname" class="form-label">Last Name</label>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Date of Birth <span class="text-danger">*</span></label>
                        
                        <input type="date" class="form-control" id="dob" name="dob">
                        <label for="dob" class="form-label">Date</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Gender <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="gender">
                            <option value="">Please Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Nationality <span class="text-danger">*</span></label>

                        <select class="form-control" name="nationality">
                            <?php include('includes/countries.php'); ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="box-title">Phone Number <span class="text-danger">*</span></label>
                        
                        <input type="text" class="form-control" name="number">
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Email <span class="text-danger">*</span></label>
                        
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="email" class="form-label">example@example.com</label>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Mode of Study <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="mos">
                            <option value="">Please Select</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                        </select>
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Address <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="email" class="form-control" id="address" name="address">
                        <label for="address" class="form-label">Street Address</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" name="city">
                        <label for="city" class="form-label">City</label>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="State/Province" name="state">
                        <label for="State/Province" class="form-label">State / Province</label>
                    </div>

                    <div class="col-md-12">
                        <select class="form-dropdown form-control" id="country" name="country">
                            <?php include('includes/countries.php'); ?>
                        </select>
                        <label for="country" class="form-label">Country</label>
                    </div>
                </div>

                <div class="row form-box">
                    <div class="col-md-6">
                        <label class="box-title">Degree Aimed For <span class="text-danger">*</span></label>
                        
                        <select class="form-control" name="daf">
                            <?php include('includes/degree.php'); ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="box-title">Course of Study <span class="text-danger">*</span></label>

                        <select class="form-dropdown form-control" name="cos">
                            <?php include('includes/courses.php'); ?>
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
                        <input type="file" class="form-control" id="upload" name="credential[]">
                        <label for="upload" class="form-label">WAEC RESULT, LGA IDENTIFICATION, BIRTH CERTIFICATE/AGE DECLARATION</label>
                    </div>
                </div>

                <div class="row form-box">
                    <label class="box-title">Who introduced you to Estam University Akpakpa Campus? <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="referral">
                    </div>
                </div>

                <div class="footer text-center">
                    <input type="submit" class="m-5 text-center btn btn-success" value="PROCEED TO PAYMENT">
                </div>
            </form>
        </div>
    </div>
<?php include('includes/header.php'); ?>