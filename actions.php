<?php
//session_start();

include 'cox.php';
	$update=false;
	$updat=false;
	$error=false;
  $max=false;

	$xid="";
 	 	$xname="";
 	 	 	 	$xnamex="";
 	 	 	 	 	$xquantityx="";


 	$xquantity="";
 	$xprice="";
 	$xsell="";
   	$xphoto="";
   	$xm="";
   	$xn="";
$xcid="";
$xtot="";
$bi=false;


if(isset($_POST['refi']))
{ 

$cn=$_POST['cname'];
$na=$_POST['ni'];

 $cid=$_POST['cid'];
  

  $ft=$_POST['ft'];
 $gi=$_POST['gi'];
$cng=$_POST['cng'];
 $reid=$_POST['reid'];


 $totu=$_POST['tot'];
 $paid=$_POST['pd'];
  $cg=$_POST['cg'];





  

//ekhane
 if(empty($cn) || empty($cid)|| empty($totu)||empty($paid) ){


  header('location:sell.php? s=empty');

   
} 


 
else
{
//notun


$s="SELECT * FROM temp";
  $stm=$con->prepare($s);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();

  if(mysqli_num_rows($resulti) == 0)
  {

  header('location:sell.php? suu=empty');

  }





  else{

  $n=$_POST['cname'];
  $cid=$_POST['cid'];
if($cg<0)
{

$sql = mysqli_query($con, "SELECT * FROM due1 WHERE uid=$cid");

if(mysqli_num_rows($sql) > 0)
    {
  while($row = mysqli_fetch_array($sql))
          {
            $due = $row['due'];
          }

          $cg=($cg-$cg)+(-$cg);
         $cg=$cg+$due;

          $sql = mysqli_query($con, "UPDATE  due1 SET due=$cg WHERE uid=$cid");

 
        }


else{
$cg=($cg-$cg)+(-$cg);
  $query= "INSERT INTO due1(uid,due) VALUES (?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("si",$cid,$cg);
$stmt->execute() ; 
}

}


    //covid19 positive
    $query= "SELECT sum(total) as tot FROM temp";
  $stmt=$con->prepare($query);
  $stmt->execute() ;
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  $tot=$row['tot'];

/*
     |
     |
     |
     |
  Social Distance

*/

#covid19 negative (stay home, stay safe)
  $query= "INSERT INTO temp1 (id,name,quantity,buyp,total,datee) SELECT id, name, quantity,buyp,total,datee FROM temp";
$stmt=$con->prepare($query);
//$stmt->bind_param("i",$id);
$stmt->execute() ;















  //notun end








$query= "INSERT INTO temp2(sid,name) VALUES (?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("ss",$cid,$n);
$stmt->execute() ; 

  $query= "SELECT * FROM temp2 WHERE sid=$cid";
  $stmt=$con->prepare($query);
  //$stmt->bind_param("i",$id);
  $stmt->execute() ;
  $resultr=$stmt->get_result();
  $rowr=$resultr->fetch_assoc();

  $idr=$rowr['id'];
    $idrs=$rowr['sid'];
  $namers=$rowr['name'];


  $queryxx= "SELECT * FROM temp";
  $stmtx=$con->prepare($queryxx);
  //$stmt->bind_param("i",$id);
  $stmtx->execute() ;
  $resulty=$stmtx->get_result();

  $queri= "SELECT sum(total) as totu FROM temp";
  $tmt=$con->prepare($queri);
  //$stmt->bind_param("i",$id);
  $tmt->execute() ;
  $resulti=$tmt->get_result();
  $rowi=$resulti->fetch_assoc();
  $toti=$rowi['totu'];
$dati=date("y-m-d");


$query= "INSERT INTO total(id,sid,sname,total,pay) VALUES (?,?,?,?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("issis",$idr,$idrs,$namers,$toti,$paid);
$stmt->execute() ; 


$s="SELECT * FROM temp";
  $stm=$con->prepare($s);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();


while ($rows=$resulti->fetch_assoc()) {
  # code...
  //$m=$rows['name'];

    $idt=$rows['id'];
    $namet=$rows['name'];
    $qut=$rows['quantity'];
    $bt=$rows['buyp'];
    $ti=$rows['total'];
    $dt=$rows['datee'];
        //$pd=$rows['pd'];

    $tt=date('H:i:s');
$query= "INSERT INTO track1(id,sid,sname,pid,pname,quantity,price,sell,pay) VALUES (?,?,?,?,?,?,?,?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("ississsss",$idr,$idrs,$namers,$idt,$namet,$qut,$bt,$ti,$paid);
$stmt->execute() ; 



}


$d=date('Y-m-d');



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
$pdf->Cell(34 ,5,$na,0,1);//end of line

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

$s="SELECT * FROM temp";
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

    $idt=$rows['id'];
    $namet=$rows['name'];
    $qut=$rows['quantity'];
   // $bt=$rows['buyp'];
    $tt=$rows['total'];
    //$dt=$rows['datee'];
        //$pd=$rows['pd'];

    $pdf->Cell(130 ,5,$namet,1,0);
$pdf->Cell(25 ,5,$qut,1,0);


   $pdf->Cell(34 ,5,$tt,1,1,'R');//end of line



}

//Numbers are right-aligned so we give 'R' after new line parameter



//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$toti,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$toti,1,1,'R');//end of line


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'paid ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$paid,1,1,'R');//end of line

$x=$paid-$toti;
$p=0;
$m=0;

if($x<0)
{
$p=0;
$m=($x+$x)+(-$x);
}
else
{
  $p=$x;
  $m=0;
}


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'return ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$p,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'due ',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$m,1,1,'R');//end of line




$pdf->Line(155,75,195,75);
$pdf->Ln(5);
$pdf->Cell(140 ,5,'',0,0);
$pdf->Cell(50 ,5,'Signature',0,1,'R');//end of line


    $pdf->Output();
    ob_end_flush();
    $query= "DELETE FROM temp ";
$stmt=$con->prepare($query);
//$stmt->bind_param("i",$id);
$stmt->execute() ;
 
    
  $query= "DELETE FROM temp1 ";
$stmt=$con->prepare($query);
//$stmt->bind_param("i",$id);
$stmt->execute() ;
    //header('location:index.php');

}


}





 
}
   	

   	
if(isset($_POST['add']))
{

$xn="";
$xcid="";
$xn=$_POST['cname'];
 $xcid=$_POST['cid'];

 $xname=$_POST['foodname'];
 $xquantity=$_POST['Quantity'];
 	

 $xprice=$_POST['price'];
 $xsell=$_POST['sell_price'];
 //$photo=$_FILES['image']['name'];
$upload="uploads/".$photo;
if(empty($name) || empty($quantity) || empty($price) || empty($sell) || empty($photo)  ){
	header('location:index.php? signu=empty');

   // echo 'This line is printed, because the $var1 is empty.';
}	

}
if(isset($_GET['delete']))
{

		$id=$_GET['delete'];

	$query= "SELECT * FROM temp WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$quantityx=$row['quantity'];


	//$id=$_GET['delete'];
	$query= "DELETE FROM temp WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;









$query= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$quantity=$row['quantity'];
 	

$quantity3=$quantityx+$quantity;
$qury= "UPDATE  items SET  quantity=? WHERE id=?";

$stmt=$con->prepare($qury);
	$stmt->bind_param("si",$quantity3,$id);
	$stmt->execute() ;
 	


header('location:sell.php');

}


