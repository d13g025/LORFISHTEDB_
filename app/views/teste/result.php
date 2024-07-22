<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['gff'])) {
        $scientific_name = $_POST['gff'];
        echo "GFF para: " . htmlspecialchars($scientific_name);
    } elseif (isset($_POST['fasta'])) {
        $scientific_name = $_POST['fasta'];
        // Processar para FASTA
        echo "FASTA para: " . htmlspecialchars($scientific_name);
    }
}
?>
