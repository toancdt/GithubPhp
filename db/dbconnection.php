<?php
/*class da test cac phuong thuc OK, chi con 2 phuong thuc update va delete la chua test*/
class dbconnection
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    public $conn;

/*****************************************************************************************
		Khoi tao new host and database
*****************************************************************************************/
public function __construct($newhost="localhost",$newdbname="dbtest",$newdbuser="root",$newdbpass="")
{
	$this->db_host = (is_null($newhost)?"localhost":$newhost);
	$this->db_name = (is_null($newdbname)?"dbtest":$newdbname);
	$this->db_user = (is_null($newdbuser)?"root":$newdbuser);
	$this->db_pass = (is_null($newdbpass)?"":$newdbpass);
}

/*****************************************************************************************
  connect : Dùng để connect vào database MySQL. Phương thức này sẽ trả lại giá trị false
  và kết thúc làm việc nếu như connect vào database bị lỗi.
*****************************************************************************************/
public function connect()
{
	if(!$this->conn)
	{
		$this->conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
		if($this->conn)
		{
			return true; 
		} else
		{
			return false;
			exit();
		}
	} else
	{
		return true; 
	}
}

/*****************************************************************************************
 execute : Dùng để thực thi câu SQL thông qua sử dụng phương thức connect để tạo kết nối. 
 Điều kiện thi hành : In ra câu thông báo lỗi SQL nếu như quá trình thi hành có lỗi.
*****************************************************************************************/
	public function execute($sql)
	{
		$this->connect();
		$result =$this->conn->query($sql);
		if($result)
		{
			return $result;
		} else
		{
			echo "Error execute query: " . $this->conn->error;
			return false;
		}
	}

/*****************************************************************************************
		createtable : Để tạo một bảng, áp dụng tạo bảng có các trường dữ liệu như sau 
		(có tên bảng tbl_user:
*****************************************************************************************/
	public function createtable()
	{
		$sql="CREATE TABLE IF NOT EXISTS tbl_user
		(
			user_id INT(11) NOT NULL AUTO_INCREMENT,
			name VARCHAR(60) NOT NULL,
			username VARCHAR(25) NOT NULL,
			password VARCHAR(32) NOT NULL,
			user_email VARCHAR(255) NOT NULL,
			femail VARCHAR(255) NOT NULL,
			user_from VARCHAR(100) DEFAULT NULL,
			user_interests VARCHAR(150) NOT NULL,  
			user_sig VARCHAR(255) DEFAULT NULL,
			user_viewemail TINYINT(2) DEFAULT NULL,
			user_theme INT(3) DEFAULT NULL,
			user_aim VARCHAR(18) DEFAULT NULL,
			user_yim VARCHAR(25) DEFAULT NULL,
			user_msnm VARCHAR(25) DEFAULT NULL,
			user_password VARCHAR(40) NOT NULL,  
		    PRIMARY KEY(user_id)
		)ENGINE=INNODB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
		return $this->execute($sql);
	}

/*****************************************************************************************
		Kiem tra bang co ton tai trong database khong.
*****************************************************************************************/
public $result = array(); 

public function tableExists($table)
    {
        $tablesInDb = $this->conn->query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($tablesInDb)
        {
            if($tablesInDb->num_rows==1)
            {
                return true; 
            }
            else
            { 
                return false; 
            }
        }
    }

/*****************************************************************************************
		getnumrows : Dùng để lấy số bản ghi thông tin qua câu lệnh SELECT.
		i. Áp dụng cho bảng tbl_user
*****************************************************************************************/
public function getnumrows($table, $cols = '*', $where = null, $order = null)
{
	$sql = 'SELECT '.$cols.' FROM '.$table;
	if($where != null)
		$sql .= ' WHERE '.$where;
	if($order != null)
		$sql .= ' ORDER BY '.$order;
	if($this->tableExists($table))
    {
		$query = $this->execute($sql);
		if($query)
		{
			return $query->num_rows;
		}
		else
		{
			echo "Query error: ".$this->conn->error;
			return false; 
		}
	}
	else
		echo "Table $table does not exits";
		return false; 
}

