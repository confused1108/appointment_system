<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 1:30 PM
 */
Class UserModel extends CI_Model
{

    Public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function apply_form(){
        $result=array();
        $sql="SElECT * FROM category";
        $query=$this->db->query($sql);
        $result['catdata']=$query->result_array();
        $sql="SELECT * FROM slots";
        $query=$this->db->query($sql);
        $result['slotdata']=$query->result_array();
        $sql="SELECT * FROM days";
        $query=$this->db->query($sql);
        $result['daydata']=$query->result_array();
        $sql="SELECT * FROM appointments ORDER BY id DESC";
        $query=$this->db->query($sql);
        $result['appdata']=$query->result_array();
        return $result;
    }
    public function submit_date($date){
        $result=array();
        $sql="SElECT * FROM category";
        $query=$this->db->query($sql);
        $result['catdata']=$query->result_array();
        $sql="SELECT * FROM slots";
        $query=$this->db->query($sql);
        $result['slotdata']=$query->result_array();
        $sql="SELECT * FROM days";
        $query=$this->db->query($sql);
        $result['daydata']=$query->result_array();
        $day_id=date('w', strtotime($date));
        $sql="SELECT * from slots where day_id='$day_id'";
        $query=$this->db->query($sql);
        $result['timedata']=$query->result_array();
        $result['datedata']=$date;
        return $result;
    }
    public function add_appointment($datarem){
        $result =array();
        $name=$datarem['name'];
        $number=$datarem['number'];
        $date=$datarem['date'];
        $category=$datarem['category'];
        $h0=$datarem['thour'];
        $m0=$datarem['tmin'];
        $slot=$datarem['slot'];

        $sql="SElECT * FROM category";
        $query=$this->db->query($sql);
        $result['catdata']=$query->result_array();
        $sql="SELECT * FROM slots";
        $query=$this->db->query($sql);
        $result['slotdata']=$query->result_array();
        $sql="SELECT * FROM days";
        $query=$this->db->query($sql);
        $result['daydata']=$query->result_array();
        $day_id=date('w', strtotime($date));
        $sql="SELECT * from slots where day_id='$day_id'";
        $query=$this->db->query($sql);
        $result['timedata']=$query->result_array();
        $result['datedata']=$date;

        $result['appdata']=$datarem;
        $result['name']=$name;
        $result['number']=$number;
        $result['date']=$date;
        $result['category']=$category;
        $result['thour']=$h0;
        $result['tmin']=$m0;
        $day_id=date('w', strtotime($date));
        $year = date('y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $sql="SELECT * FROM category WHERE cat_id='$category'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $result['data'] = $query->result_array();
            $time = $result['data'][0]['cat_minutes'];
            $cat_name=$result['data'][0]['cat_name'];
        }
        $sql="SELECT panel_num FROM panels";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $result['data1'] = $query->result_array();
            $panel = $result['data1'][0]['panel_num'];
        }
        $sql="SELECT * FROM slots WHERE slot_id='$slot'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $result['data2'] = $query->result_array();
            $h1 = $result['data2'][0]['start_hour'];
            $h2 = $result['data2'][0]['end_hour'];
            $m1 = $result['data2'][0]['start_minute'];
            $m2 = $result['data2'][0]['end_minute'];
        }
        if($h1<=$h0 && $h2>=$h0){
            if($h1==$h0 && $m1>$m0){
                $result['error']="yes";
                return $result;
            }
            if($h2==$h0 && $m0>$m2){
                $result['error']="yes";
                return $result;
            }
            if($h2==$h0 && $m2>=$time && ($m2-$time)>$m0){
                $result['error']="yes2";
                return $result;
            }
            if ($m2<$time){
                if($h2==$h0){
                    $result['error']="yes2";
                    return $result;
                }
                else{
                    $r=$time-$m2;
                    $a=round($r/60, 0, PHP_ROUND_HALF_DOWN);
                    $b=$r%60;
                    $m3=60-$b;
                    $h3=$h2-1-$a;
                    if($h0>$h3){
                        $result['error']="yes2";
                        return $result;
                    }
                    else if($h0==$h3 && $m3<$m0){
                        $result['error']="yes2";
                        return $result;
                    }
                }

            }
            $sql="SELECT * FROM appointments WHERE slot='$slot' AND day='$day' AND month='$month' AND year='$year'";
            $query=$this->db->query($sql);
            $a=$m0+$time;
            if($a>60){
                $b=$h0+1;
                $c=$m0+$time-60;
            }
            else{
                $b=$h0;//my_end_hour
                $c=$a;//my_end_minute
            }
            if($query->num_rows()<$panel){
                $sql="INSERT INTO appointments (name,number,category,cat_name,start_hour,end_hour,start_minute,end_minute,day,month,year,slot) VALUES ('".$name."','".$number."','".$category."','".$cat_name."','".sprintf("%02d", $h0)."','".sprintf("%02d", $b)."','".sprintf("%02d", $m0)."','".sprintf("%02d", $c)."','".$day."','".$month."','".$year."','".$slot."')";
                $this->db->query($sql);
                $result['error']="no";
                return $result;
            }
            else{
                $count=0;
                $rows = $query->result();
                foreach( $rows as $row )
                {
                    $h6=$row->start_hour;
                    $m6=($row->start_minute)/60;
                    $t1=$h6+$m6;
                    $h7=$row->end_hour;
                    $m7=($row->end_minute)/60;
                    $t2=$h7+$m7;
                    $t3=$h0+($m0/60);
                    $t4=$b+($c/60);
                    if(($t3>=$t1 && $t3<$t2) || ($t4>$t1 && $t4<=$t2)){
                        $result['error']="yes1";
                        return $result;
                    }
                    else{
                        $sql="INSERT INTO appointments (name,number,category,cat_name,start_hour,end_hour,start_minute,end_minute,day,month,year,slot) VALUES ('".$name."','".$number."','".$category."','".$cat_name."','".sprintf("%02d", $h0)."','".sprintf("%02d", $b)."','".sprintf("%02d", $m0)."','".sprintf("%02d", $c)."','".$day."','".$month."','".$year."','".$slot."')";
                        $this->db->query($sql);
                        $result['error']="no";
                        return $result;
                    }
                }
            }
        }
        else{
            $result['error']="yes";
            return $result;
        }


    }
}
?>