<?php
class Concordance
{
    function tabelConcordance($arrayConcordance, $arrayV)
    {
        global $banyakAlternatif;
        for ($baris = 0; $baris < $banyakAlternatif; $baris++) {
            for ($kolom = 0; $kolom < $banyakAlternatif; $kolom++) {
                if ($baris == $kolom) {
                    $arrayConcordance[$baris][$kolom] = " ";
                } else {
                    $arrayConcordance[$baris][$kolom] = " ";
                    for ($j = 0; $j < 5; $j++) {
                        if ($arrayV[$baris][$j] >= $arrayV[$kolom][$j]) {
                            $i = $j + 1;
                            if ($j == 4) {
                                $arrayConcordance[$baris][$kolom] = $arrayConcordance[$baris][$kolom] . $i;
                            } else {
                                $arrayConcordance[$baris][$kolom] = $arrayConcordance[$baris][$kolom] . $i . ",";
                            }
                        }
                    }
                }
            }
        }
        return $arrayConcordance;
    }

    function matriksConcordance($arrayMatriksConcordance, $arrayV, $arraySoal)
    {
        global $banyakAlternatif;
        $baris = 0;
        $targetBaris = 3;
        $kolom = 0;
        for ($baris = 0; $baris < $banyakAlternatif - 1; $baris++) {
            for ($kolom = 0; $kolom < $banyakAlternatif - 1; $kolom++) {
                if ($kolom == $baris) {
                    $arrayMatriksConcordance[$baris][$kolom] = " ";
                } else {
                    $arrayMatriksConcordance[$baris][$kolom] = " ";
                    for ($j = 0; $j < 5; $j++) {
                        if ($arrayV[$baris][$j] >= $arrayV[$kolom][$j]) {
                            $i = $j + 1;
                            $arrayMatriksConcordance[$baris][$kolom] += $arraySoal[$targetBaris][$j];
                        }
                    }
                }
            }
        }
        return $arrayMatriksConcordance;
    }
    function tresholdConcordance($arrayMatriksConcordance)
    {
        global $banyakAlternatif;
        $jawaban = 0;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {
                $jawaban = $arrayMatriksConcordance[$i][$j] + $jawaban;
            }
        }
        global $namaKriteria2;
        $banyakKriteria = count($namaKriteria2);
        $jawaban = $jawaban / ($banyakKriteria * ($banyakKriteria - 1));
        return $jawaban;
    }

    function matriksDominanConcordance($arrayMatriksDominanConcordance, $tresholdConcordance, $arrayMatriksConcordance)
    {
        global $banyakAlternatif;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {

                if ($arrayMatriksConcordance[$i][$j] >= $tresholdConcordance) {

                    $arrayMatriksDominanConcordance[$i][$j] = "1";
                } else {
                    $arrayMatriksDominanConcordance[$i][$j] = "0";
                }
            }
        }
        return $arrayMatriksDominanConcordance;
    }
}