if(isset($_GET['edi']))
 {


 // $m=$_POST['Quantityx'];

$id=$_GET['edi'];
 	$query= "SELECT * FROM temp WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$idx=$row['id'];
 	 $xnamex=$row['name'];
 	$xquantityx=$row['quantity'];
 	$updat=true;

//header('location:indee.php');



 }


 if(isset($_GET['edit']))
 {


// 	$name=$_POST['name'];

$id=$_GET['edit'];
 	$query= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$xid=$row['id'];
 	 	$xname=$row['name'];
 	$xquantity=$row['quantity'];
 	$xprice=$row['oprice'];
 	$xsell=$row['price'];
   	$xphoto=$row['photo'];
   	$update=true;

// 	//header('location:indee.php');



 }

 if(isset($_POST['updatex']))

{
    



    $m=$_POST['Quantityx'];
 

 	 $id=$_POST['id'];


$que= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($que);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$resultx=$stmt->get_result();
 	$rowx=$resultx->fetch_assoc();
 	$quantityx2=$rowx['quantity'];
 	 	$man=$rowx['oprice'];


 	$query= "SELECT * FROM temp WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$quantityx=$row['quantity'];

 	if($m>$quantityx2+$quantityx)
 	{


 			header('location:sell.php? signup=empty');

 	}


else{

 	$query= "SELECT * FROM temp WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$quantityx=$row['quantity'];

    //tempQuantity-input
    $quantity1=$quantityx-$m;



$query= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	 	$price=$row['price'];
 	 	 	$quantityy=$row['quantity'];

 	 	//inputQuantity*sell;
 	 	$tot=$price*$m;
 	 	$z=$man*$m;
 	 	//update temp


$qury= "UPDATE  temp SET quantity=?, buyp=? ,total=? WHERE id=?";

$stmt=$con->prepare($qury);
	$stmt->bind_param("iiii",$m,$z,$tot,$id);
	$stmt->execute() ;
  

  //productQuantity+ (tempQuantity-input)
	$x=$quantityy+ $quantity1;
$qury= "UPDATE  items SET  quantity=?  WHERE id=?";

$stmt=$con->prepare($qury);
	$stmt->bind_param("ii",$x,$id);
	$stmt->execute() ;




 	 	
header('location:sell.php');
}
}



 if(isset($_POST['update']))
 {


$id=$_POST['id'];
 $quantity=$_POST['Quantity'];
 $name=$_POST['foodname'];
 	

 $price=$_POST['sell_price'];
 

$que= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($que);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$resultx=$stmt->get_result();
 	$rowx=$resultx->fetch_assoc();
 	$quantityx2=$rowx['quantity'];
 	$p=$rowx['oprice'];


 	if($quantity>$quantityx2)
 	{


 			header('location:sell.php? signup=empty');

 	}
else
{


$pri=$p*$quantity;
$date=date("y-m-d");
  
 
 //$newimage=$_FILES['image']['name'];
$query= "INSERT INTO temp(id,name,quantity,buyp,total) VALUES (?,?,?,?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("issss",$id,$name,$quantity,$pri, $price);
$stmt->execute() ; 	header('location:sell.php');



$quer= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($quer);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$quantity2=$row['quantity'];
 	$quantity3=$quantity2-$quantity;
$qury= "UPDATE  items SET  quantity=? WHERE id=?";

$stmt=$con->prepare($qury);
	$stmt->bind_param("si",$quantity3,$id);
	$stmt->execute() ;
 	
}

 }






  ?>
