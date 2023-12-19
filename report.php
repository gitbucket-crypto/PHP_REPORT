<?php 
require_once('database.php');

function boostrap()
{
    if(!isset($_POST['csrf']) && $_POST['csrf']=='')
    {
        echo json_encode(['error'=>403, 'msg'=>'Acesso não permitido csrf error']); exit;
    }
    if(!isset($_POST['memory']) && $_POST['memory']== '')
    {
        echo json_encode(['error'=> 402, 'msg'=> 'dados incompletos']); exit;
    }
    if(!isset($_POST['cpu']) && $_POST['cpu']=='')
    {
        echo json_encode(['error'=> 402, 'msg'=> 'dados incompletos']);
    }
    if(!isset($_POST['hdd']) && $_POST['hdd']=='')
    {
        echo json_encode(['error'=> 402, 'msg'=> 'dados incompletos']);
    }
    if(!isset($_POST['tipo']) && $_POST['tipo']=='')
    {
        echo json_encode(['error'=> 402, 'msg'=> 'dados incompletos']);
    }
    if(!isset($_POST['whois']) && $_POST['whois']=='')
    {
        echo json_encode(['error'=> 402, 'msg'=> 'dados incompletos']);
    }
}

$conn = connect();

$SQL = "INSERT INTO nucreport (uid, memoria, cpu, hdd, tipo ,whois ) VALUES ( ? , ? , ? , ? , ? , ? )";

$stmt = $conn ->prepare($SQL);
if($stmt -> execute([intval(sprintf("%06d", mt_rand(1, 999999))), $_POST['memoy'], $_POST['cpu'] , $_POST['hdd'], $_POST['tipo'], $_POST['whois'] ]))
{
    echo json_encode(['code'=>200, 'msg'=> 'dados inseridos com sucesso']);
}


?>