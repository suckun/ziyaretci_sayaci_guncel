<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 <style type="text/css">  
      .sayac{  
           background:#ccc repeat;  
           border:1px dashed #555;  
           border-radius:10px;  
           color:#000;  
           width:300px;  
           margin:0px auto;  
      }  
      p{  
           border-bottom: 3px solid #fff;  
      }  
 </style>  
 <?php  
  function Sayac()  
  {  
       $host='mysql.hostinger.web.tr'; 
       $user='admin'
      $pass='1234';
      $vt='kouosl';  
      try {  
        $db = new PDO('mysql:host='.$host.';dbname='.$vt, $user, $pass);  
      } catch (PDOException $v) {  
        echo 'Bağlantı Başarısız: ' . $v->getMessage();  
      }  
       $bugun=date("d"); 
       $ay=date("m");
       $yil=date("Y");  
       $onlineSuresi=time()-2*60*60; // iki dakika aktif olmazsa onlineden düşecek  
       $ip=$_SERVER['REMOTE_ADDR'];  
       $bugunGiris=$db->query("SELECT * FROM hit WHERE ip='$ip' AND gun='$bugun'")->rowCount(); 
       if($bugunGiris!=0){ 
       $al=$db->query("SELECT * FROM `hit` WHERE `ip`='".$ip."' AND `gun`='".$bugun."'")->fetch();  
       $guncelle=$db->query("UPDATE `hit` SET `sayac`='".($al['sayac']+1)."' WHERE id='".$al['id']."'");   
      }else{ 
           $db->query("INSERT INTO `hit` SET `gun`='$bugun', `ay`='$ay', `yil`='$yil', simdi='".time()."', sayac='1',ip='$ip'");  
      }   
      $online=$db->query("SELECT * FROM hit WHERE simdi>='$onlineSuresi'")->rowCount(); // onlnie kisilerimiz     
      $bugunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();  
      $bugun_cogul=$bugunx['SUM(sayac)'];
      $dunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();  
      $dun_cogul=$dunx['SUM(sayac)']; 
      $ayx=$db->query("SELECT SUM(sayac) FROM hit WHERE ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();  
      $buay_cogul=$ayx['SUM(sayac)'];
      $toplamx=$db->query("SELECT SUM(sayac) FROM hit ORDER BY id desc")->fetch();  
      $toplam_cogul=$toplamx['SUM(sayac)'];  
      $bugun_tekil=$db->query("SELECT * FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil'")->rowCount(); 
      $dun_tekil=$db->query("SELECT * FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil'")->rowCount();
      $buay_tekil=$db->query("SELECT * FROM hit WHERE ay='$ay' AND yil='$yil'")->rowCount();
      $toplam_tekil=$db->query("SELECT * FROM hit")->rowCount(); 
      echo"<div class='sayac'>  
            <p>Online: $online </p>  
            <p>Bugün Tekil: $bugun_tekil</p>  
            <p>Bugün Çoğul: $bugun_cogul</p>  
            <p>Dün Tekil: $dun_tekil</p>  
            <p>Dün Çoğul: $dun_cogul</p>  
            <p>Buay Tekil: $buay_tekil</p>  
            <p>Buay Çoğul: $buay_cogul</p>  
            <p>Toplam Tekil: $toplam_tekil</p>  
            <p>Toplam Çoğul: $toplam_cogul</p>  
            </div>";  
  }  
    Sayac();  
 ?>