<?php
class SubCriteria extends CI_Controller
{
    public function index()
    {
        $this->load->model('SubCriteria_model');
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['sub_criteria'] = $this->SubCriteria_model->get_all_sub_criteria();
        $data['title'] = "Sub Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/subcriteria/index', $data);
        $this->load->view('component/admin/footer');
    }

    public function add()
    {
        // Menampilkan formulir tambah sub kriteria
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['title'] = "Sub Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/subcriteria/add', $data);
        $this->load->view('component/admin/footer');
    }

    public function save()
    {
        // Proses penyimpanan data sub kriteria baru
        $data = array(
            'criteria_id' => $this->input->post('criteria'),
            'name' => $this->input->post('name'),
            // 'description' => $this->input->post('description'),
            'weight' => $this->input->post('weight')
        );

        $this->load->model('SubCriteria_model');
        $this->SubCriteria_model->add_sub_criteria($data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('subcriteria');
    }

    public function edit($id)
    {
        // Menampilkan formulir edit sub kriteria
        $this->load->model('SubCriteria_model');
        $data['criteria'] = $this->Criteria_model->get_all_criteria();
        $data['subcriteria'] = $this->SubCriteria_model->get_sub_criteria_by_id($id);
        $data['title'] = "Sub Criteria";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/subcriteria/edit', $data);
        $this->load->view('component/admin/footer');
    }

    public function update($id)
    {
        // Proses pembaruan data sub kriteria
        $data = array(
            'criteria_id' => $this->input->post('criteria'),
            'name' => $this->input->post('name'),
            // 'description' => $this->input->post('description'),
            'weight' => $this->input->post('weight')
        );

        $this->load->model('SubCriteria_model');
        $this->SubCriteria_model->update_sub_criteria($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('subcriteria');
    }

    public function delete($id)
    {
        // Proses penghapusan data sub kriteria
        $this->load->model('SubCriteria_model');
        $this->SubCriteria_model->delete_sub_criteria($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('subcriteria');
    }
}
