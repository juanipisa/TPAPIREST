<?php
header("Content-Type:application/json");



if(!empty($_GET['id']))
{
  $id=$_GET['id'];
  $cliente = get_clientes($id);
  $compra = get_compras($cliente);
  


      if(!empty($compra))
      {

        response(200,"Client Found",$cliente,$compra);
      }
      else
      {
            response(400,"Error con la compra",$cliente,NULL);
      }
  
}

else{

      $listado = get_listadoClientes();


       response(400,"",$listado,NULL);
}


function response($status,$status_message,$name,$name2)
{
  header("HTTP/1.1 ".$status_message);
  
  $response['status_message']=$status_message;
  $response['nombre del cliente']=$name;
  $response['producto']=$name2;
 
  $json_response = json_encode($response);
  echo $json_response;
}

function get_listadoClientes()
{
  $listado = array( "1"=>'saclier',
    "2"=>'almada',
    "3"=>'pisa'
    );

  return $listado;


}
function get_clientes($id)
{
  $clientes = array(
    "1"=>'saclier',
    "2"=>'almada',
    "3"=>'pisa'
  );
  
  foreach($clientes as $cliente=>$name)
  {
    if($cliente==$id)
    {
      return $name;
      break;
    }
  }
}

function get_compras($id_compra)
{
  $compras = array(
    "saclier"=>'monitor,mouse',
    "almada"=>'fuente',
    "pisa"=>'teclado'   
  );
  $comprasCliente = array();

  foreach($compras as $compra=>$name)
  {
        if($compra == $id_compra)
        {
          
          array_push($comprasCliente, $name);

        }

  }

  return $comprasCliente;
}
?>