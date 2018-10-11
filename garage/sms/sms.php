<?php 


if (isset($_GET['token'])  and isset($_GET['message']) and isset($_GET['tel']) and isset($_GET['ltd']) and isset($_GET['req'])):

    $token = $_GET['token'];
    $message = $_GET['message'];
    $tel = $_GET['tel'];
    $ltd = $_GET['ltd'];
    $req = $_GET['req'];

    if ($token === ''):

        shell_exec('echo "'.$message.'" | gammu-smsd-inject TEXT '.$tel.'');

        header('location: '.$ltd.'/'.$req);

    endif;
endif;