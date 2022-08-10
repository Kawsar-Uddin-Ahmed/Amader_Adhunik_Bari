<?php

include "lib/database.php";
include "format/format.php";
?>

<?php

class payment
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new database();
		$this->fm = new format();
	}
	public function pay($data)
	{

		$em = $this->fm->validation($data['email']);
		$eem = mysqli_real_escape_string($this->db->link,$em);

		$rem = $this->fm->validation($data['remail']);
		$reem = mysqli_real_escape_string($this->db->link,$rem);

		$mont = $this->fm->validation($data['month']);
		$Month = mysqli_real_escape_string($this->db->link,$mont);

		$Year = $this->fm->validation($data['year']);
		$YEAR = mysqli_real_escape_string($this->db->link,$Year);

		$r = $this->fm->validation($data['rentbill']);
		$rr = mysqli_real_escape_string($this->db->link,$r);

		$w = $this->fm->validation($data['waterbill']);
		$ww = mysqli_real_escape_string($this->db->link,$w);

		$e = $this->fm->validation($data['electricbill']);
		$ee = mysqli_real_escape_string($this->db->link,$e);

		$g = $this->fm->validation($data['gasbill']);
		$gg = mysqli_real_escape_string($this->db->link,$g);

		$f1 = $this->fm->validation($data['flat_no']);
		$ff1 = mysqli_real_escape_string($this->db->link,$f1);

		$fc = $this->fm->validation($data['flat_code']);
		$ffc = mysqli_real_escape_string($this->db->link,$fc);
        
        if(is_numeric($data['rentbill']) && is_numeric($data['waterbill']) && is_numeric($data['electricbill']) && is_numeric($data['gasbill']))
        {
		      $tot = $data['rentbill'] + $data['waterbill'] + $data['electricbill'] + $data['gasbill'];
	}

		if($eem == "" || $reem == "" || $Month == "" || $YEAR == "" || $rr == "" || $ww == "" || $ee == "" || $gg == "" || $ff1 == "" || $ffc == "")
		{
			$msg = "<span class='error'>Field must be filled....</span>";
			return $msg;
		}
		$myquery = "SELECT * FROM tbl_payment WHERE month='$Month' AND year = '$YEAR' AND (status = 1 OR status = 0) LIMIT 1";
        $myquery1 = $this->db->select($myquery);
        if($myquery1 != false)
        {
        	$msg = "<span style='color:red'>Already paid.</span>";
			return $msg;
        }
		else
		{
			$query = "INSERT INTO  tbl_payment (email,remail,month,year,rentbill,waterbill,electricbill,gasbill,total,flat_no,flat_code)
                      VALUES('$eem','$reem','$Month','$YEAR','$rr','$ww','$ee','$gg','$tot','$ff1','$ffc') ";
   	        $q=$this->db->insert($query);
			if($q)
			{
				$msg = "<span class='success'>Send to owner successfully</span>";
			    return $msg;
			}
		}

   }

   public function showprofile($id)

{
  $query = "SELECT flat_no FROM tbl_renter WHERE renter_id = $id";
  $result = $this->db->select($query);

  return $result;
}
 public function showflatcode($id)

{
  $query = "SELECT flat_code FROM tbl_renter WHERE renter_id = $id";
  $result = $this->db->select($query);

  return $result;
}

    public function monthe()
    {
    	$sql = "SELECT * FROM month";
    	$q = $this->db->select($sql);
    	return $q;

    }

    


	}

?>