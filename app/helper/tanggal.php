<?php
function dateid($tanggal)
{
    if (empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }
    $bulan = array(
        1 => 'januari',
        'februari',
        'maret',
        'april',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember'
    );
    $pecahan = explode('-', $tanggal);
    return $pecahan[2] . ' ' . $bulan[(int)$pecahan[1]] . ' ' . $pecahan[0];
}

function dateid1($tanggal)
{
    if (empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }
    $bulan = array(
        1 => 'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'agt',
        'sep',
        'nov',
        'des'
    );
    $pecahan = explode('-', $tanggal);
    return $pecahan[2] . ' ' . $bulan[(int)$pecahan[1]] . ' ' . $pecahan[0];
}

function dateid2($tanggal)
{
    if (empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }
    $pecahan = explode('-', $tanggal);
    return $pecahan[2] . '-' . $pecahan[1] . '-' . $pecahan[0];
}

function rupiah($price)
{
    $res = "Rp. " . number_format($price, 0, ",", ".");
    return $res;
}

function rupiah1($price)
{
    $res = number_format($price, 0, ",", ".");
    return $res;
}
