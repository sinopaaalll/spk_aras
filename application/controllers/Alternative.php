<?php
class Alternative extends CI_Controller
{
    public function index()
    {
        $this->load->model('Alternative_model');
        $data['alternative'] = $this->Alternative_model->get_all_alternative();
        $data['title'] = "Alternative";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/alternative/index', $data);
        $this->load->view('component/admin/footer');
    }

    public function add()
    {
        // Menampilkan formulir tambah kriteria
        $data['title'] = "Alternative";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/alternative/add', $data);
        $this->load->view('component/admin/footer');
    }

    public function save()
    {
        // Proses penyimpanan data kriteria baru
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );

        $this->load->model('Alternative_model');
        $this->Alternative_model->add_alternative($data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('alternative');
    }

    public function edit($id)
    {
        // Menampilkan formulir edit kriteria
        $this->load->model('Alternative_model');
        $data['alternative'] = $this->Alternative_model->get_alternative_by_id($id);
        $data['title'] = "Alternative";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/alternative/edit', $data);
        $this->load->view('component/admin/footer');
    }

    public function update($id)
    {
        // Proses pembaruan data kriteria
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );

        $this->load->model('Alternative_model');
        $this->Alternative_model->update_alternative($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('alternative');
    }

    public function delete($id)
    {
        // Proses penghapusan data kriteria
        $this->load->model('Alternative_model');
        $this->Alternative_model->delete_alternative($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('alternative');
    }
}
