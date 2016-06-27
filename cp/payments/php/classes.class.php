<?php require_once('classObject.php');
class payment{
	function payment()
	{
	
	$this->obj=new courierbill();
		
	if(isset($_POST['btncust'])){ $this->cucode=$_POST['custselect'];  }
	
	if(isset($_POST['btnbill'])){ $this->billno=$_POST['orderd'];  }	
	
	if(isset($_POST['btn_pay'])){ 
	$this->paydate= isset($_POST['paydate'])?mysql_real_escape_string($_POST['paydate']) :NULL;
	$this->billno= isset($_POST['billno'])?mysql_real_escape_string($_POST['billno'])  :NULL; 
	$this->amt= isset($_POST['amt'])?mysql_real_escape_string($_POST['amt'])  :NULL;
	$this->amtpaid= isset($_POST['apntxt'])?mysql_real_escape_string($_POST['apntxt'])  :NULL;
	$this->amtleft= isset($_POST['aptxt'])?mysql_real_escape_string($_POST['aptxt'])  :NULL;
	$this->notes= isset($_POST['notetxt'])?mysql_real_escape_string($_POST['notetxt'])  :NULL; 
	$m=substr($this->paydate,0,2);
	$d=substr($this->paydate,3,2);
	$y=substr($this->paydate,6,4);
	$this->paydate=$d."-".$m."-".$y;
								}
	if(isset($_POST['btnpay'])){ 
	$this->billno=isset($_POST['billno'])?mysql_real_escape_string($_POST['billno'])  :NULL; }		
	
	if(isset($_POST['btnacccust'])){
		$this->cust=isset($_POST['acust'])?mysql_real_escape_string($_POST['acust'])  :NULL;
		$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL;
		$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
		$this->fd=self::changedate($this->fd);
		$this->td=self::changedate($this->td);
	 }
								
	}//constructor brace ends
	
	function pendingpayments()
	{
	$a="no";
	$rtn="<option value=''>---Select Pending Bill----</option>";
	$sql="select * from releasebills where cucode='".$this->cucode."' and paid='".$a."'";
	$res=$this->obj->fetch($sql);
	if($res){ while($rw=mysql_fetch_array($res)){ $rtn.= "<option value='$rw[7]'>Bill No - $rw[7] --From Date--$rw[2]--To Date--$rw[3]----Bill Amount --$rw[4]-INR</option>";  } return $rtn; }else{ return "<option value=''>---No Bill Pending for this Customer----</option>"; } 
	
	}
	
	function piconebilldetails()
	{
		$sql="select * from releasebills where id='".$this->billno."'";
		$res=$this->obj->fetch($sql);
		if($res){ return $res; }
	}
	
	function paypayments()
	{
	$sql="insert into payments (billno,totalamt,paidamt,obalance,paydate,notes) values('$this->billno','$this->amt','$this->amtpaid','$this->amtleft','$this->paydate','$this->notes')";
	$res=$this->obj->execute($sql);
	$sql="update releasebills set ba='$this->amtleft' where id='".$this->billno."'";
	$res=$this->obj->execute($sql);
	if($res){ return "PAYMENT DONE"; }else{ return "TECHNICAL PROBLEM"; }
	}
	
	function paydetails()
	{
	$rtn="<option value=''>Select Bill No</option>";
		
	$sql="SELECT payments.id,payments.billno,payments.totalamt,payments.paidamt,payments.obalance,payments.paydate FROM payments GROUP BY payments.billno ORDER BY payments.id ASC LIMIT 200";	
	$res=$this->obj->fetch($sql);
	if($res){ while($rw=mysql_fetch_array($res)){  $rtn.="<option value='$rw[1]'>Bill No - $rw[1]</option>";  }  return $rtn;}else{ return "TECHNICAL PROB"; }
	}
	
	function picallpayments()
	{
	$rtn='';
	$sql="select * from releasebills where id='".$this->billno."'";	
	$res=$this->obj-> fetch($sql);
	if($res){ $rw=mysql_fetch_array($res); 
	$rtn.="<tr>";
	$rtn.="<td class='ttxt1'>$rw[7]</td>";
	$rtn.="<td class='ttxt1'>$rw[1]</td>";
	$rtn.="<td class='ttxt1'>$rw[2]</td>";
	$rtn.="<td class='ttxt1'>$rw[3]</td>";
	$rtn.="<td class='ttxt1'>$rw[4]</td>";
	$rtn.="<td class='ttxt1'>$rw[5]</td>";
	$rtn.="<td class='ttxt1'>$rw[6]</td>";
	$rtn.="</tr>";
	$rtn.="<tr><td colspan='7'></td></tr>";
	 }else{ $rtn.="<tr><td>Bill No You Have Entered not Found</td></tr>"; }
	 
	 $rtn.="<tr>";
     $rtn.="<td class='ttxt2' >PAYMENT ID</td>";
     $rtn.="<td class='ttxt2'>BILLNO</td>";
     $rtn.="<td class='ttxt2'>TOTAL AMOUNT</td>";
     $rtn.="<td class='ttxt2'>PAID AMT</td>";
     $rtn.="<td class='ttxt2'>BALANCE</td>";
     $rtn.="<td class='ttxt2'>PAYMENT DATE</td>";
     $rtn.="<td class='ttxt2'>NOTES</td>";
   $rtn.="</tr>";
	 
	$sql="select * from payments where billno='".$this->billno."'";
	$res=$this->obj-> fetch($sql);
			if($res){ 
			while($rw=mysql_fetch_array($res)){
			$rtn.="<tr>";
			$rtn.="<td class='ttxt3'>$rw[0]</td>";
			$rtn.="<td class='ttxt3'>$rw[1]</td>";
			$rtn.="<td class='ttxt3'>$rw[2]</td>";
			$rtn.="<td class='ttxt3'>$rw[3]</td>";
			$rtn.="<td class='ttxt3'>$rw[4]</td>";
			$rtn.="<td class='ttxt3'>$rw[5]</td>";
			$rtn.="<td class='ttxt3'>$rw[6]</td>";
			$rtn.="</tr>";
			}//inner while brace
			 
			}else{ 
			return "BILL NO YOU ENTERED NOT FOUND";}
		return $rtn;
		
	}//function brace
	
	function changedate($da)
	{
	$y=substr($da,0,4);
	$m=substr($da,5,2);
	$d=substr($da,8,2);
	$rtn=$d."-".$m."-".$y;
	return $rtn;
	}
	
	function selectpayments()
	{
		$sql="select * from payments where billno= any (select id from releasebills where releasebills.cucode='".$this->cust."');";
		$res=$this->obj->fetch($sql);
		$fd=strtotime($this->fd);
		$td=strtotime($this->td);
		
	    $rtn='';
		$rtn.="<tr>";
     	$rtn.="<td class='ttxt2' >PAYMENT ID</td>";
     	$rtn.="<td class='ttxt2'>BILLNO</td>";
     	$rtn.="<td class='ttxt2'>TOTAL AMOUNT</td>";
     	$rtn.="<td class='ttxt2'>PAID AMT</td>";
     	$rtn.="<td class='ttxt2'>BALANCE</td>";
     	$rtn.="<td class='ttxt2'>PAYMENT DATE</td>";
     	$rtn.="<td class='ttxt2'>NOTES</td>";
   		$rtn.="</tr>";
		if($res)
		{ 
			$count=mysql_num_rows($res);
			while($rw=mysql_fetch_array($res))
			{  
			$cd=strtotime($rw[5]);
				if($fd<=$cd && $cd<=$td)
				{
				$rtn.="<tr align='center' valign='middle'>";												
    			$rtn.="<td>$rw[0]</td>";
				$rtn.="<td>$rw[1]</td>";
				$rtn.="<td>$rw[2]</td>";
				$rtn.="<td>$rw[3]</td>";
				$rtn.="<td>$rw[4]</td>";
				$rtn.="<td>$rw[5]</td>";
				$rtn.="<td>$rw[6]</td>";
    			$rtn.="</tr>";
					
				}
			}
			if($count>0){
			return $rtn;}else{ return "<tr align='center' valign='middle'><td>No Payment Found</td></tr>"; }
		}
		
				
	}//function brace
	
