<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/20/2018
 * Time: 4:11 PM
 */
Class AdminModel extends CI_Model
{

    Public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checklogin($datarem)
    {
        $username = $datarem['username'];
        $password = $datarem['password'];
        $result = array();
        $sql = "SELECT * from admin where username='$username' AND password='$password'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result['status'] = true;
        }
        return $result;
    }
    public function dashboard(){
        $sql="SELECT * FROM appointments ORDER BY id DESC";
        $query=$this->db->query($sql);
        $result=array();
        $result['appdata']=$query->result_array();
        return $result;
    }
//    All about category starts
    public function category()
    {
        $result = array();
        $sql = "SELECT * from category";
        $query = $this->db->query($sql);
        $result['catdata'] = $query->result_array();
        return $result;
    }

    public function add_category($datarem)
    {
        $name = $datarem['name'];
        $time = $datarem['time'];
        foreach ($name as $key => $n) {
            $sql = "INSERT INTO category (cat_name,cat_minutes) VALUES ('" . $n . "','" . $time[$key] . "')";
            $this->db->query($sql);
        }
    }

    public function remove_cat($cat_id)
    {
        $sql = "DELETE FROM category where cat_id='$cat_id'";
        $this->db->query($sql);
    }

    public function update_cat($cat_id)
    {
        $sql = "SELECT * FROM category where cat_id='$cat_id'";
        $query = $this->db->query($sql);
        $result = array();
        $result['catdata'] = $query->result_array();
        return $result;
    }

    public function update_cat_data($datarem)
    {
        $cat_id = $datarem['cat_id'];
        $name=$datarem['name'];
        $time=$datarem['time'];
        $sql="UPDATE category SET cat_name='$name',cat_minutes='$time' WHERE cat_id='$cat_id' ";
        $this->db->query($sql);
    }
    //All about category ends

    //All about slots starts
    public function slots(){
        $result=array();
        $sql="SELECT * FROM days";
        $query=$this->db->query($sql);
        $result['daydata']=$query->result_array();
        return $result;
    }
    public function slot_detail($day_id){
        $sql="SELECT * FROM slots WHERE day_id='$day_id'";
        $query=$this->db->query($sql);
        $result=array();
        $result['slotdata']=$query->result_array();
        return $result;
    }
    public function add_slots($datarem){
        $sth = $datarem['sth'];
        $stm = $datarem['stm'];
        $enh = $datarem['enh'];
        $enm = $datarem['enm'];
        $day_id=$datarem['day_id'];
        $sql="DELETE FROM slots WHERE day_id='$day_id'";
        $this->db->query($sql);
        foreach ($sth as $key => $n) {
            $sql="Insert into slots (day_id,start_hour,start_minute,end_hour,end_minute) VALUES ('".$day_id."','".$n."','".$stm[$key]."','".$enh[$key]."','".$enm[$key]."')";
            $this->db->query($sql);
        }
    }
    //All about slots ends

    //All about panels starts
    public function panels(){
        $sql="SELECT * FROM panels";
        $query=$this->db->query($sql);
        $result=array();
        $result['paneldata']=$query->result_array();
        return $result;
    }
    public function add_panel($datarem){
        $panel_id=$datarem['panel_id'];
        $panel=$datarem['panel'];
        $sql="UPDATE panels SET panel_num='$panel' WHERE panel_id='$panel_id'";
        $this->db->query($sql);
    }
    //All about panels ends
}