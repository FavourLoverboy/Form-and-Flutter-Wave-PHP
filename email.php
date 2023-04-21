<?php include('includes/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>PERSONAL INFORMATION</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>FULL NAME</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['name']; ?></td>
                        </tr>
                        <tr>
                            <th>DATE OF BIRTH</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['dob']; ?></td>
                        </tr>
                        <tr>
                            <th>GENDER</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['gender']; ?></td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['nationality']; ?></td>
                        </tr>
                        <tr>
                            <th>PHONE NUMBER</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['number']; ?></td>
                        </tr>
                        <tr>
                            <th>EMAIL</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['email']; ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <th>CONTACT ADDRESS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_SESSION['address']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['city']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['state']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['country']; ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <th>STUDY INFORMATION</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>DEGREE AIMED FOR</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['daf']; ?></td>
                        </tr>
                        <tr>
                            <th>COURSE APPLIED FOR</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['cos']; ?></td>
                        </tr>
                        <tr>
                            <th>METHOD OF STUDY</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['mos']; ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <th>UPLOAD CREDENTIALS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>PASSPORT PHOTOGRAPH</th>
                        </tr>
                        <tr>
                            <td><?php echo $_SESSION['passport_basename']; ?></td>
                        </tr>
                        <tr>
                            <th>OTHER CREDENTIALS</th>
                        </tr>
                        <tr>
                            <?php
                            
                                // $credentials = explode(",00,", $_SESSION['credentials']);
                                $don = '147,--,house,00,147,--,mouse,00,147,--,pouse,00,147,--,douse,00,147,--,zouse';
                                $credentials = explode(",00,", $don);
                                foreach($credentials as $data){
                                    $new_cre = explode(",--,", $data);
                                    echo "
                                        <tr>
                                            <td>$new_cre[1]</td>
                                        </tr>
                                    ";
                                }
                            
                            ?>
                        </tr>
                    </tbody>
                    <thead>
                        <th>WHO INTRODUCED YOU TO ESTAM UNIVERSITY, AKPAKPA CAMPUS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_SESSION['referral']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>