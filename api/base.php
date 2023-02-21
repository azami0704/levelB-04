<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$dns="mysql:host=localhost;charset=utf8;dbname=web18;";
$pdo=new PDO($dns,'root','');

class DB {
    protected $dns="mysql:host=localhost;charset=utf8;dbname=web18;";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->pdo=new PDO($this->dns,'root','');
        $this->table=$table;
    }
    public function all(...$args){
        $sql="SELECT * FROM `$this->table` ";
        if(isset($args[0])){
            if(is_array($args[0])){
                $sql.=" WHERE ".join(" AND ",$this->arrToSql($args[0]));
            }else{
                $sql.=$args[0];
            }
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $sql="SELECT * FROM `$this->table` ";
        if(is_array($id)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($id));
        }else{
            $sql.=" WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function save($data){
        if(isset($data['id'])){
            $id=$data['id'];
            unset($data['id']);
            $sql="UPDATE `$this->table` SET ".join(" , ",$this->arrToSql($data))." WHERE `id`='$id'";
        }else{
            $keys=array_keys($data);
            $sql="INSERT INTO `$this->table` (`".join("` , `",$keys)."`) VALUES ('".join("' , '",$data)."')";
        }
        return $this->pdo->exec($sql);
    }
    public function del($id){
        $sql="DELETE FROM `$this->table` ";
        if(is_array($id)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($id));
        }else{
            $sql.=" WHERE `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
    public function count($arg){
        return $this->mathSql('COUNT','*',$arg);
    }
    public function sum($col,$arg){
        return $this->mathSql('SUM',$col,$arg);
    }
    public function min($col,$arg){
        return $this->mathSql('MIN',$col,$arg);
    }
    public function max($col,$arg){
        return $this->mathSql('MAX',$col,$arg);
    }

    private function arrToSql($arr) {
        $res=[];
        foreach($arr as $key=>$val){
            $res[]="`$key`='$val'";
        }
        return $res;
    }
    private function mathSql($math,$col,$arg) {
        $sql="SELECT $math($col) FROM `$this->table` ";
        if(is_array($arg)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($arg));
        }else if($arg!=1){
            $sql.=$arg;
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

}
function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url){
    header("location:".$url);
}

$Bottom = new DB('bottom');
$Member = new DB('member');
$Admin=new DB('admin');
$Th=new DB('th');
$Goods=new DB('goods');
$Orders=new DB('orders');
?>