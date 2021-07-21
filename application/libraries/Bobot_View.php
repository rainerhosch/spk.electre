<?php
class Bobot_View
{
    public function Bobot($arraySoal)
    {
        global $i;
        $arraySoal[$i][0] = "3";
        $arraySoal[$i][1] = "2";
        $arraySoal[$i][2] = "2";
        $arraySoal[$i][3] = "2";
        $arraySoal[$i][4] = "1";
        return $arraySoal;
    }

    function printArray4($printArray)
    {
?>
        <tabel>
            <tr>
                <td>_Alternatif_</td>
                <?php
                global $kriteria;
                global $namaKriteria;
                global $banyakAlternatif;
                for ($i = 0; $i < 5; $i++) { ?>
                    <td><?php echo $kriteria[$i]; ?></td><?php } ?>
                <br>
            </tr>
            <?php
            for ($i = 0; $i < $banyakAlternatif; $i++) { ?>
                <tr>
                    <td><b><?php echo $namaKriteria[$i]; ?></b></td>
                    <?php
                    for ($j = 0; $j < 5; $j++) { ?>
                        <td>
                            <?php echo " ' " . $printArray[$i][$j] . " ' ";  ?>
                        </td>
                    <?php }
                    ?>
                </tr> <br>
            <?php } ?>
        </tabel> <?php }

                function printArray3x3($printArray)
                {
                    echo "_Alternatif_";
                    global $namaKriteria;
                    global $banyakAlternatif;
                    for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
                        echo " " . $namaKriteria[$i] . " ";
                    }
                    echo "<br>";
                    for ($i = 0; $i < $banyakAlternatif - 1; $i++) {
                        echo "<b>" . $namaKriteria[$i];
                        echo "</b>| ";
                        for ($j = 0; $j < $banyakAlternatif - 1; $j++) {
                            if ($i == $j) {
                                $printArray[$i][$j] = "-";
                            }
                            echo "' " . $printArray[$i][$j] . " ' ";
                        }
                        echo " |";
                        echo "<br>";
                    }
                    echo "<br>";
                }
            }
                    ?>