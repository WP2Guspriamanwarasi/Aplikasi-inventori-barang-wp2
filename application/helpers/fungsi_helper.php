<?php 

function check_already_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('userid');
	if($user_session) {
		redirect('dashboard');
	}
}

function check_not_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('userid');
	if(!$user_session) {
		redirect('auth/login');
	}
}

// untuk membatasi akses admin atau pun kasir, sampai disini paham gak 

function check_admin() {
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1){
		redirect('dashboard');
	}
}


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

function indo_date($date) {
	$d = substr($date,8,2);
	$m = substr($date,5,2);
	$y = substr($date,0,4);
	return $d.'/'.$m.'/'.$y;
}
