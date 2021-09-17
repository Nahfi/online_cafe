<?php
include '../includes/connect.php';



if(isset($_POST['actionx']))
{
  header("location: ../all-orders.php");


}

if(isset($_POST['action']))
{







$status = $_POST['status'];

$id = $_POST['id'];
$na = $_POST['ni'];


$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);


if($status=='Delivered')
{

$resultx = mysqli_query($con, "SELECT * FROM orders WHERE id = $id");


while($row = mysqli_fetch_array($resultx))
			{  

			 $id1 = $row['customer_id'];

 

            }
$sql = "DELETE FROM `due` WHERE orderid=$id;";
$con->query($sql);



  
$result = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $id");
			while($row = mysqli_fetch_array($result))
			{  
			 $id1 = $row['id'];

			 $oid = $row['order_id'];

				$id = $row['item_id'];
				$q = $row['quantity'];
 

				
$sql = "INSERT INTO track5 (id, orderid, pid, quantity) VALUES ($id1, $oid, $id, $q)";
	
  $stmt=$con->prepare($sql);
  $stmt->execute() ;




			}


}
if($status=='ready')
{

$result = mysqli_query($con, "SELECT * FROM orders WHERE id = $id");
      while($row = mysqli_fetch_array($result))
      {
        $oid = $row['id'];
        $cid=$row['customer_id'];
        $t = $row['total'];
      }
 $resultx = mysqli_query($con, "SELECT uid FROM users WHERE id = $cid");
      while($rows = mysqli_fetch_array($resultx))
      {
         $uv = $rows['uid'];
        }
           $resultx = mysqli_query($con, "INSERT INTO due (uid, orderid , totat) VALUES ($uv, $oid,$t)");


/*$sql = "INSERT INTO due (uid, order_id, total) VALUES ($uv, $oid,$t)";
  
  $stmt=$con->prepare($sql);
  $stmt->execute() ;

*/
}
if($status=='Cancelled by Admin')
{



	$result = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $id");
			while($row = mysqli_fetch_array($result))
			{
				$id = $row['item_id'];
				$q = $row['quantity'];
 

				$queryzz= "SELECT * FROM items WHERE id=$id ";
  $stmt=$con->prepare($queryzz);
 // $stmt->bind_param("i",$idms);
  $stmt->execute() ;
  $resultx=$stmt->get_result();
  $rowxz=$resultx->fetch_assoc();
  $quantity=$rowxz['quantity'];
  
  $quantitymx=$q+$quantity;
  
  $qury= "UPDATE  items SET  quantity=? WHERE id=?";

  $stmt=$con->prepare($qury);
  $stmt->bind_param("si",$quantitymx,$id);
  $stmt->execute() ;




			}

}


//up











header("location: ../all-orders.php");
}
else{




$id = $_POST['id'];
$na = $_POST['ni'];



	$d=date('Y-m-d');


$s="SELECT * FROM orders WHERE id=$id";
  $stm=$con->prepare($s);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();
  while ($rows=$resulti->fetch_assoc()) {
  # code...
  //$m=$rows['name'];

    $idt=$rows['customer_id'];
        $total=$rows['total'];

  }
  $r="SELECT * FROM users WHERE id=$idt";
  $stm=$con->prepare($r);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();

   while ($rows=$resulti->fetch_assoc()) {
  # code...
  //$m=$rows['name'];

    $cid=$rows['uid'];
        $cn=$rows['name'];

  }

  ob_clean();
require('FPDF/fpdf.php');

    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B',14);

    $pdf->Cell(130 ,5,'BUBUT CAFE MANAGEMENT SYSYEM',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[road # 9,Rupnagar R/A Mirpur-2 Dhaka]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[Dhaka, Bangladesh, 1216]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$d,0,1);//end of line

$pdf->Cell(130 ,5,'Phone [01616243666]',0,0);
$pdf->Cell(25 ,5,'Name',0,0);
$pdf->Cell(34 ,5,$name,0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$cid,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
//$pdf->Cell(100 ,5,'Bill to',0,1);//end of line
$pdf->Cell(59 ,5,'Bill to',0,1);//end of line
$pdf->SetFont('Arial','',12);

$pdf->Ln(5);
//add dummy cell at beginning of each line for indentation
$pdf->Cell(25 ,5,'Name',0,0);

$pdf->Cell(34 ,5,$cn,0,1);

$pdf->Cell(25 ,5,'ID',0,0);
$pdf->Cell(34 ,5,$cid,0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

$s="SELECT * FROM(SELECT * FROM order_details WHERE order_id=$id) as d  JOIN items WHERE d.item_id=items.id ";
  $stm=$con->prepare($s);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();


//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'ITEAM Description',1,0);

$pdf->Cell(25 ,5,'Quantity',1,0);


$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);
while ($rows=$resulti->fetch_assoc()) {
  # code...
  //$m=$rows['name'];

    $idt=$rows['name'];
    //$namet=$rows['name'];
    $qut=$rows['quantity'];
   // $bt=$rows['buyp'];
    $tt=$rows['price'];
    //$dt=$rows['datee'];
        //$pd=$rows['pd'];

    $pdf->Cell(130 ,5,$idt,1,0);
$pdf->Cell(25 ,5,$qut,1,0);


   $pdf->Cell(34 ,5,$tt,1,1,'R');//end of line



}

//Numbers are right-aligned so we give 'R' after new line parameter



//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$total,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$total,1,1,'R');//end of line


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'paid ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$total,1,1,'R');//end of line



$pdf->Line(155,75,195,75);
$pdf->Ln(5);
$pdf->Cell(140 ,5,'',0,0);
$pdf->Cell(50 ,5,'Signature',0,1,'R');//end of line


    $pdf->Output();
    ob_end_flush();

  
}
?>