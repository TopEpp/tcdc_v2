<?php 
$file="ผู้สมัคร_".$prj->project_name.".xls";
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=$file"); 
?>
<table class="table table-hover table-condensed" id="table_user_reg" style="font-family: 'dbch' !important; ">
  <thead>
    <tr>
      <th>ชื่อ-นามสกุล</th>
      <th>อีเมล</th>
      <th>เบอร์โทร</th>
      <th>วันที่สมัคร</th>
      <th>สถานะ</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($member_reg as $key => $mem) { 
      $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">รอตรวจสอบ</span>';
      if($mem->reg_status){
        $reg_status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ผ่าน</span>';
      }else if(!$mem->reg_status && $mem->approve_date){
        $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ผ่าน</span>';
      } 
   ?>
    <tr>
      <td class="v-align-middle semi-bold" style="font-family: 'dbch'"><?php echo $mem->member_name;?></td>
      <td class="v-align-middle semi-bold" style="font-family: 'dbch'"><?php echo $mem->email;?></td>
      <td class="v-align-middle semi-bold" style="font-family: 'dbch'"><?php echo $mem->phone;?></td>
      <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($mem->reg_date,543,'S');?></td>
      <td class="v-align-middle semi-bold"><?php echo $reg_status;?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>