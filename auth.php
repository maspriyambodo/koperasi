<?php if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn'])){session_start();require 'timeCheck.php';$hasSessionExpired = checkIfTimedOut();if($hasSessionExpired){include 'updateid.php';session_unset();header("location: access-denied.php");exit;}else{$_SESSION['loggedAt']= time();}}$_SESSION['loggedAt']=time();$tglaktif=$_SESSION['SESS_TGL_AKTIF'];$tanggal=$_SESSION['SESS_TGL_HARI'];$nameuser=$_SESSION['SESS_NAMA_USER'];$level=$_SESSION['SESS_LEVEL_USER'];$kcabang=$_SESSION["SESS_KODE_CABANG"];$ncabang=$_SESSION["SESS_NAMA_CABANG"];$userid=$_SESSION['SESS_USER'];$alamat=$_SESSION['SESS_ALAMAT'];$limitk=$_SESSION['SESS_LIMITK'];$limitd=$_SESSION['SESS_LIMITD'];$aktif_satu=$_SESSION['AKTIF_SATU'];include 'function/function.php';$xt=date_angka($tanggal);$blnxxx=date('m',strtotime($tanggal));$thnxxx=date('Y',strtotime($tanggal));$tglxxx=date('d',strtotime($tanggal));$bln=date('m',strtotime($tanggal));$thn=date('Y',strtotime($tanggal));include "function/keterangan.php"; ?>