<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_evaluation_value')) {
    function get_evaluation($evaluation, $subcriteria, $alternative, $criteria)
    {
        foreach ($evaluation as $key => $value) {
            if ($value['alternative'] == $alternative && $value['criteria'] == $criteria) {
                $nilai =  $value['value'];
                foreach ($subcriteria as $key => $value1) {
                    if ($value1->criteria == $criteria && $value1->weight == $nilai) {
                        return $value1->name;
                    }
                }
            }
        }
        return ''; // Nilai default jika tidak ditemukan
    }
}

if (!function_exists('get_evaluation_value')) {
    function get_evaluation_value($evaluation, $alternative, $criteria)
    {
        foreach ($evaluation as $key => $value) {
            if ($value['alternative'] == $alternative && $value['criteria'] == $criteria) {
                return $value['value'];
            }
        }
        return ''; // Nilai default jika tidak ditemukan
    }
}

if (!function_exists('calculate_x0')) {
    function calculate_x0($evaluation, $criteria_id, $criteria_type)
    {
        $values = array();

        // Mengumpulkan nilai evaluasi untuk kriteria tertentu
        foreach ($evaluation as $key => $value) {
            if ($value['criteria_id'] == $criteria_id) {
                $values[] = $value['value'];
            }
        }

        // Menghitung nilai optimum (x0)
        if ($criteria_type == 'benefit') {
            // Jika jenis kriteria adalah benefit, ambil nilai tertinggi
            $x0 = max($values) / 1;
        } elseif ($criteria_type == 'cost') {
            // Jika jenis kriteria adalah cost, ambil nilai terendah
            $x0 = min($values) / 1;
        } else {
            // Jenis kriteria tidak valid (tambahkan penanganan sesuai kebutuhan)
            $x0 = '';
        }

        return $x0;
    }
}


if (!function_exists('normalize_matrix')) {
    function normalize_matrix($matrix, $criteria)
    {
        $normalizedMatrix = array();

        // Iterasi baris matriks
        foreach ($matrix as $key => $row) {
            $normalizedRow = array();

            // Iterasi kolom matriks
            foreach ($row as $cellKey => $cell) {
                $normalizedRow[$cellKey] = normalize_cell($criteria, $cellKey, $cell, $matrix);
            }

            $normalizedMatrix[$key] = $normalizedRow;
        }

        return $normalizedMatrix;
    }
}


if (!function_exists('normalize_cell')) {
    function normalize_cell($criteria, $criteriaName, $value, $matrix)
    {
        // Mendapatkan jenis kriteria
        $type = '';
        foreach ($criteria as $c) {
            if ($c->name == $criteriaName) {
                $type = $c->jenis;
                break;
            }
        }

        // Normalisasi berdasarkan jenis kriteria
        if ($type == 'benefit') {
            return $value / array_sum(array_column($matrix, $criteriaName));
        } elseif ($type == 'cost') {
            $inverseValue = ($value == 0) ? 0 : 1 / $value;
            $sumInverseValues = array_sum(array_map(function ($row) use ($criteriaName) {
                return ($row[$criteriaName] == 0) ? 0 : 1 / $row[$criteriaName];
            }, $matrix));

            return $inverseValue / $sumInverseValues;
        } else {
            return $value; // Tidak ada normalisasi untuk jenis kriteria lainnya
        }
    }
}

// Gunakan $bobot dalam perhitungan rumus bobot
if (!function_exists('normalize_weighted_matrix')) {
    function normalize_weighted_matrix($matrix, $criteria)
    {
        $weightedNormalizedMatrix = array();

        // Iterasi baris matriks
        foreach ($matrix as $key => $row) {
            $weightedNormalizedRow = array();

            // Iterasi kolom matriks
            foreach ($row as $cellKey => $cell) {
                $bobot = get_criteria_weight($criteria, $cellKey);
                $weightedNormalizedRow[$cellKey] = $bobot * $cell;
            }

            $weightedNormalizedMatrix[$key] = $weightedNormalizedRow;
        }

        return $weightedNormalizedMatrix;
    }
}

// Fungsi untuk mendapatkan bobot dari criteria berdasarkan nama kolom
function get_criteria_weight($criteria, $columnName)
{
    $bobot = 0; // Inisialisasi dengan nilai default (misalnya 0) jika tidak ditemukan
    foreach ($criteria as $c) {
        if ($c->name == $columnName) {
            $bobot = $c->weight;
            break;
        }
    }

    return $bobot;
}

function get_alternative($alternative, $columnName)
{
    $alternatif_id = 0; // Inisialisasi dengan nilai default (misalnya 0) jika tidak ditemukan
    foreach ($alternative as $a) {
        if ($a->name == $columnName) {
            $alternatif_id = $a->id;
            break;
        }
    }

    return $alternatif_id;
}

// Fungsi untuk menghitung nilai optimum (sij) dari matriks terbobot
if (!function_exists('calculate_optimal_values')) {
    function calculate_optimal_values($weightedNormalMatrix)
    {
        $optimalValues = array();

        foreach ($weightedNormalMatrix as $key => $row) {
            $prosesHitung = implode("+", array_slice($row, 0)); // Proses sum
            $sum = array_sum(array_slice($row, 0)); // Sum nilai pada baris dimulai dari indeks 1 hingga n
            $optimalValues[$key] = array('alternatif' => $key, 'sum' => $sum, 'proses_sum' => $prosesHitung);
        }

        return $optimalValues;
    }
}

// Fungsi untuk menghitung derajat utilitas (Ki)
if (!function_exists('calculate_ki')) {
    function calculate_ki($si, $s0)
    {
        if ($si == $s0) {
            $hasil = "";
        } else {
            $hasil = $si / $s0;
        }

        return $hasil;
    }
}
