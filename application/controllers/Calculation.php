<?php
class Calculation extends CI_Controller
{
    public function index()
    {
        $data['evaluation'] = $this->Evaluation_model->get_all_evaluation1();
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['title'] = "Calculation";

        // Mendapatkan data yang diperlukan dari model atau sumber daya lain
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/calculation/index', $data);
        $this->load->view('component/admin/footer');
    }
}
