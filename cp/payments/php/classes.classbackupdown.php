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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
	
	$sql="SELECT releasebills.cucode,releasebills.fd,releasebills.td,releasebills.ba,releasebills.paid,releasebills.billam,releasebills.id,payments.billno,payments.id,payments.totalamt,payments.paidamt,payments.obalance,payments.paydate,payments.notes FROM releasebills Left Join payments ON releasebills.id = payments.billno where UNIX_TIMESTAMP(STR_TO_DATE(releasebills.fd, '%d-%m-%Y'))>=$this->fd AND UNIX_TIMESTAMP(STR_TO_DATE(releasebills.td, '%d-%m-%Y'))<=$this->td LIMIT 500
";

	$p=1;
    $checkvar='';
	$rtn='';
//where STR_TO_DATE(releasebills.fd, '%d-%m-%Y')>=STR_TO_DATE('".$this->fd."', '%d-%m-%Y') AND STR_TO_DATE(releasebills.td, '%d-%m-%Y')>=STR_TO_DATE('".$this->td."', '%d-%m-%Y')
	$res=$this->obj->fetch($sql);	
	if($res){ 
	while($rw=mysql_fetch_array($res))
	{
		$rtn.="<tr>";
		$rtn.="<td colspan='12' ></td>";
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
		
		if($checkvar!='')
		{ if($checkvar==$rw[6] && $p==1){ $rtn.="<tr><td colspan='12'><font color='#063'> ↑ Repeat Payment For Above Bill No .....</font></tr>"; $p=2;  }elseif($checkvar!=$rw[6] && $p==2){  $rtn.="<tr><td colspan='12' ><font color='#063'>→  _________________________________________________________________________________________________________________________</font></td></tr>"; $p=1; }
		
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
		$this->td=$this->td-19800;
		$this->fd=$this->fd-19800;
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
	
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
		$this->fd=$this->fd-19800;
		$this->td=$this->td-19800;
		
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
	$obj->fd=$obj->fd-19800;
	$obj->td=$obj->td-19800;
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
	$this->fd=$this->fd-19800;
	$this->td=$this->td-19800;
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
	$obj->fd=$obj->fd-19800;
	$obj->td=$obj->td-19800;
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
			$rtn=$rtn-19800;
			return $rtn;
			}
				
	
	
}//class bill details

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>