<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/20/2018
 * Time: 4:10 PM
 */
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

    }
    public function index(){
        if(!isset($_SESSION['username']))
        $this->load->view('admin/login');
        else
            redirect("Admin/dashboard");
    }
    public function dashboard(){
        $this->load->Model('AdminModel');
        $sheet=$this->AdminModel->dashboard();
        //print_r($sheet);exit();
        $this->load->view("admin/dashboard",$sheet);
    }
    public function checklogin(){
        $data=array();
        $data['username']=$_POST['username'];
        $data['password']=sha1($_POST['password']);
        $this->load->Model('AdminModel');
        $sheet = $this->AdminModel->checklogin($data);
        if($sheet['status']==TRUE){
            //echo "Signed in successfully";
            $this->session->set_userdata('username',$data['username']);
            redirect("Admin/dashboard");
        }
        else{
            redirect("Admin");
        }
    }
    public function slots(){
        $this->load->Model('AdminModel');
        $sheet = $this->AdminModel->slots();
        $this->load->view("admin/slots",$sheet);
    }
    public function slot_detail(){
        $day_id=$_GET['day_id'];
        $this->load->Model('AdminModel');
        $sheet = $this->AdminModel->slot_detail($day_id);
        $this->load->view("admin/slot_detail",$sheet);
    }
    public function add_slots()
    {
        $data = array();
        $data['day_id']=$_GET['day_id'];
        $day_id=$_GET['day_id'];
        $data['sth'] = $_POST['sth'];
        $data['stm'] = $_POST['stm'];
        $data['enh'] = $_POST['enh'];
        $data['enm'] = $_POST['enm'];
        $this->load->Model('AdminModel');
        $this->AdminModel->add_slots($data);
        redirect("Admin/slot_detail/?day_id=$day_id");
    }
    public function category(){
        $this->load->Model('AdminModel');
        $sheet = $this->AdminModel->category();
        $this->load->view("admin/category",$sheet);
    }
    public function add_category(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['time']=$_POST['time'];
        $this->load->Model('AdminModel');
        $this->AdminModel->add_category($data);
        redirect("admin/category");
    }
    public function remove_cat(){
        $cat_id=$_GET['cat_id'];
        $this->load->Model('AdminModel');
        $this->AdminModel->remove_cat($cat_id);
        redirect("admin/category");
    }
    public function update_cat(){
        $cat_id=$_GET['cat_id'];
        $this->load->Model('AdminModel');
        $sheet=$this->AdminModel->update_cat($cat_id);
        $this->load->view("admin/update_cat",$sheet);
    }
    public function update_cat_data(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['time']=$_POST['time'];
        $data['cat_id']=$_GET['cat_id'];
        $this->load->Model('AdminModel');
        $sheet=$this->AdminModel->update_cat_data($data);
        redirect("admin/category");
    }
    public function panels(){
        $this->load->Model('AdminModel');
        $sheet=$this->AdminModel->panels();
        $this->load->view("admin/panels",$sheet);
    }
    public function add_panel(){
        $data=array();
        $data['panel_id']=$_GET['panel_id'];
        $data['panel']=$_POST['panel'];
        $this->load->Model('AdminModel');
        $this->AdminModel->add_panel($data);
        redirect("admin/panels");
    }
}