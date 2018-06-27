<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 1:29 PM
 */
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

    }
    public function index(){
        $this->load->Model('UserModel');
        $sheet = $this->UserModel->apply_form();
        $this->load->view("user/form1",$sheet);
    }
    public function add_appointment(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['number']=$_POST['number'];
        $data['category']=$_POST['category'];
        $data['date']=$_POST['date'];
        $data['thour']=$_POST['thour'];
        $data['tmin']=$_POST['tmin'];
        $data['slot']=$_POST['slot'];
        $this->load->Model('UserModel');
        $sheet=$this->UserModel->add_appointment($data);
        //print_r($sheet);exit();
        $this->load->view("user/apply",$sheet);
    }
    public function submit_date(){
        $date=$_POST['date'];
        $this->load->Model('UserModel');
        $sheet=$this->UserModel->submit_date($date);
        //print_r($sheet);exit();
        $this->load->view("user/apply",$sheet);
    }
}
?>