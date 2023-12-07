<?php
class Result extends CI_Controller
{
    public function index()
    {
        $data['result'] = $this->Result_model->get_all_results();
        $data['title'] = "Result";
        $this->load->view('component/admin/header', $data);
        $this->load->view('component/admin/sidebar');
        $this->load->view('pages/result/index', $data);
        $this->load->view('component/admin/footer');
    }

    public function cetak_hasil()
    {
        $data['result'] = $this->Result_model->get_all_results();
        $data['title'] = "Cetak Hasil";
        $this->load->view('pages/result/cetak', $data);
    }

    public function calculate_and_save_ki()
    {
        // Panggil fungsi truncate sebelum menghitung Ki
        $this->Result_model->truncate_result_table();

        $criteria = $this->Criteria_model->get_all_criteria();
        $alternative = $this->Alternative_model->get_all_alternative();
        $evaluation = $this->Evaluation_model->get_all_evaluation1();

        $x = array();
        foreach ($alternative as $key1 => $value1) {
            $row = array();
            foreach ($criteria as $key2 => $value2) {
                $row[$value2->name] = get_evaluation_value($evaluation, $value1->name, $value2->name);
            }
            $x[$value1->name] = $row;
        }


        // Menambahkan A0 ke dalam variabel $x pada index [0]
        $row = array();
        foreach ($criteria as $key2 => $value2) {
            $row[$value2->name] = calculate_x0($evaluation, $value2->id, $value2->jenis);
        }
        $x = ["A0" => $row] + $x;


        $normalizedX = normalize_matrix($x, $criteria);
        $weightedNormalizedX = normalize_weighted_matrix($normalizedX, $criteria);
        $optimalValues = calculate_optimal_values($weightedNormalizedX);

        // var_dump($optimalValues);
        // die();

        // Lakukan perhitungan Ki dan simpan ke tabel result
        $s0 = $optimalValues['A0']['sum'];
        foreach ($optimalValues as $key => $optimal) {
            $si = $optimal['sum'];
            $ki = calculate_ki($si, $s0);

            // $alternative = $this->Alternative_model->get_all_alternative();
            if ($ki !== "") {
                $result_data = array(
                    'alternative_id' => get_alternative($alternative, $key), // sesuaikan dengan id alternatif
                    'result' => $ki
                );

                // Menyisipkan data hanya jika $ki tidak kosong
                $this->Result_model->insert_result($result_data);
            }
        }


        // update ranking
        $result = $this->Result_model->get_all_results();
        $array_max = array();
        $max = null;

        foreach ($result as $r) {
            if ($r->result !== "") {
                // Jika $max masih null atau $r->result lebih besar dari $max['value']
                if ($max === null || $r->result > $max['value']) {
                    // Perbarui nilai maksimum dan atur sebagai elemen pertama
                    $max = array(
                        'id' => $r->id,
                        'value' => $r->result
                    );
                    array_unshift($array_max, $max);
                } else {
                    // Simpan setiap nilai dalam array_max (kecuali yang terbesar)
                    $array_max[] = array(
                        'id' => $r->id,
                        'value' => $r->result
                    );
                }
            }
        }

        // Update ranking di tabel result
        foreach ($array_max as $ranking => $max_item) {
            $this->Result_model->update_ranking($max_item['id'], $ranking + 1);
        }

        // Redirect atau tampilkan pesan sukses
        redirect('result'); // Sesuaikan dengan URL yang sesuai
    }
}
