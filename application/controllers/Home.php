<?php
class Home extends CI_Controller
{
    public function index()
    {
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['title'] = "Dashboard";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/dashboard/index', $data);
        $this->load->view('component/admin/footer');
    }
}
