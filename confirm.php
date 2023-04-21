<?php 

    if(isset($_GET['status'])){
        //* check payment status
        if($_GET['status'] == 'cancelled'){
            // echo 'You cancel the payment';
            header('Location: index.php');
        }elseif($_GET['status'] == 'successful'){
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  
                ),
            ));
              
            $response = curl_exec($curl);
              
            curl_close($curl);
              
            $res = json_decode($response);
            if($res->status){
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                if($amountPaid >= $amountToPay){
                    echo "<script>  window.location='proceed' </script>";
                }else{
                    $err = true;
                    $show = true;
                    $_SESSION['success'] = false;
                    $errMsg = 'Fraud transaction detected, you paid lesser than what you were meant to.';
                    echo "<script>  window.location='form' </script>";
                }
            }else{
                $err = true;
                $show = true;
                $_SESSION['success'] = false;
                $errMsg = 'Can not process payment';
                echo "<script>  window.location='form' </script>";
            }
        }
    }
?>