<?php
class Atribut
{
    public function xDataNilai($arraySoal, $arrayXDataNilai)
    {
        global $banyakAlternatif;
        for ($i = 0; $i < 5; $i++) {
            $arrayXDataNilai[$banyakAlternatif - 1][$i] = 0;
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {
                $arrayXDataNilai[$banyakAlternatif - 1][$i] = ($arraySoal[$j][$i] * $arraySoal[$j][$i]) + $arrayXDataNilai[$banyakAlternatif - 1][$i];
            }
            $arrayXDataNilai[$banyakAlternatif - 1][$i] = sqrt($arrayXDataNilai[$banyakAlternatif - 1][$i]);
        }
        return $arrayXDataNilai;
    }

    public function rNormalisasi($arrayXDataNilai, $arrayRNormalisasi)
    {
        global $banyakAlternatif;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < 5; $j++) {
                if ($arrayRNormalisasi[$i][$j] == 0) {
                    $arrayRNormalisasi[$i][$j] = "0";
                } else {
                    $arrayRNormalisasi[$i][$j] = $arrayRNormalisasi[$i][$j] / $arrayXDataNilai[$banyakAlternatif - 1][$j];
                }
            }
        }
        return $arrayRNormalisasi;
    }

    public function tabelV($arrayV, $arrayRNormalisasi)
    {
        global $banyakAlternatif;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $arrayV[$i][$j] = $arrayRNormalisasi[$i][$j] * $arrayV[$banyakAlternatif - 1][$j];
            }
        }
        return $arrayV;
    }

    function agregatDominanceMatriks($arrayAgregatDominanceMatriks, $arrayMatriksDominanConcordance, $arrayMatriksDominanDisordance)
    {
        for ($i = 0; $i < sizeof($arrayMatriksDominanConcordance); $i++) {
            for ($j = 0; $j < sizeof($arrayMatriksDominanDisordance[0]); $j++) {
                $temp = 0;
                for ($k = 0; $k < sizeof($arrayMatriksDominanDisordance); $k++) {
                    $temp += $arrayMatriksDominanConcordance[$i][$k] * $arrayMatriksDominanDisordance[$k][$j];
                }
                $arrayAgregatDominanceMatriks[$i][$j] = $temp;
            }
        }
        return $arrayAgregatDominanceMatriks;
    }
    function perangkingan($arrayAgregatDominanceMatriks)
    {
        $perangkinganBaris = array();
        global $banyakAlternatif;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            $perangkinganBaris[$i] = " ";
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {
                $perangkinganBaris[$i] = $arrayAgregatDominanceMatriks[$i][$j] + $perangkinganBaris[$i];
            }
        }
        $tertinggi = max($perangkinganBaris);
        if ($tertinggi == 0) {
            return $ruangTertinggi = 10;
        }
        foreach ($perangkinganBaris as $key => $value) {
            if ($tertinggi == $value) {
                $ruangTertinggi = $key;
                return $ruangTertinggi;
            }
        }
    }
}
