<?php

    //get values
    $b = $_GET['b'];
    $q = $_GET['q'];

    //database connection
    include ('new_db_con.php');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"currency_db");

    //stock query
    $sql="SELECT bh_code,fc_cy,sum(fc_amt) as fcamt from vw_fc_transaction where fc_cy='".$q."' and bh_code='".$b."' group by fc_cy;";
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);
    if($row == null)
    {
        $row = array("error1" => "1");
    }

    //rate query
    $sql2="SELECT * FROM currency_rates where active='1' AND to_cy='".$q."' ORDER BY sr_no DESC";
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_array($result2);
    if($row2 == null)
    {
        $row2 = array("error2" => "1");
    }

    //avg exchange rate
    $sql3="SELECT bh_code,fc_cy,sum(omr_amt)/sum(fc_amt) as avg_x from vw_fc_transaction where '".$q."' and  tr_type='0' and bh_code='".$b."' group by fc_cy";
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_array($result3);
    if($row3 == null)
    {
        $row3 = array("error3" => "1");
    }

    $res = array_merge($row, $row2, $row3);
    echo json_encode($res);
    mysqli_close($con);





?>