	function piccustfrombn($bno)
	{
		$obj=new courierbill();
		$sql="select cucode from releasebills where id='".$bno."'";
		$res=$obj->fetch($sql); $rw=mysql_fetch_array($res);
		$sql="select cname from cdata where ccode='".$rw[0]."'";
		$res=$obj->fetch($sql); $rw=mysql_fetch_array($res);
		return $rw[0];
	}//func brace
	
	
	function checkerrors()
	{
	
	}
}//class payment brace ends here 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class selectcust{
	
	function selectcustnow()
	{
	$obj=new courierbill();
	$sql="select * from cdata";
	$res=$obj->fetch($sql);
	$r="<option selected='selected' value=''>-----Select Customer-----</option>";
	if($res){ while($rw=mysql_fetch_array($res)){ $r.="<option value='$rw[3]'>$rw[0]</option>";  }      return $r;  
	  }	
	}
	
	function piconecust($ccode)
	{
	$obj=new courierbill();
	$sql="select * from cdata where ccode='".$ccode."'";
	$res=$obj->fetch($sql);
	if($res){ return $res; }else{ return "Technical Problem"; }
	
	}
	
}//class selectcust brace ends here
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class nusearch{
	
	function nusearch()
	{
    $this->obj=new courierbill();
	if(isset($_POST['btn_cn'])){ 
	$this->cn= isset($_POST['cno'])?mysql_real_escape_string($_POST['cno']) :NULL;

	}//if brace
	}//function brace

	function searchcn()
	{
	$sql="select * from cdata";
	$res=$this->obj->fetch($sql);
	$rtn='';
	if($res){
		while($rw=mysql_fetch_array($res))
		{
		$sql1="select * from $rw[3] where cnno='".$this->cn."'";
		$res1=$this->obj->fetch($sql1);
		if($res1){$count=mysql_num_rows($res1);}
		if(isset($count)){ if($res1){$rw1=mysql_fetch_array($res1);
		$rtn.="<tr>";
		$rtn.="<td class='txtn'>$rw[0]</td>";
		$rtn.="<td class='txtn'>$rw1[0]</td>";
		$rtn.="<td class='txtn'>$rw1[1]</td>";
		$rtn.="<td class='txtn'>$rw1[2]</td>";
		$rtn.="<td class='txtn'>$rw1[3]</td>";
		$rtn.="<td class='txtn'>$rw1[4]</td>";
		$rtn.="<td class='txtn'>$rw1[5]</td>";
		$rtn.="<td class='txtn'>$rw1[6]</td>";
		$rtn.="<td class='txtn'>$rw1[7]</td>";
		$rtn.="<td class='txtn'>$rw1[8]</td>"; 
        $rtn.="</tr>";}
		
		 }
		
		
		}//while brace
		
		if($rtn==''){ return "<tr><td>COURIER NUMBER NOT FOUND<td></tr>"; } else{ return $rtn; }
		
		}else{ return "<tr><td>TECHNICAL PROBLEM</td></tr>"; }	
	}//FUNCTION BRACE


}//class nusearch brace ends
/////////////////////////////////////////////////////////////////////////////////////
class booksearch{
	
	function booksearch()
	{
		$this->obj=new courierbill();
		if(isset($_POST['btn_sn'])){ 
		$this->fromtxt=isset($_POST['ftxt'])?mysql_real_escape_string($_POST['ftxt'])  :NULL;
		$this->totxt=isset($_POST['ttxt'])?mysql_real_escape_string($_POST['ttxt'])  :NULL;
		$this->fromtxt=substr($this->fromtxt,1,8);
		$this->totxt=substr($this->totxt,1,8);
		$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL;
		$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
		$this->fd=self::changedate($this->fd);
		$this->td=self::changedate($this->td);
		 }
	}//func brace 
	
	function searchbook()
	{
	$sql="select * from cdata";
	$res=$this->obj->fetch($sql);
	$rtn='';
	if($res){
		while($rw=mysql_fetch_array($res))
		{
			
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>'".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<'".$this->td."'";
		
		$res1=$this->obj->fetch($sql1);
				
		if($res1){ 
			while($rw1=mysql_fetch_array($res1)){
		//$n = preg_replace("/[^A-Za-z]/",'',$rw1[0]);
		//$n=$rw1[0];
		$n=substr($rw1[0],1,8);
		
		if($n>=$this->fromtxt && $n<=$this->totxt){
		
		$rtn.="<tr>";
		$rtn.="<td class='txtr'><font color='#069'>$rw[0]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[0]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[1]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[2]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[3]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[4]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[5]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[6]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[7]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[8]</font></td>"; 
        $rtn.="</tr>";}//interbal if
			    }//while brace
		   }//outer if
		
		 
		
		
		}//while brace
		
		if($rtn==''){ return "<tr><td>COURIER NUMBER NOT FOUND<td></tr>"; } else{ return $rtn; }
		
		}else{ return "<tr><td>TECHNICAL PROBLEM</td></tr>"; }	
	}//FUNCTION BRACE
////////////////////////////////////////////////////////////////////////////////////////////
function searchbooknew($sn,$ln,$idate)
	{
		
	
	$dc=date('Y-m-d');
	
	$idate=self::changedate($idate);
	$dc=self::changedate($dc);

	
	
	$sql="select * from cdata";
	$res=$this->obj->fetch($sql);
	$rtn='';
	if($res){
		while($rw=mysql_fetch_array($res))
		{
			
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>'".$idate."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<'".$dc."'";
		
		$res1=$this->obj->fetch($sql1);
				
		if($res1){ 
			while($rw1=mysql_fetch_array($res1)){
		$new_string = preg_replace("/[A-Za-z]/",'',$string);
		
		$n = preg_replace("/[A-Za-z]/",'',$rw1[0]);
		$ln = preg_replace("/[A-Za-z]/",'',$ln);
		$sn = preg_replace("/[A-Za-z]/",'',$sn);
		//$n=$rw1[0];
		
		//$n=$rw1[0];
		//echo "--";
		//echo $sn;
		//echo "--";
	    //echo "--";
		//echo $n;
		//echo "--";
		//echo $sn;
		//echo "--";
		//echo $ln;
		//echo "--</br>";
		//exit();
		if($n>=$sn && $n<=$ln){
		
		$rtn.="<tr>";
		$rtn.="<td class='txtr'><font color='#069'>$rw[0]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[0]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[1]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[2]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[3]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[4]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[5]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[6]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[7]</font></td>";
		$rtn.="<td class='txtr'><font color='#069'>$rw1[8]</font></td>"; 
        $rtn.="</tr>";}//interbal if
			    }//while brace
		   }//outer if
		
		 
		
		
		}//while brace
		
		if($rtn==''){ return "<tr><td>COURIER NUMBER NOT FOUND<td></tr>"; } else{ return $rtn; }
		
		}else{ return "<tr><td>TECHNICAL PROBLEM</td></tr>"; }	
	}//FUNCTION BRACE

//////////////////////////////////////////////////////////////////////////////////////////////	
    function changedate($da)
	{
	$y=substr($da,0,4);
	$m=substr($da,5,2);
	$d=substr($da,8,2);
	$rtn=$d."-".$m."-".$y;
	$rtn=strtotime($rtn);
	return $rtn;
	}


}//class book search
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class billandpayments
{
	function billandpayments()
	{
	$this->obj=new courierbill();
	
	if(isset($_POST['btn_sn'])){
		 
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL;
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->fd=self::changedate($_POST['date3']);
	$this->td=self::changedate($_POST['date4']);
	}
	 	
	}
	
	function seebp()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	
	$sql="SELECT releasebills.cucode,releasebills.fd,releasebills.td,releasebills.ba,releasebills.paid,releasebills.billam,releasebills.id,payments.billno,payments.id,payments.totalamt,payments.paidamt,payments.obalance,payments.paydate,payments.notes FROM releasebills Left Join payments ON releasebills.id = payments.billno where UNIX_TIMESTAMP(STR_TO_DATE(releasebills.fd, '%d-%m-%Y'))>=$this->fd AND UNIX_TIMESTAMP(STR_TO_DATE(releasebills.td, '%d-%m-%Y'))<=$this->td LIMIT 500
";
    $snoforbill=1;
	$billnocheck=1;
	$p=1;
    $checkvar='';
	$rtn='';
//where STR_TO_DATE(releasebills.fd, '%d-%m-%Y')>=STR_TO_DATE('".$this->fd."', '%d-%m-%Y') AND STR_TO_DATE(releasebills.td, '%d-%m-%Y')>=STR_TO_DATE('".$this->td."', '%d-%m-%Y')
	$res=$this->obj->fetch($sql);	
	if($res){ 
	while($rw=mysql_fetch_array($res))
	{
	
	if($billnocheck!=$rw[6]){
		
		$rtn.="<tr>";
		$rtn.="<td colspan='12' class='forsepration'>  </td>";
		/*$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";*/
		$rtn.="</tr>";

		
		$rtn.="<tr>";
		$rtn.="<td colspan='12' class='forsnoincls'  > S No . :  $snoforbill </td>";
		/*$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";*/
		$rtn.="</tr>";
		
		$rtn.="<tr>";
		$rtn.="<td colspan='6' class='forbilldetailsfill'  > Bill Details </td><td colspan='6' class='forpaymentfill'  > Payment Details </td>";
		/*$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";
		$rtn.="<td class='txtr'></td>";*/
		$rtn.="</tr>";
		
				
			$snoforbill++;
		$rtn.="<tr>
    <th width='35' class='txthead' scope='col'>BILL NO.</th>
    <th width='91' class='forpayment' scope='col'>CUSTOMER</th>
    <th width='65' class='txthead' scope='col'>FROM</th>
    <th width='53' class='txthead' scope='col'>TO</th>
    <th width='31' class='txthead' scope='col'>BILL</th>
    <th width='39' class='txthead' scope='col'>PAID</th>
    <th width='79' class='txthead1' scope='col'>PAY DATE</th>
    <th width='34' class='txthead1' scope='col'>PAY NO</th>
    <th width='48' class='txthead1' scope='col'>PAY AMT</th>
    <th width='42' class='txthead1' scope='col'>PAID AMT</th>
    <th width='54' class='forbal' scope='col'>BALANCE</th>
    <th width='113' class='txthead1' scope='col'>NOTES</th>
   </tr>";
	}
	
	$billnocheck=$rw[6];
		
		
		
		if($checkvar!='')
		{ if($checkvar==$rw[6] && $p==1){ $rtn.="<tr><td colspan='12'><font color='#063'> ↑ Repeat Payment For Above Bill No .....</font></tr>"; $p=2;  }elseif($checkvar!=$rw[6] && $p==2){  /*$rtn.="<tr><td colspan='12' ><font color='#063'>→  _________________________________________________________________________________________________________________________</font></td></tr>";*/ $p=1; }
		
		  }
		$checkvar=$rw[6];
		$temp=strtoupper($rw[0]);
		$rtn.="<tr>";
		$rtn.="<td class='txtr'>$rw[6]</td>";
		$rtn.="<td class='txtr'>$temp</td>";
		$rtn.="<td class='txtr'>$rw[1]</td>";
		$rtn.="<td class='txtr'>$rw[2]</td>";
		$rtn.="<td class='txtr'>$rw[3]</td>";
		$rtn.="<td class='txtr'>$rw[4]</td>";
		$rtn.="<td class='txtr1'>$rw[12]</td>";
		$rtn.="<td class='txtr1'>$rw[8]</td>";
		$rtn.="<td class='txtr1'>$rw[9]</td>";
		$rtn.="<td class='txtr1'>$rw[10]</td>";
		$rtn.="<td class='txtr1'>$rw[11]</td>";
		$rtn.="<td class='txtr1'>$rw[13]</td>";
		$rtn.="</tr>";
		
	}
	return $rtn;
	 }else{ return "TECHNICAL PROBLEM"; }
	
	
	}//finc seebp brace
	
	
	
	function pendingbills()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$sql="select * from releasebills where paid='no' AND UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(td,'%d-%m-%Y'))<='".$this->td."'";
	
	$res=$this->obj->fetch($sql);
	if($res){  
	while($rw=mysql_fetch_array($res))
	{
			$temp=strtoupper($rw[1]);
			$rtn.="<tr>";
			$rtn.="<td class='txtr1'>$rw[7]</td>";
			$rtn.="<td class='txtr1'>$temp</td>";
			$rtn.="<td class='txtr1'>$rw[2]</td>";
			$rtn.="<td class='txtr1'>$rw[3]</td>";
			$rtn.="<td class='txtr1'>$rw[4]</td>";
			$rtn.="<td class='txtr1'>$rw[5]</td>";
			$rtn.="<td class='txtr1'>$rw[6]</td>";
			$rtn.="</tr>";	
	
		
	}
	return $rtn;
	
	}//if brace $res
	
	}//FUNCTION PENDING BILLS ENDS
	
	
	function paybillsreport()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$sql="select * from releasebills where paid='yes' AND UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(td,'%d-%m-%Y'))<='".$this->td."'";
	
	$res=$this->obj->fetch($sql);
	if($res){  
	while($rw=mysql_fetch_array($res))
	{
			$rtn.="<tr>";
			$rtn.="<td class='txtr'>$rw[7]</td>";
			$rtn.="<td class='txtr'>$rw[1]</td>";
			$rtn.="<td class='txtr'>$rw[2]</td>";
			$rtn.="<td class='txtr'>$rw[3]</td>";
			$rtn.="<td class='txtr'>$rw[4]</td>";
			$rtn.="<td class='txtr'>$rw[5]</td>";
			$rtn.="<td class='txtr'>$rw[6]</td>";
			$rtn.="</tr>";	
	
		
	}
	return $rtn;
	
	}//if brace $res
	
	}//FUNCTION PAY BILLS ENDS
	
	
	 function changedate($da)
	{
	$y=substr($da,0,4);
	$m=substr($da,5,2);
	$d=substr($da,8,2);
	$rtn=$d."-".$m."-".$y;
	$rtn=strtotime($rtn);
	return $rtn;
	}
	
	
}//class billandpayments ends

