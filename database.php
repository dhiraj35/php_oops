<?php 
 $GLOBALS['conf'] = parse_ini_file('config.php', true);
class database {
    private $dbName,$dbUsername,$dbPasswod,$dbLocalhost;

    protected function connect(){
        $this->dbName=$GLOBALS['conf']['localconfig']['dbname'];
        $this->dbLocalhost=$GLOBALS['conf']['localconfig']['localhost'];
        $this->dbUsername=$GLOBALS['conf']['localconfig']['username'];
        $this->dbPasswod=$GLOBALS['conf']['localconfig']['password'];
        $con = new mysqli($this->dbLocalhost,$this->dbUsername,$this->dbPasswod,$this->dbName);
        return $con;
    }
}
class query extends database {
    public function getData($table,$fields='*',$condition='',$orderByColoum='',$orderByValue='',$limit=''){
        $sql = "select $fields from $table";
        if($condition!=''){
            $conditionWhere = ' where ';
            foreach($condition as $key => $value){
                $conditionWhere .= " $key = $value and";
            }
            $sql .= rtrim($conditionWhere," and ");
        }

        if($orderByColoum!='' && $orderByValue){ 
            $sql.= " order by $orderByColoum $orderByValue "; 
        }
        if($limit!=''){
            $sql.= " limit $limit "; 
        }
        $result = $this->connect()->query($sql);
        if($result->num_rows >0){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }

    }
    public function insertData($table,$insertArr=''){
        if($insertArr!=''){
            $fields  = [];
            $value   = [];
            foreach($insertArr as $key => $values){
                $fields[]=$key;
                $value[]=$values;
            }
            $insertColoum  = implode(",",$fields);
            $insertValues  = "'".implode("','",$value)."'";
            $sql="insert into $table ($insertColoum) values($insertValues)";
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
    public function deleteData($table,$deleteArr=''){
        if($deleteArr!=''){
            $deleteWhere = '';
            foreach($deleteArr as $key => $value){
                $deleteWhere .= " $key = $value and ";
            }
            $deleteWhere = rtrim($deleteWhere," and ");
            $sql="delete from $table where $deleteWhere";
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
    public function updateData($table,$conditionArr='',$whereArr=''){
        $sql="update $table set ";
        if($conditionArr!=''){
            $updatecond = '';
            foreach($conditionArr as $updatekey => $updateVal){
                $updatecond .=" $updatekey = '$updateVal' , ";
            }
            $sql .= rtrim($updatecond," , ");
        }
        if($whereArr!=''){
            $whereCond =' where ';
            foreach($whereArr as $whereKey => $whereVal){
                $whereCond .= " $whereKey = $whereVal and ";
            }
            $sql .= rtrim($whereCond, " and ");
        }
        $result = $this->connect()->query($sql);
        return $result;
    }
    public function escapeData($str){
        if($str!=''){
            return mysqli_real_escape_string($this->connect(),$str);
        }
    }

}