<?php include('includes/header.php'); ?>

<?php 

    $request = [
        'tx_ref' => time(),
        'amount' => $_SESSION['amt'],
        'currency' => 'NGN',
        'payment_options' => 'card, ussd, account, banktransfer, mpesa, barter, nqr, credit',
        'redirect_url' => 'http://localhost/Form-and-Flutter-Wave-PHP/confirm',
        'customer' => [
            'email' => $_SESSION['email'],
            'name' => $_SESSION['name']
        ],
        'meta' => [
            'price' => $_SESSION['amt']
        ],
        'customizations' => [
            'title' => 'Student Payment',
            'description' => 'this is a payment for Student',
            'logo' => 'https://aportal.hic4u.com/assets/logo.png'
        ]
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $res = json_decode($response);
    

    if($res->status == 'success')
    {
        $link = $res->data->link;
        echo "<script>  window.location='$link';</script>";
    }
    else
    {
        echo 'We can not process your payment';
    }

?>
<?php include('includes/footer.php'); ?>