/*****************************************************************************************
		getrows : Dùng để lấy về list các bản ghi thông qua câu lệnh SELECT.
		i. Áp dụng cho bảng tbl_user.
*****************************************************************************************/
public function select($table, $cols = '*', $where = null, $order = null)
{
	$sql = 'SELECT '.$cols.' FROM '.$table;
	if($where != null)
		$sql .= ' WHERE '.$where;
	if($order != null)
		$sql .= ' ORDER BY '.$order;
	if($this->tableExists($table))
    {
		$query = $this->execute($sql);
		//echo "<br>select query result: ";
		//var_dump($query);
		//print_r($query);
		if($query)
		{
			$numResults = $query->num_rows;
			//echo "<br>number of rows = ".$numResults;
			for($i = 0; $i < $numResults; $i++)
			{
				$r = $query->fetch_array();
				//echo "<br>r = ";
				//var_dump($r);
				$key = array_keys($r);
				for($x = 0; $x < count($key); $x++)
				{
					// Sanitizes keys so only alphavalues are allowed
					if(!is_int($key[$x]))
					{
						if($query->num_rows > 1)
							$this->result[$i][$key[$x]] = $r[$key[$x]];
						else if($query->num_rows < 1)
							$this->result = null; 
						else
							$this->result[$key[$x]] = $r[$key[$x]]; 
					}
				}
			}            
			return true; 
		}
		else
		{
			return false; 
		}
	}
	else
		return false; 
}
/*****************************************************************************************
		Thực hiện câu lệnh insert.
*****************************************************************************************/
public function insert($table,$values,$rows = null)
    {
        if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            if($rows != null)
            {
                $insert .= ' ('.$rows.')'; 
            }
 
            for($i = 0; $i < count($values); $i++)
            {
                if(is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
//The implode(separator,array) function returns a string from the elements of an array
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.')';
            $ins = mysqli_query($this->conn,$insert);            
            if($ins)
            {
                return true; 
            }
            else
            {
                return false; 
            }
        }
    }

/*****************************************************************************************
		Thực hiện câu lệnh delete.
*****************************************************************************************/
public function delete($table,$where = null)
    {
        if($this->tableExists($table))
        {
            if($where == null)
            {
                $delete = 'DELETE '.$table; 
            }
            else
            {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where; 
            }
            $del = mysqli_query($this->conn,$delete);
 
            if($del)
            {
                return true; 
            }
            else
            {
               return false; 
            }
        }
        else
        {
            return false; 
        }
    }

/*****************************************************************************************
		Thực hiện câu lệnh update.
*****************************************************************************************/
public function update($table,$rows,$where)
    {
        if($this->tableExists($table))
        {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            for($i = 0; $i < count($where); $i++)
            {
                if($i%2 != 0)
                {
                    if(is_string($where[$i]))
                    {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode('=',$where);
             
             
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows); 
            for($i = 0; $i < count($rows); $i++)
           {
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                 
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ','; 
                }
            }
            $update .= ' WHERE '.$where;
            $query = mysql_query($this->conn,$update);
            if($query)
            {
                return true; 
            }
            else
            {
                return false; 
            }
        }
        else
        {
            return false; 
        }
    }

/*****************************************************************************************
	getnextid : Dùng để lấy ra ID tiếp theo của bảng sau khi thực hiện câu lệnh insert.
	i. Áp dụng cho bảng tbl_user 
*****************************************************************************************/
	public function getnextid()
	{
		return ($this->conn->insert_id+1);
	}
	
/*****************************************************************************************
		freeresult : Dùng phương thức này để giải phóng bộ nhớ sau khi lấy kết quả trả về 
		i.      Áp dụng :
		1.       Dùng method connect để connect vào database
		2.       Dùng execute thực hiện select bảng tbl_user
		3.       Dùng getnumrows để lấy ra số bản ghi
		4.       Dùng getrows để in ra toàn bộ các bản ghi đã select được
		5.       Giải phóng bộ nhớ.
*****************************************************************************************/
public function freeresult()
{
	$this->connect();
	$sql="select * from tbl_user";
	$this->execute($sql);
	$row_num = $this->getnumrows("tbl_user");
	$sel_res = $this->select("tbl_user");
	echo "Number of row = ".$row_num;
	print_r($sel_res);
	mysqli_free_result($row_num);
	mysqli_free_result($sel_res);
}

/*****************************************************************************************
		close : Phương thức thức dùng để đóng kết nối với mysql
*****************************************************************************************/
public function disconnect()
{
    if($this->conn)
    {
        if(mysqli_close($this->conn))
        {
            $this->conn = false; 
            return true; 
        }
        else
        {
            return false; 
        }
    }
}
/*****************************************************************************************
Ham huy ket noi voi db
    public function __destruct(){
        $this->disconnect();
    } 
*****************************************************************************************/
}


/*****************************************************************************************
Vi du dung cac lenh insert, update, delete

creat table musqlcrud(
id integer not null primary key,
name varchar(20),
email varchar(100)
);

insert into mysqlcrud value (0,'Name 1','the@fir.st') ;
insert into mysqlcrud value (1,'Name 2','the@seco.nd') ;
insert into mysqlcrud value (2,'Name 3','the@thi.rd') ;

<?php;
include('crud.php');
$db = new Database();
$db->connect();
$db->select('mysqlcrud');
$res = $db->getResult();
print_r($res);
?>

<?php;
$db->update('mysqlcrud',array('name'=>'Changed!'),array('id',1));
$db->update('mysqlcrud',array('name'=>'Changed2!'),array('id',2));
$res = $db->getResult();
print_r($res);
?>

;<?php;
$db->insert('mysqlcrud',array(3,"Name 4","this@wasinsert.ed"));
$res = $db->getResult();
print_r($res);
?>
*****************************************************************************************/
?>
