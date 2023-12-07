<?php
class Evaluation extends CI_Controller
{
    public function index()
    {
        $this->load->model('Evaluation_model');
        $data['evaluation'] = $this->Evaluation_model->get_all_evaluation();
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['subcriteria'] = $this->SubCriteria_model->get_all_sub_criteria();
        $data['title'] = "Evaluation";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/evaluation/index', $data);
        $this->load->view('component/admin/footer');
    }

    public function input($alternative_id)
    {
        $data['id_alternative'] = $alternative_id;
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['subcriteria'] = $this->SubCriteria_model->get_all_sub_criteria();
        $data['title'] = "Evaluation";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/evaluation/add', $data);
        $this->load->view('component/admin/footer');
    }

    public function save($alternative_id)
    {
        // Proses penyimpanan data sub kriteria baru

        $data = array();
        $criteria = $this->Criteria_model->get_all_criteria();


        foreach ($criteria as $key => $value) {
            $data[] = array(
                'alternative_id' => $alternative_id,
                'criteria_id' => $this->input->post('criteria' . $key),
                'value' => $this->input->post('value' . $key)
            );
        }

        // var_dump($data);
        // die();


        $this->Evaluation_model->add_evaluation_batch($data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('evaluation');
    }

    public function edit($alternative_id)
    {
        $data['id_alternative'] = $alternative_id;
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['subcriteria'] = $this->SubCriteria_model->get_all_sub_criteria();
        $data['evaluation'] = $this->Evaluation_model->get_evaluation_by_alternative($alternative_id);
        // var_dump($data['evaluation']);
        // die();
        $data['title'] = "Evaluation";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/evaluation/edit', $data);
        $this->load->view('component/admin/footer');
    }

    public function update($alternative_id)
    {
        // Proses penyimpanan data sub kriteria baru

        $data = array();
        $criteria = $this->Criteria_model->get_all_criteria();

        foreach ($criteria as $key => $value) {
            $data[] = array(
                'alternative_id' => $alternative_id,
                'criteria_id' => $this->input->post('criteria' . $key),
                'value' => $this->input->post('value' . $key),
                'id' => $this->input->post('id' . $key),
            );
        }

        // var_dump($data, $id);
        // die();

        $this->Evaluation_model->update_evaluation_batch($data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('evaluation');
    }
}
