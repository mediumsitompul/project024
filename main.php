<?php
$return["datajs"] = array();
  $db = "db_shopping";
  $host = "192.168.100.100:6607";
  $db_user = 'pqr';
  $db_password = 'passwordxxx';
  $link = mysqli_connect($host, $db_user, $db_password, $db);
  if(isset($_REQUEST["auth"]))
  {

    $authkey = $_REQUEST["auth"];

    if($authkey == "kjgdkhdfldfguttedfgr")
    {
        $json["datajs"] = array();
        $sql = "SELECT idx, name, item, pic_, price_, datetime_ FROM t_goods_list";
        $res = mysqli_query($link, $sql);
        $numrows = mysqli_num_rows($res);

        while($array = mysqli_fetch_assoc($res))
        {
          array_push($return["datajs"], $array);
        }
        mysqli_close($link);
        header('Content-Type: application/json');}
        else
        {
        $return["error"] = true;
        $return["msg"] = "Authentication error.";}
        }
        else{
        $return["error"]  = true;
        $return["msg"] = "Send auth key.";}

    header('Content-Type: application/json');
    echo json_encode($return);
    ?>