////////////////////COURIER NO DETAILS ACCORDING TO DATE//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class cnumber{
	
	function cnumber()
	{
		$this->obj=new courierbill();
		
		if(isset($_POST['btn_sn'])){
		$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL;
		$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
		$this->fd=self::changedate($this->fd);
		$this->td=self::changedate($this->td);
		}
	}
	
	
	function checkcno()
	{
		$this->td=$this->td;
		$this->fd=$this->fd;
		$sumcust=0;
		$sum=0;
		$rtn='';
		$sql="select * from cdata";
		$res=$this->obj->fetch($sql);
		if($res){ 
				while($rw=mysql_fetch_array($res))
				{   
					$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";	
		$res1=$this->obj->fetch($sql1);
						if($res1){ 
						while($rw1=mysql_fetch_array($res1)){
								$rtn.="<tr>";
								$rtn.="<td class='txtr1'>$rw[0]</td>";
								$rtn.="<td class='txtr1'>$rw1[0]</td>";
								$rtn.="<td class='txtr1'>$rw1[2]</td>";
								$rtn.="<td class='txtr1'>$rw1[3]</td>";
								$rtn.="<td class='txtr1'>$rw1[4]</td>";
								$rtn.="<td class='txtr1'>$rw1[5]</td>";
								$rtn.="<td class='txtr1'>$rw1[6]</td>";
								$rtn.="<td class='txtr1'>$rw1[7]</td>";
								$rtn.="<td class='txtr1'>$rw1[8]</td>";
								$rtn.="</tr>";
							$sum=$sum+$rw1[6];	
							$sumcust=$sumcust+$rw1[6];
								}//while brace ends
								$rtn.="<tr><td class='txtr' colspan='9'>The Total Amount of Booked courier for $rw[3] is : $sumcust </td></tr>"; $sumcust=0;
						 }//internal if ends
		
				}//main while brace
				$rtn.="<tr><td class='txtr1' colspan='9'>The Total Amount of Booked courier is : $sum </td></tr>";
				return $rtn;
		 }//main if brace	
		
	}
	
	
	function changedate($da)
	{
	$y=substr($da,0,4);
	$m=substr($da,5,2);
	$d=substr($da,8,2);
	$rtn=$d."-".$m."-".$y;
	$rtn=strtotime($rtn);
	return $rtn;
	}

}//class brace cnumber
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class billcourier{
	
	function billcourier()
	{
	$this->obj=new courierbill();	
	
	if(isset($_POST['btn_sn'])){  
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->ffd=$this->fd;$this->ftd=$this->td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	 }//if brace	
	
	if(isset($_POST['btn_sn_cust'])){  
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->ffd=$this->fd;$this->ftd=$this->td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	$this->cust=isset($_POST['txtccoden'])?mysql_real_escape_string($_POST['txtccoden'])  :NULL;
	 }//if brace	
	
	if(isset($_POST['pfd1'])){  
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->ffd=$this->fd;$this->ftd=$this->td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	$this->cust=isset($_POST['txtccoden'])?mysql_real_escape_string($_POST['txtccoden'])  :NULL;
	 }//if brace
	
	if(isset($_POST['btn_cust1'])){  
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->ffd=$this->fd;$this->ftd=$this->td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	}//if brace	
	
	if(isset($_POST['btn_cust2'])){  
	$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
	$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
	$this->ffd=$this->fd;$this->ftd=$this->td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	}//if brace	
	
	
	}//constructor brace
	
	function cbill()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$sum=0;	
	$sumcust=0;
	$sql="select * from cdata";
	$res=$this->obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";
		$res1=$this->obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
							$rtn.="<tr>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw[0]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[0]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[2]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[3]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[4]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[5]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[6]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[7]</font></td>";
							$rtn.="<td class='txtline'><font color='#99F'>$rw1[8]</font></td>";
							$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];			
							$sumcust=$sumcust+$rw1['amtb'];
						}//inner while brace
				$rtn.="<tr><td colspan='10' class='txtline1'>Total for $rw[3] is : $sumcust </td></tr>";	$sumcust=0;	
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$this->ffd,$this->ftd);
			return $artn;
		 }//if res
	}//func cbill
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cbillprint($fd,$td)
	{
	$obj=new courierbill();
	$this->fd=$fd;
	$this->td=$td;
	$this->fd=self::changedate($fd);
	$this->td=self::changedate($td);
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$sum=0;	
	$sumcust=0;
	$sql="select * from cdata";
	$res=$obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";
		$res1=$obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
							$rtn.="<tr>";
							$rtn.="<td >$rw[0]</td>";
							$rtn.="<td >$rw1[0]</td>";
							$rtn.="<td >$rw1[2]</td>";
							$rtn.="<td >$rw1[3]</td>";
							$rtn.="<td >$rw1[4]</td>";
							$rtn.="<td >$rw1[5]</td>";
							$rtn.="<td >$rw1[6]</td>";
							$rtn.="<td >$rw1[7]</td>";
							$rtn.="<td >$rw1[8]</td>";
							$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];			
							$sumcust=$sumcust+$rw1['amtb'];
						}//inner while brace
				$rtn.="<tr><td colspan='9' class='txtline1'>Total for $rw[3] is : $sumcust </td></tr>";	$sumcust=0;	
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$fd,$td);
			return $artn;
		 }//if res
	}//func cbill

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	function cbillcustamt()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	
	$rtn='';
	$sum=0;	
	$sumamt=0;
	$sql="select * from cdata where ccode='".$this->cust."'";
	
	$res=$this->obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>= $this->fd AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<= $this->td";
		$res1=$this->obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
						$rtn.="<tr>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw[0]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[0]</font></td>";													                        $rtn.="<td class='txtr'><font color='#000000'>$rw1[2]</font></td>";								                        $rtn.="<td class='txtr'><font color='#000000'>$rw1[3]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[4]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[5]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[6]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[7]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[8]</font></td>";
						$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];			
						}//inner while brace
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$this->ffd,$this->ftd,$sumamt,$this->cust);
			return $artn;
		 }//if res
	}//func cbill cust amt
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cbillcustamtprint($fd,$td,$ccode)
	{
	$obj=new courierbill();
	$this->fd=$fd;
	$this->td=$td;
	$this->fd=self::changedate($this->fd);
	$this->td=self::changedate($this->td);
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$sum=0;	
	$sumamt=0;
	$sql="select * from cdata where ccode='".$ccode."'";
	
	$res=$obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>= $this->fd AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<= $this->td";
		$res1=$obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
						$rtn.="<tr>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw[0]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[0]</font></td>";													                        $rtn.="<td class='txtr'><font color='#000000'>$rw1[2]</font></td>";								                        $rtn.="<td class='txtr'><font color='#000000'>$rw1[3]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[4]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[5]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[6]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[7]</font></td>";
						$rtn.="<td class='txtr'><font color='#000000'>$rw1[8]</font></td>";
						$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];			
						}//inner while brace
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$fd,$td,$sumamt);
			return $artn;
		 }//if res
	}//func cbill cust amt
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////	
		function cbillcust()
	{
		$this->fd=$this->fd;
		$this->td=$this->td;
		
	$rtn='';
	$sum=0;	
	$sql="select * from cdata where ccode='".$this->cust."'";
	
	$res=$this->obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";
		$res1=$this->obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
								$rtn.="<tr>";
								$rtn.="<td class='txthead'>$rw[0]</td>";
								$rtn.="<td class='txthead'>$rw1[0]</td>";
								$rtn.="<td class='txthead'>$rw1[2]</td>";
								$rtn.="<td class='txthead'>$rw1[3]</td>";
								$rtn.="<td class='txthead'>$rw1[4]</td>";
								$rtn.="<td class='txthead'>$rw1[5]</td>";
								$rtn.="<td class='txthead'>$rw1[6]</td>";
								$rtn.="<td class='txthead'>$rw1[7]</td>";
								$rtn.="<td class='txthead'>$rw1[8]</td>";
								
								$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];			
						}//inner while brace
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$this->ffd,$this->ftd,$this->cust);
			return $artn;
		 }//if res
	}//func cbill cust 
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function cbillincome()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	$sumcust=0;
	$sumbillcust=0;
	$rtn='';
	$sum=0;	
	$sumamt=0;
	$sql="select * from cdata";
	
	$res=$this->obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";
		$res1=$this->obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
								$rtn.="<tr>";
								$rtn.="<td class='txtr'>$rw[0]</td>";
								$rtn.="<td class='txtr'>$rw1[0]</td>";
								$rtn.="<td class='txtr'>$rw1[2]</td>";
								$rtn.="<td class='txtr'>$rw1[3]</td>";
								$rtn.="<td class='txtr'>$rw1[4]</td>";
								$rtn.="<td class='txtr'>$rw1[5]</td>";
								$rtn.="<td class='txtr'>$rw1[6]</td>";
								$rtn.="<td class='txtr'>$rw1[7]</td>";
								$rtn.="<td class='txtr'>$rw1[8]</td>";
								$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];	
							$sumbillcust=$sumbillcust+$rw1['amtb'];
							$sumcust=$sumcust+$rw1['amtc'];		
						}//inner while brace
						$rtn.="<tr><td colspan='9'> The amount of courier bill for this customer is : $sumbillcust Rs  </td></tr>";
						$rtn.="<tr><td colspan='9'> The amount you have charged from this customer is : $sumcust Rs  </td></tr>";
						$temp=$sumcust-$sumbillcust;
						$rtn.="<tr><td colspan='9'> The income you got from this customer is : $temp Rs  </td></tr>";
						$sumcust=0; $sumbillcust=0; $temp=0;
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$this->ffd,$this->ftd,$sumamt);
			return $artn;
		 }//if res
	}//func cbill cust

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cbillincomeprint($fd,$td)
	{
	$obj=new courierbill();	
	$obj->fd=$fd;
	$obj->td=$td;
	$obj->fd=self::changedate($obj->fd);
	$obj->td=self::changedate($obj->td);
	$obj->fd=$obj->fd;
	$obj->td=$obj->td;
	$sumcust=0;
	$sumbillcust=0;
	$rtn='';
	$sum=0;	
	$sumamt=0;
	$sql="select * from cdata";
	
	$res=$obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$obj->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$obj->td."'";
		$res1=$obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
			
								$rtn.="<tr>";
								$rtn.="<td class='txtr'>$rw[0]</td>";
								$rtn.="<td class='txtr'>$rw1[0]</td>";
								$rtn.="<td class='txtr'>$rw1[2]</td>";
								$rtn.="<td class='txtr'>$rw1[3]</td>";
								$rtn.="<td class='txtr'>$rw1[4]</td>";
								$rtn.="<td class='txtr'>$rw1[5]</td>";
								$rtn.="<td class='txtr'>$rw1[6]</td>";
								$rtn.="<td class='txtr'>$rw1[7]</td>";
								$rtn.="<td class='txtr'>$rw1[8]</td>";
								$rtn.="</tr>";
			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];	
							$sumbillcust=$sumbillcust+$rw1['amtb'];
							$sumcust=$sumcust+$rw1['amtc'];		
						}//inner while brace
						$rtn.="<tr><td colspan='9'> The amount of courier bill for this customer is : $sumbillcust Rs  </td></tr>";
						$rtn.="<tr><td colspan='9'> The amount you have charged from this customer is : $sumcust Rs  </td></tr>";
						$temp=$sumcust-$sumbillcust;
						$rtn.="<tr><td colspan='9'> The income you got from this customer is : $temp Rs  </td></tr>";
						$sumcust=0; $sumbillcust=0; $temp=0;
			}//inner res1 if
}//outer while brace
			$artn=array($rtn,$sum,$fd,$td,$sumamt);
			return $artn;
		 }//if res
	}//func cbill cust


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function cbillincomegross()
	{
	$this->fd=$this->fd;
	$this->td=$this->td;
	$rtn='';
	$rtn1='';
	$sum=0;	
	$sumamt=0;
	$sumcust=0;
	$sumbill=0;
	$sql="select * from cdata";
	
	$res=$this->obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$this->td."'";
		$res1=$this->obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
								//$rtn.="<tr>";
								//$rtn.="<td class='txtr'>$rw[0]</td>";
								//$rtn.="<td class='txtr'>$rw1[0]</td>";
								//$rtn.="<td class='txtr'>$rw1[2]</td>";
								//$rtn.="<td class='txtr'>$rw1[6]</td>";
								//$rtn.="<td class='txtr'>$rw1[7]</td>";
								//$rtn.="</tr>";			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];	
							$sumcust=$sumcust+$rw1['amtc'];
							$sumbill=$sumbill+$rw1['amtb'];		
						}//inner while brace
						
						$rtn.="<tr><td class='txtr'><font color='#666666'>$rw[0]</font></td><td class='txtr'><font color='#666666'>$sumbill</font></td><td><font color='#666666'>$sumcust</font></td></tr>"; $sumbill=0; $sumcust=0;
			}//inner res1 if
}//outer while brace
$exp=0;
$sql2="select * from expenses where UNIX_TIMESTAMP(STR_TO_DATE(exdate, '%d-%m-%Y'))>='".$this->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(exdate, '%d-%m-%Y'))<='".$this->td."'";
	$res2=$this->obj->fetch($sql2);
	if($res2){ while($rw2=mysql_fetch_array($res2)){ 
	
				$rtn1.="<tr>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[0]</font></td>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[1]</font></td>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[2]</font></td>";
				$rtn1.="<td class='txtr' colspan='4'><font color='#666666'>$rw2[3]</font></td>";
				$rtn1.="</tr>";	
	$exp=$exp+$rw2[2];
	  } }
			$artn=array($rtn,$sum,$this->ffd,$this->ftd,$sumamt,$exp,$rtn1);
			return $artn;
		 }//if res
	}//func cbill income gross
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cbillincomegrossprint($fdp,$tdp)
	{
	$obj=new courierbill();	
	$obj->fd=$fdp;
	$obj->td=$tdp;
	$obj->fd=self::changedate($obj->fd);
	$obj->td=self::changedate($obj->td);
	$obj->fd=$obj->fd;
	$obj->td=$obj->td;
	$rtn='';
	$rtn1='';
	$sum=0;	
	$sumamt=0;
	$sumcust=0;
	$sumbill=0;
	$sql="select * from cdata";
	
	$res=$obj->fetch($sql);	
		if($res){
while($rw=mysql_fetch_array($res)){ 
		$sql1="select * from $rw[3] where UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))>='".$obj->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))<='".$obj->td."'";
		$res1=$obj->fetch($sql1);
			if($res1){
			while($rw1=mysql_fetch_array($res1)){
								//$rtn.="<tr>";
								//$rtn.="<td class='txtr'>$rw[0]</td>";
								//$rtn.="<td class='txtr'>$rw1[0]</td>";
								//$rtn.="<td class='txtr'>$rw1[2]</td>";
								//$rtn.="<td class='txtr'>$rw1[6]</td>";
								//$rtn.="<td class='txtr'>$rw1[7]</td>";
								//$rtn.="</tr>";			
							$sum=$sum+$rw1['amtb'];
							$sumamt=$sumamt+$rw1['amtc'];	
							$sumcust=$sumcust+$rw1['amtc'];
							$sumbill=$sumbill+$rw1['amtb'];		
						}//inner while brace
						
						$rtn.="<tr><td class='txtr'><font color='#666666'>$rw[0]</font></td><td class='txtr'><font color='#666666'>$sumbill</font></td><td><font color='#666666'>$sumcust</font></td></tr>"; $sumbill=0; $sumcust=0;
			}//inner res1 if
}//outer while brace
$exp=0;
$sql2="select * from expenses where UNIX_TIMESTAMP(STR_TO_DATE(exdate, '%d-%m-%Y'))>='".$obj->fd."' AND UNIX_TIMESTAMP(STR_TO_DATE(exdate, '%d-%m-%Y'))<='".$obj->td."'";
	$res2=$obj->fetch($sql2);
	if($res2){ while($rw2=mysql_fetch_array($res2)){ 
	
				$rtn1.="<tr>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[0]</font></td>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[1]</font></td>";
				$rtn1.="<td class='txtr'><font color='#666666'>$rw2[2]</font></td>";
				$rtn1.="<td class='txtr' colspan='4'><font color='#666666'>$rw2[3]</font></td>";
				$rtn1.="</tr>";	
	$exp=$exp+$rw2[2];
	  } }
			$artn=array($rtn,$sum,$fdp,$tdp,$sumamt,$exp,$rtn1);
			return $artn;
		 }//if res
	}//func cbill income gross


	
