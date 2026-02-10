<?php 
function tgl_indo2($tgl)
{
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return ltrim($tanggal,'0').' '.$bulan.' '.$tahun;
}

function tgl_indo($tgl)
{
	$tanggal = substr($tgl,8,2);
	$bulan = substr($tgl,5,2);
	$tahun = substr($tgl,0,4);
	return $tanggal.'-'.$bulan.'-'.$tahun;
}

function tgl_sql($tgl)
{
	$tanggal = substr($tgl,0,2);
	$bulan = substr($tgl,3,2);
	$tahun = substr($tgl,6,4);
	return $tahun.'-'.$bulan.'-'.$tanggal;
}

function bulan_sql($tgl)
{
	$bulan = substr($tgl,0,2);
	$tahun = substr($tgl,3,4);
	return $tahun.'-'.$bulan;
}

function bulan_indo($tgl)
{
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $bulan.' '.$tahun;
}

function tahun($thn)
{
	$tahun = substr($thn, 0, 4);
	return $tahun;
}


function getBulan($bln)
{
	switch ($bln)
	{
		case "01":
			return "Januari";
			break;
		case "02":
			return "Februari";
			break;
		case "03":
			return "Maret";
			break;
		case "04":
			return "April";
			break;
		case "05":
			return "Mei";
			break;
		case "06":
			return "Juni";
			break;
		case "07":
			return "Juli";
			break;
		case "08":
			return "Agustus";
			break;
		case "09":
			return "September";
			break;
		case "10":
			return "Oktober";
			break;
		case "11":
			return "Nopember";
			break;
		case "12":
			return "Desember";
			break;
	}
}

function readmore($str)
{
	if (strlen($str) >= 150)
    {
		$ptg = substr(substr($str, 0, 150), 0, strrpos(substr($str, 0, 250), " "));
        
    }
	else
    {
    	$ptg = $str;
    }
    return $ptg;
}
?>