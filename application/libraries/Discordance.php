<?php
class Discordance
{
    function tabelDisordance($arrayDisordance, $arrayV)
    {
        global $banyakAlternatif;
        for ($baris = 0; $baris < $banyakAlternatif - 1; $baris++) {
            for ($kolom = 0; $kolom < $banyakAlternatif - 1; $kolom++) {
                if ($baris == $kolom) {
                    $arrayDisordance[$baris][$kolom] = " ";
                } else {
                    $arrayDisordance[$baris][$kolom] = " ";
                    for ($j = 0; $j < 5; $j++) {
                        if ($arrayV[$baris][$j] < $arrayV[$kolom][$j]) {
                            $i = $j + 1;
                            if ($j == 4) {
                                $arrayDisordance[$baris][$kolom] = $arrayDisordance[$baris][$kolom] . $i;
                            } else {
                                $arrayDisordance[$baris][$kolom] = $arrayDisordance[$baris][$kolom] . $i . ",";
                            }
                        }
                    }
                }
            }
        }
        return $arrayDisordance;
    }

    function matriksDisordance($arrayMatriksDisordance, $arrayV)
    {
        global $banyakAlternatif;
        $baris = 0;
        $kolom = 1;
        for ($baris = 0; $baris < $banyakAlternatif - 1; $baris++) {
            $barisTarget = 0;
            for ($kolom = 0; $kolom < $banyakAlternatif - 1; $kolom++) {
                if ($baris == $kolom) {
                    $arrayMatriksDisordance[$baris][$kolom] = "-";
                    $barisTarget++;
                } else {
                    if ($baris == $barisTarget) {
                        $barisTarget++;
                    } else {
                        $arrayPembagi = array();
                        $arrayDibagi = array();
                        for ($j = 0; $j < 5; $j++) {
                            $arrayPembagi[$j] = $arrayV[$baris][$j] - $arrayV[$barisTarget][$j];
                            // absolute
                            if ($arrayPembagi[$j] < 0) {
                                $arrayPembagi[$j] = $arrayPembagi[$j] * -1;
                            }
                        }
                        $pembagi = max($arrayPembagi);
                        //nilai max untuk dibagi
                        $arrayDibagi[0] = "0";
                        $i = 0;
                        $arrayMatriksDisordance[$baris][$kolom] = " ";
                        for ($j = 0; $j < 5; $j++) {
                            if ($arrayV[$baris][$j] < $arrayV[$barisTarget][$j]) {
                                $arrayDibagi[$i] = $arrayV[$baris][$j] - $arrayV[$barisTarget][$j];
                                if ($arrayDibagi[$i] < 0) {
                                    $arrayDibagi[$i] = $arrayDibagi[$i] * -1;
                                }
                                $i++;
                            }
                        }
                        $dibagi = max($arrayDibagi);
                        if ($dibagi == 0) {
                            $arrayMatriksDisordance[$baris][$kolom] == "-";
                        } else {
                            $arrayMatriksDisordance[$baris][$kolom] = $dibagi / $pembagi;
                            if ($arrayMatriksDisordance[$baris][$kolom] == 0) {
                                $arrayMatriksDisordance[$baris][$kolom] = "0";
                            }
                        }
                        $barisTarget++;
                    }
                }
            }
        }

        return $arrayMatriksDisordance;
    }

    function tresholdDisordance($arrayMatriksDisordance)
    {
        global $banyakAlternatif;
        $jawaban = 0;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {
                $jawaban = $arrayMatriksDisordance[$i][$j] + $jawaban;
            }
        }
        global $namaKriteria2;
        $banyakKriteria = count($namaKriteria2);
        $jawaban = $jawaban / ($banyakKriteria * ($banyakKriteria - 1));
        return $jawaban;
    }
    function matriksDominanDisordance($arrayMatriksDominanDisordance, $tresholdDisordance, $arrayMatriksDisordance)
    {
        global $banyakAlternatif;
        for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
            for ($j = 0; $j < $banyakAlternatif - 1; $j++) {

                if ($arrayMatriksDisordance[$i][$j] >= $tresholdDisordance) {

                    $arrayMatriksDominanDisordance[$i][$j] = "1";
                } else {
                    $arrayMatriksDominanDisordance[$i][$j] = "0";
                }
            }
        }
        return $arrayMatriksDominanDisordance;
    }
}