///////////////////////////////////////////////////////////////////////////////////	
///////////////////////////////////////////////////////////////////////////////////////	
	function changedate($da)
	{
	$y=substr($da,0,4);
	$m=substr($da,5,2);
	$d=substr($da,8,2);
	$rtn=$d."-".$m."-".$y;
	$rtn=strtotime($rtn);
	return $rtn;
	}
	
}//class billcourier

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class billdetails{
	function billdetails()
	{
			$this->obj=new courierbill();	
			
			if(isset($_POST['btnbillcust'])){ 
			$this->fd=isset($_POST['date3'])?mysql_real_escape_string($_POST['date3'])  :NULL; 
			$this->td=isset($_POST['date4'])?mysql_real_escape_string($_POST['date4'])  :NULL;
			$this->custcode=isset($_POST['acust'])?mysql_real_escape_string($_POST['acust'])  :NULL;
			$this->ffd=$this->fd;$this->ftd=$this->td;
			$this->fd=self::changedate($this->fd);
			$this->td=self::changedate($this->td);
			}
	}//constructor brace
	
			function seebilldetails()
			{
			$rtn='';
$sql="select * from releasebills where UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y'))>=$this->fd AND UNIX_TIMESTAMP(STR_TO_DATE(td,'%d-%m-%Y'))<=$this->td AND cucode='".$this->custcode."'";
			$res=$this->obj->fetch($sql);
				if($res){   
							while($rw=mysql_fetch_array($res))
							{
							$rtn.="<tr>";
							$rtn.="<td class='ttxt1'>$rw[7]</td>";
							$rtn.="<td class='ttxt1'>$rw[1]</td>";
							$rtn.="<td class='ttxt1'>$rw[2]</td>";
							$rtn.="<td class='ttxt1'>$rw[3]</td>";
							$rtn.="<td class='ttxt1'>$rw[4]</td>";
							$rtn.="<td class='ttxt1'>$rw[5]</td>";
							$rtn.="<td class='ttxt1'>$rw[6]</td>";
							$rtn.="</tr>";	
							}//inner while brace
						}//res if brace
				return $rtn;
			}//functon brace
			
			
			function changedate($da)
			{
			$y=substr($da,0,4);
			$m=substr($da,5,2);
			$d=substr($da,8,2);
			$rtn=$d."-".$m."-".$y;
			$rtn=strtotime($rtn);
			$rtn=$rtn;
			return $rtn;
			}
				
	function editbillEntry(){
	
	$sql="update $cucdz set cnno='$cunoz',special='$specialz',destination='$desz',weight='$weightz',pord='$pordz',amtb='$ambz',amtc='$amcz',date='$daz',notes='$notez' where cnno='$cunoz'";	
		
	}
	
}//class bill details
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
class newform{
	
