<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mail</title>
<style type="text/css">

@font-face {
  font-family: 'dbch';
  src: url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.eot'); /* IE9 Compat Modes */
  src: url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
       url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.woff2') format('woff2'), /* Super Modern Browsers */
       url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.woff') format('woff'), /* Pretty Modern Browsers */
       url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.ttf')  format('truetype'), /* Safari, Android, iOS */
       url('<?php echo base_url();?>assets/font/DBChuanPimXv3_2.svg#DBChuanPimXv') format('svg'); /* Legacy iOS */
}

body,td,th {
	color: #333;
}
body {
    font-family: 'dbch', sans-serif;
	background-color: #E8E8E8;
	margin-left: 15px;
	margin-top: 15px;
	margin-right: 15px;
	margin-bottom: 15px;
}
</style>
</head>
<body>

<div align="center">
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td style="text-align: center;"><img src="<?php echo base_url();?>assets/img/logo_b_tmp.png"></td>
    </tr>
    <tr>
        <td style="text-align: left;">
        <div style="border-radius: 5px;  padding: 50px; box-shadow: 3px 2px 8px #888888; margin-top: 30px; margin-bottom: 30px; background: #fff;">
            <h2>สวัสดี คุณ <?= $name ?></h2>
            <div style="font-size:20px">
                <?= $content;?>
                <?php if (!empty($link)){ ?>
                <a href="<?= $link ?>">[link]</a> 
                <?php } ?>
                <br><br>
                ขอแสดงความนับถือ<br>
                ศูนย์สร้างสรรค์งานออกแบบเชียงใหม่
            </div>
        </div>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;"><img src="<?php echo base_url();?>assets/img/TCDC.png"></td>
    </tr>
    </table>
</div>
</body>
</html>