	function newform(){
	$this->obj=new courierbill();	
	}
	
	/////////////////////////////////////////
	function selectCity(){
	$sql="SELECT *
FROM pindata
GROUP BY
pindata.CN
ORDER BY
pindata.CN ASC
";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
	while($rw=mysql_fetch_array($res)){
		
		$rtn[]=array('myline'=>array('city'=>$rw['CN']));
		
	}
	
   return $rtn;
		
	}
		
	}
	
	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	/////////////////////////////////////////
	function selectState(){
	$sql="SELECT *
FROM pindata
GROUP BY
pindata.State
ORDER BY
pindata.State ASC
";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
	while($rw=mysql_fetch_array($res)){
		
		$rtn[]=array('myline'=>array('state'=>$rw['State']));
		
	}
	
   return $rtn;
		
	}
		
	}
	
	/////////////////////////////////////////
	
///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	/////////////////////////////////////////
	function selectZones(){
	$sql="SELECT *
FROM circlemastertbls
";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
	while($rw=mysql_fetch_array($res)){
		
		$rtn[]=array('myline'=>array('circle'=>$rw['circlename']));
		
	}
	
   return $rtn;
		
	}
		
	}
	
	/////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////
	/////////////////////////////////////////
	function insertZonesAssociation($zone,$city,$state){
	$sql="INSERT INTO zonecityincludemastertbls (zoneid,state,city) VALUES('$zone','$city','$state')";
	
	$res=$this->obj->execute($sql);
	
	if($res){
	
   return true;
		
	}else{ return false;   }
		
	}
	
	/////////////////////////////////////////////////////////////////
	
	function getCircleandWeight(){
	
	$sql="SELECT * FROM weightslabmastertbls";	
		
	$sql1="SELECT * FROM circlemastertbls";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
		
		while($rw=mysql_fetch_array($res)){
		
		$rtn[]=array('myline'=>array('weight'=>$rw['weightslabname']));	
			
		}
		
	}else{    }
		
	$res1=$this->obj->fetch($sql1);	
	
	while($rw1=mysql_fetch_array($res1)){
		
		$rtn1[]=array('myline'=>array('circle'=>$rw1['circlename']));	
			
		}
		
	$rtnx=array($rtn,$rtn1);
	
	return $rtnx;	
		
	}///function braceends here
	
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
function incustRecordAndRates($rtnarr,$disparr,$disp2arr,$cname,$cphone,$ccode,$caddress,$cemail){

/////////////////////////////////////////////////////////////////////
$sql="INSERT INTO cdata (cname,cadd,cemail,ccode,cphone) VALUES('$cname','$caddress','$cemail','$ccode','$cphone')";



$res=$this->obj->execute($sql);

if($res){

true;
	
}else{
	
echo "tech Prob"; exit();	
}
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$sqltcust="CREATE TABLE IF NOT EXISTS `$ccode` (
  `cnno` varchar(255) NOT NULL DEFAULT '',
  `special` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `pord` varchar(255) DEFAULT NULL,
  `amtb` varchar(255) DEFAULT NULL,
  `amtc` varchar(255) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnno`)
)";

$res=$this->obj->execute($sqltcust);


///////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
$sql1="select max(id) as cnewid from cdata";
$res1=$this->obj->fetch($sql1);

if($res1){

$rw=mysql_fetch_array($res1);

$newid=$rw['cnewid'];
	
}else{
	
echo "tech Prob"; exit();	
}


////////////////////////////////////////////////////////////////////////

	
	$clinear="";
	$z=0;
	foreach($disp2arr as $gg):
	$circlename=strtolower($gg['myline']['circle']);
	$circlename = str_replace(' ','',$circlename); 
	$clinear.=$circlename.",";
	endforeach;
		
	$arrcircle=explode(",",$clinear);
	
	
	
	$s=1;
	$sqlarr=" VALUES(";
	$apt="";
	//echo "--------";
	//echo "--------";
    $arraysizecircle=sizeof($disp2arr);
	foreach($disp2arr as $qq):	
		//foreach($disparr as $ee):
		//$name=strtolower($qq['myline']['circle']).strtolower($ee['myline']['weight'])."txt";
    	//$name = str_replace(' ','',$name); 
		$circlename=strtolower($qq['myline']['circle']);
		$circlename = str_replace(' ','',$circlename); 
		//echo $name; 
		//echo "--------";
		//echo $circlename; 
		//echo "--------";
		//print_r($rtnarr);
				foreach($rtnarr as $rr):
				$extractedarr=$rr[$circlename];
				//print_r($extractedarr);
				
				$apt = json_encode($extractedarr);
		//		echo "--------";
				
				if(trim($apt)!="null"){
				
				//echo $apt;
				$realinput=explode(",",$apt);
				$arraysize=sizeof($realinput);
				//print_r($realinput);
				
				$i=0;
				
				
				
				while($i<$arraysize){
					$realinput[$i] = str_replace('[','',$realinput[$i]); 
					$realinput[$i] = str_replace('{','',$realinput[$i]); 
					$realinput[$i] = str_replace('[','',$realinput[$i]);
					$realinput[$i] = str_replace(']','',$realinput[$i]); 
					$realinput[$i] = str_replace('}','',$realinput[$i]);
					$realinput[$i] = str_replace('"','',$realinput[$i]);  
					
					$realfinal=explode(":",$realinput[$i]);
					$realfinal[0]=str_replace('txt','',$realfinal[0]);
					$sqlarr.="'".$realfinal[0]."',";
					$sqlarr.="'".$realfinal[1]."',";
					
				
					
		//echo "----";	echo $circlename;	echo "----"; echo "<br>";	echo $realinput[$i];   echo "----";  echo "<br>";
					
					$i++;
					
				}
				
				$i=0;
				////////////////////////////////////////
				//print_r($arrcircle);
			//	echo "<br>";
				//echo "---$z-----";
				//echo $arrcircle[$z];
				 //echo "<br>";
				//echo "--------";
	//echo $arraysizecircle."circle number";
	//echo "--------";
	//echo $arraysize."weight slab";
	//echo "--------";
	$sql="INSERT INTO ratecn (feild1name,feild1rate,feild2name,feild2rate,feild3name,feild3rate,feild4name,feild4rate,feild5name,feild5rate,feild6name,feild6rate,feild7name,feild7rate,feild8name,feild8rate,feild9name,feild9rate,feild10name,feild10rate,circle,custid) ";	
		
		
		while($arraysize<10){	
			$sqlarr.="'0','0',";
			
			$arraysize++;
		}
		
		
		//echo $sqlarr;
							
		$sql=$sql.$sqlarr."'".$arrcircle[$z]."'".","."'".$newid."'".")";	
		///////////////////////////////////////////////////////////////////////////////
		//echo "<br>";		
		//echo $sql;	
		//echo "<br>";		
		
		$res=$this->obj->execute($sql);
		
		if($res){   true;   }else{  echo "Tech Prob Contact 9815618256"; exit();  }
		
		//////////////////////////////////////////////////////////////////////////////
		$z++;
					//////////////////////////////////////
	//echo "--------";
   		
			$sqlarr=" VALUES(";		
						
				}
				//echo "--------";
					/*if($s<5){
						foreach( $extractedarr as $key=>$value):
								echo "--------"; echo $key; echo "--------"; print_r($value); 			                                 echo "--------"; echo "--------";
									//print_r($oo);
							$s++;
							if($s>5){ break;   }
						endforeach;
								}*/
	//endforeach;  
					//		if($s>5){ break;   }
					//echo "Loop executed inner";
				endforeach;
				//echo "<br>";
			 //echo $s;
			 //echo "<br>";
			 //echo "Loop executed";
			 //$s=1;
	endforeach;
	
	return "Customer Created Successfully";
	
}////function brace ends here ....
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function checkZone(){
	
	$sql="SELECT * FROM zonecityincludemastertbls ORDER BY id";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
	
	while($rw=mysql_fetch_array($res)){
	
	$rtn[]=array('myline'=>array('zone'=>$rw['zoneid'],'state'=>$rw['state'],'city'=>$rw['city']));	
		
	}
		
	return $rtn;
	
	}else{
	
	echo "Tech Prob"; exit();
		
	}
	
	
}//////check zone ends here
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function BillRatesWithZone($zone){

 $zone=strtolower($zone);
 $zone = str_replace(' ','',$zone);  

$sql="SELECT * FROM billcntbls WHERE circle='$zone'";



$res=$this->obj->fetch($sql);

if($res){

while($rw=mysql_fetch_array($res)){

$rtn[]=array('myline'=>array('f1'=>$rw['feild1name'],'r1'=>$rw['feild1rate'],'f2'=>$rw['feild2name'],'r2'=>$rw['feild2rate'],'f3'=>$rw['feild3name'],'r3'=>$rw['feild3rate'],'f4'=>$rw['feild4name'],'r4'=>$rw['feild4rate'],'f5'=>$rw['feild5name'],'r5'=>$rw['feild5rate'],'f6'=>$rw['feild6name'],'r6'=>$rw['feild6rate'],'f7'=>$rw['feild7name'],'r7'=>$rw['feild7rate'],'f8'=>$rw['feild8name'],'r8'=>$rw['feild8rate'],'f9'=>$rw['feild9name'],'r9'=>$rw['feild9rate'],'f10'=>$rw['feild10name'],'r10'=>$rw['feild10rate']));	
	
}
	
	
}else{

echo "Tech Prob";	
	
}

return $rtn;	
	
	
}

//////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function picRatesWithZone($zone,$id){

 $zone=strtolower($zone);
 $zone = str_replace(' ','',$zone);  

$sql="SELECT * FROM ratecn WHERE circle='$zone' AND custid=$id";



$res=$this->obj->fetch($sql);

if($res){

while($rw=mysql_fetch_array($res)){

$rtn[]=array('myline'=>array('f1'=>$rw['feild1name'],'r1'=>$rw['feild1rate'],'f2'=>$rw['feild2name'],'r2'=>$rw['feild2rate'],'f3'=>$rw['feild3name'],'r3'=>$rw['feild3rate'],'f4'=>$rw['feild4name'],'r4'=>$rw['feild4rate'],'f5'=>$rw['feild5name'],'r5'=>$rw['feild5rate'],'f6'=>$rw['feild6name'],'r6'=>$rw['feild6rate'],'f7'=>$rw['feild7name'],'r7'=>$rw['feild7rate'],'f8'=>$rw['feild8name'],'r8'=>$rw['feild8rate'],'f9'=>$rw['feild9name'],'r9'=>$rw['feild9rate'],'f10'=>$rw['feild10name'],'r10'=>$rw['feild10rate']));	
	
}
	
	
}else{

echo "Tech Prob";	
	
}

return $rtn;	
	
	
}

//////////////////////////////////////////////////////////////////////////////////////////
function picCustCode(){

$sql="SELECT * FROM cdata";

$res=$this->obj->fetch($sql);

if($res){    

while($rw=mysql_fetch_array($res)){

$rtn[]=array('myline'=>array('custcode'=>$rw['ccode'],'cid'=>$rw['id']));	
	
}

return $rtn;

}else{
	
	echo "Tech Prob"; exit();
	
}




	
	
}
////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
function picCustomerCode($id){

$sql="SELECT ccode FROM cdata WHERE id=$id";

$res=$this->obj->fetch($sql);

if($res){
	
	$rw=mysql_fetch_array($res);
	
	return $rw['ccode'];
	
}else{

echo "Tech Prob"; exit();	

}
	
	
}///function picCustomerCode 
//////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
function picAddnlWeight(){

$sql="SELECT weightslabname,weightslabdesc,parcel_start_at FROM weightslabmastertbls WHERE parcel_start_at=1";	

$res=$this->obj->fetch($sql);

if($res){

$rw=mysql_fetch_array($res);

$rtn=array($rw['weightslabname'],$rw['parcel_start_at']);

return $rtn;
	
}else{
	echo "Tech Prob"; exit();
}
	
}//function picAddWeight
/////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
function picParcelWeight(){

$sql="SELECT weightslabname,weightslabdesc,parcel_start_at FROM weightslabmastertbls WHERE parcel_start_at=2";	
 	
$res=$this->obj->fetch($sql);

if($res){

$rw=mysql_fetch_array($res);

$rtn=array($rw['weightslabname'],$rw['weightslabdesc']);

return $rtn;
	
}else{
	echo "Tech Prob"; exit();
}
	
}//function picAddWeight
/////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
function picAddnlWeightFixRate($zone,$id,$pic){

$sql="SELECT * FROM ratecn WHERE circle='$zone' and custid=$id";	

$res=$this->obj->fetch($sql);

if($res){

$rw=mysql_fetch_array($res);


$rtn[]=array('myline'=>array('f1'=>$rw['feild1name'],'r1'=>$rw['feild1rate'],'f2'=>$rw['feild2name'],'r2'=>$rw['feild2rate'],'f3'=>$rw['feild3name'],'r3'=>$rw['feild3rate'],'f4'=>$rw['feild4name'],'r4'=>$rw['feild4rate'],'f5'=>$rw['feild5name'],'r5'=>$rw['feild5rate'],'f6'=>$rw['feild6name'],'r6'=>$rw['feild6rate'],'f7'=>$rw['feild7name'],'r7'=>$rw['feild7rate'],'f8'=>$rw['feild8name'],'r8'=>$rw['feild8rate'],'f9'=>$rw['feild9name'],'r9'=>$rw['feild9rate'],'f10'=>$rw['feild10name'],'r10'=>$rw['feild10rate']));	

$ansbill=$rtn;

$zonereal=$pic;

foreach($ansbill as $hh):



if($zonereal==$hh['myline']['f1']){ $billrate=$hh['myline']['r1']; 
}elseif($zonereal==$hh['myline']['f2']){ $billrate=$hh['myline']['r2']; 
}elseif($zonereal==$hh['myline']['f3']){ $billrate=$hh['myline']['r3']; 
}elseif($zonereal==$hh['myline']['f4']){ $billrate=$hh['myline']['r4']; 
}elseif($zonereal==$hh['myline']['f5']){ $billrate=$hh['myline']['r5']; 
}elseif($zonereal==$hh['myline']['f6']){ $billrate=$hh['myline']['r6']; 
}elseif($zonereal==$hh['myline']['f7']){ $billrate=$hh['myline']['r7']; 
}elseif($zonereal==$hh['myline']['f8']){ $billrate=$hh['myline']['r8']; 
}elseif($zonereal==$hh['myline']['f9']){ $billrate=$hh['myline']['r9']; 
}elseif($zonereal==$hh['myline']['f10']){ $billrate=$hh['myline']['r10']; 
}


endforeach;


return $billrate;
	
}else{
	echo "Tech Prob"; exit();
}
	
}//function picAddWeight
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
function picAddnlWeightFixRateBill($zone,$id,$pic){

$sql="SELECT * FROM billcntbls WHERE circle='$zone'";	

$res=$this->obj->fetch($sql);

if($res){

$rw=mysql_fetch_array($res);


$rtn[]=array('myline'=>array('f1'=>$rw['feild1name'],'r1'=>$rw['feild1rate'],'f2'=>$rw['feild2name'],'r2'=>$rw['feild2rate'],'f3'=>$rw['feild3name'],'r3'=>$rw['feild3rate'],'f4'=>$rw['feild4name'],'r4'=>$rw['feild4rate'],'f5'=>$rw['feild5name'],'r5'=>$rw['feild5rate'],'f6'=>$rw['feild6name'],'r6'=>$rw['feild6rate'],'f7'=>$rw['feild7name'],'r7'=>$rw['feild7rate'],'f8'=>$rw['feild8name'],'r8'=>$rw['feild8rate'],'f9'=>$rw['feild9name'],'r9'=>$rw['feild9rate'],'f10'=>$rw['feild10name'],'r10'=>$rw['feild10rate']));	

$ansbill=$rtn;

$zonereal=$pic;

foreach($ansbill as $hh):



if($zonereal==$hh['myline']['f1']){ $billrate=$hh['myline']['r1']; 
}elseif($zonereal==$hh['myline']['f2']){ $billrate=$hh['myline']['r2']; 
}elseif($zonereal==$hh['myline']['f3']){ $billrate=$hh['myline']['r3']; 
}elseif($zonereal==$hh['myline']['f4']){ $billrate=$hh['myline']['r4']; 
}elseif($zonereal==$hh['myline']['f5']){ $billrate=$hh['myline']['r5']; 
}elseif($zonereal==$hh['myline']['f6']){ $billrate=$hh['myline']['r6']; 
}elseif($zonereal==$hh['myline']['f7']){ $billrate=$hh['myline']['r7']; 
}elseif($zonereal==$hh['myline']['f8']){ $billrate=$hh['myline']['r8']; 
}elseif($zonereal==$hh['myline']['f9']){ $billrate=$hh['myline']['r9']; 
}elseif($zonereal==$hh['myline']['f10']){ $billrate=$hh['myline']['r10']; 
}


endforeach;


return $billrate;
	
}else{
	echo "Tech Prob"; exit();
}
	
}//function picAddWeight
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
function picCustomerDataForEditing($id){

$sql="SELECT * FROM cdata WHERE id=$id";

$res=$this->obj->fetch($sql);

if($res){
	
	$rw=mysql_fetch_array($res);
	
	$rtn=array($rw["cname"],$rw["cadd"],$rw["cemail"],$rw["ccode"],$rw["cphone"],$rw["id"]);
	
	return $rtn;
	
}else{

echo "Tech Prob"; exit();
	
}
	
	
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
function picCustomerRatesForEditing($id){

$sql="SELECT
ratecn.id,
ratecn.feild1name,
ratecn.feild1rate,
ratecn.feild2name,
ratecn.feild2rate,
ratecn.feild3name,
ratecn.feild3rate,
ratecn.feild4name,
ratecn.feild4rate,
ratecn.feild5name,
ratecn.feild5rate,
ratecn.feild6name,
ratecn.feild6rate,
ratecn.feild7name,
ratecn.feild7rate,
ratecn.feild8name,
ratecn.feild8rate,
ratecn.feild9name,
ratecn.feild9rate,
ratecn.feild10name,
ratecn.feild10rate,
ratecn.created,
ratecn.updated,
ratecn.circle,
ratecn.custid
FROM
ratecn
WHERE
ratecn.custid =  $id
";

$res=$this->obj->fetch($sql);

if($res){
	
	while($rw=mysql_fetch_array($res)){
	
$rtn[]=array('myline'=>array('f1'=>$rw['feild1name'],'r1'=>$rw['feild1rate'],'f2'=>$rw['feild2name'],'r2'=>$rw['feild2rate'],'f3'=>$rw['feild3name'],'r3'=>$rw['feild3rate'],'f4'=>$rw['feild4name'],'r4'=>$rw['feild4rate'],'f5'=>$rw['feild5name'],'r5'=>$rw['feild5rate'],'f6'=>$rw['feild6name'],'r6'=>$rw['feild6rate'],'f7'=>$rw['feild7name'],'r7'=>$rw['feild7rate'],'f8'=>$rw['feild8name'],'r8'=>$rw['feild8rate'],'f9'=>$rw['feild9name'],'r9'=>$rw['feild9rate'],'f10'=>$rw['feild10name'],'r10'=>$rw['feild10rate'],'circle'=>$rw['circle'],'custid'=>$rw['custid']));	
	
	}
	
	return $rtn;
	
}else{

echo "Tech Prob"; exit();
	
}
	
	
}
///////////////////////////////////////////////////////////////////////////////////
function custDataUpdate($customername,$customeremail,$customerphone,$customeradd,$id){
	

$sql="UPDATE cdata SET cname='".$customername."', cemail='".$customeremail."', cphone='".$customerphone."', cadd='".$customeradd."' WHERE id=".$id."";


//$res=$this->obj->fetch($sql);
$res=$this->obj->execute($sql);



if(isset($res)){ return true; }else{ echo "Tech Prob cust"; exit(); }	
	
}

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
function custRateDataUpdate($ratex,$key,$id){
	
$sql="UPDATE ratecn SET feild1rate=$ratex[0],feild2rate=$ratex[1],feild3rate=$ratex[2],feild4rate=$ratex[3],feild5rate=$ratex[4],feild6rate=$ratex[5],feild7rate=$ratex[6],feild8rate=$ratex[7],feild9rate=$ratex[8],feild10rate=$ratex[9] WHERE custid=$id and circle='$key'";



$res=$this->obj->execute($sql);

if(isset($res)){ return true; }else{ echo "Tech Prob rate"; exit(); }	
	
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////	
}///newform class ends here
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class groupCustomer{
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function groupCustomer(){
	$this->obj=new courierbill();	
		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function getCcode(){
	$sql="SELECT * FROM cdata";
	
	$res=$this->obj->fetch($sql);
	
	if($res){  
	
	while($rw=mysql_fetch_array($res)){
	
	$rtn[]=array('myline'=>$rw['ccode']);	
		
	}
	
	    }else{  echo "Tech Prob"; exit();   }	
		
		return $rtn;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function putCcode($code){
	
	$sql="INSERT INTO customergrouptbls (cust_group) VALUES('$code')";
	
	$res=$this->obj->execute($sql);
	
	if($res){ return "Group Created"; }else{  echo "Tech Prob"; exit();    } 
		
		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	function seeGroup(){
	
	$sql="SELECT * FROM customergrouptbls";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
		
		while($rw=mysql_fetch_array($res)){
									
		$rtn[]=$rw['cust_group'];
		
		}
		
	}else{ echo "Tech Prob"; exit();   }
		
		return $rtn;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
function picMyName(){
$sql="SELECT * FROM customermastertbls";	

$res=$this->obj->fetch($sql);

if($res){  $rw=mysql_fetch_array($res);  }else{    }	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
function getFuandSt(){

$sql="SELECT * FROM fcsttbls";

$res=$this->obj->fetch($sql);





if($res){ 

while($rw=mysql_fetch_array($res)){
	
$rtn[]=array('myline'=>array('ft'=>$rw['fule_surcharge'],'st'=>$rw['service_tax'],'taxname'=>$rw['cname']));	
	
}

   }else{  echo "Tech Prob FT and ST"; exit();   }	
   
   return $rtn;
	
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}////group customers
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class booksRecord{
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function booksRecord(){
	$this->obj=new courierbill();	
		
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function inputBookRecord($dateissue,$scn,$ecn,$name,$address,$phone,$email,$reason,$comment){
	
	$dateissue=self::changedate($dateissue);
	$check=1;
	
	$sql1="SELECT * FROM bookrecordtbls WHERE start_cn_number='$scn' OR end_cn_number='$ecn'";
	
	$res1=$this->obj->execute($sql1);
   
     if($res1){ $check=2;     }else{  true;    }	
	
	$sql="INSERT INTO bookrecordtbls (date_of_book_issue,start_cn_number,end_cn_number,name,address,phone,email,reason,comment) Values('$dateissue','$scn','$ecn','$name','$address','$phone','$email','$reason','$comment')";
	
	if($check==1){
	
	$res=$this->obj->execute($sql);
	
	$sql2="UPDATE stockrecordtbls SET book_off=2 WHERE start_cn='$scn' AND end_cn='$ecn' ";
	
	$res2=$this->obj->execute($sql2);
	
	if($res2){ true;    }else{  echo "Tech ProbUpdate"; exit();  }
	
	if($res){
	$b="Book Issued";
	$url= "location:".SITENAME."books/?ans=$b";	
		header($url);
		return $b;
	}else{
	
	echo "Tech Prob"; exit();	
		
	}
		
	}else{  $b="Alredy Issued";
	$url= "location:".SITENAME."books/?ans=$b";	
		header($url);
	      }
		
	}///imput book record
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function inputStockBookRecord($dateissue,$scn,$ecn,$comment){
	
	$dateissue=self::changedate($dateissue);
	
	$check=1;
	
	$sql1="SELECT * FROM stockrecordtbls WHERE start_cn='$scn' OR end_cn='$ecn'";
	
	$res1=$this->obj->execute($sql1);
   
     if($res1){ $check=2;     }else{  true;    }
	 	
	
	$sql="INSERT INTO stockrecordtbls (date_of_stock_en,start_cn,end_cn,comment) Values('$dateissue','$scn','$ecn','$comment')";
	
	if($check==1){
	
	$res=$this->obj->execute($sql);
	
	if($res){
	$b="Stock Entered";
	$url= "location:".SITENAME."books/stock.php?ans=$b";	
		header($url);
		return $b;
	}else{
	
	echo "Tech Prob"; exit();	
		
	}
	
	}else{   $b="Stock Alredy Entered";
	$url= "location:".SITENAME."books/stock.php?ans=$b";	
		header($url);   }
		
	}///imput book record
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function changedate($da)
	{
	
	
	$d=substr($da,0,2);
	$m=substr($da,3,2);
	$y=substr($da,6,4);
	
	
	$rtn=$y."-".$m."-".$d;
	return $rtn;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function checkbookstart($sn){

$sql="SELECT * FROM stockrecordtbls WHERE start_cn = '$sn'";

$res=$this->obj->fetch($sql);

if($res){

return true;
	
}else{
	
	return false;
}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function StockStatusReport(){
	
	$d=date('Y-m-d');
	$d=strtotime($d);
	$upd=$d-933120000;
	
$sql="SELECT * FROM stockrecordtbls WHERE book_off=2 AND UNIX_TIMESTAMP(updated) >=$upd";	

$sql1="SELECT * FROM stockrecordtbls WHERE book_off=1 AND UNIX_TIMESTAMP(updated) >=$upd";



$res=$this->obj->fetch($sql);

if($res){  
$totalissue=mysql_num_rows($res);
while($rw=mysql_fetch_array($res)){

$rtn[]=array('myline'=>array('d'=>$rw['date_of_stock_en'],'sn'=>$rw['start_cn'],'en'=>$rw['end_cn'],'com'=>$rw['comment'],'upd'=>$rw['updated'],'totalissue'=>$totalissue));
}
   }else{ $rtn="No Book Issued";   }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$res1=$this->obj->fetch($sql1);

if($res1){  
$totalstock=mysql_num_rows($res1);
while($rw1=mysql_fetch_array($res1)){

$rtn1[]=array('myline'=>array('d'=>$rw1['date_of_stock_en'],'sn'=>$rw1['start_cn'],'en'=>$rw1['end_cn'],'com'=>$rw1['comment'],'upd'=>$rw1['updated'],'total'=>$totalstock));

}

   }else{ $rtn1="No Book Stock";   }

$realrtn=array($rtn,$rtn1);

return $realrtn;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function checkbookend($en){

$sql="SELECT * FROM stockrecordtbls WHERE end_cn = '$en'";

$res=$this->obj->fetch($sql);

if($res){

return true;
	
}else{
	
	return false;
}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
	

}///class books record
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>