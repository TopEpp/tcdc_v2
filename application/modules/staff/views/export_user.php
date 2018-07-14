<?php 
if(!empty($prj)){
  $file="ผู้สมัคร_".$prj->project_name.".xls"; 
}else{
  $file="บัณชีผู้ใช้งาน.xls";
}
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=$file"); 
?>
<table class="table table-condensed table-bordered"  style="font-family: 'dbch' !important; ">
  <thead>
    <tr>
      <th>ชื่อ-นามสกุล</th>
      <th>อีเมล</th>
      <th>เบอร์โทร</th>
      <?php if(!empty($prj)){ ?>
      <th>วันที่สมัคร</th>
      <th>สถานะ</th>
      <?php } ?>
      <th>วัน เดือน ปี เกิด</th>
      <th>ที่อยู่</th>
      <th>สถานภาพ</th>
      <th>ชื่อแบรนด์</th>
      <th>เฟสบุ๊ค แฟนเพจ</th>
      <th>ไลน์ไอดี </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($member_reg as $key => $mem) { 
          if(!empty($prj)){ 
            $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">รอตรวจสอบ</span>';
            if($mem->reg_status){
              $reg_status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ผ่าน</span>';
            }else if(!$mem->reg_status && $mem->approve_date){
              $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ผ่าน</span>';
            } 
          }

          $user_type = '';
          if($mem->user_type==1){
            $user_type = 'Admin';
          }else if($mem->user_type==2){
            $user_type = 'Program Manager';
          }else if($mem->user_type==3){
            $user_type = 'Member';
          }else if($mem->user_type==4){
            $user_type = 'Editor';
          }

          if(empty($mem->member_name)){
            $mem->member_name = $mem->firstname .' '.$mem->lastname;
          }
   ?>
    <tr>
      <td ><?php echo $mem->member_name;?></td>
      <td ><?php echo $mem->email;?></td>
      <td ><?php echo $mem->phone;?></td>
      <?php if(!empty($prj)){ ?>
      <td ><?php echo $this->mydate->date_eng2thai($mem->reg_date,543,'S');?></td>
      <td ><?php echo $reg_status;?></td>
      <?php } ?>
      <td><?php echo $mem->birthday.' '.$mem->month_of_birth.' '.$mem->year_of_birth;?></td>
      <td>เลขที่ <?php echo @$mem->address; ?> หมู่ <?php echo @$mem->village; ?> ซอย <?php echo @$mem->lane; ?>  ถนน <?php echo @$mem->road; ?> <br>
          ตำบล/แขวง <?php echo $mem->subdistrict;?>  เขต/อำเภอ <?php echo $mem->district;?>  จังหวัด
          <?php 
            foreach ($province as $key => $value) { ?>
            <?php 
              if(@$mem->province == $value->code ){
                  echo $value->name_th;
              } ?>  
                  
          <?php } ?>  
          รหัสไปรษณีย์ <?php echo (@$mem->zipcode != 0)? @$mem->zipcode : '';?>
          ประเทศ 
          <?php 
                foreach ($countries as $key => $value) { ?>
                <?php 
                  if (!empty(@$mem->country)){
                    if(@$mem->country == $value->id ){
                      echo $value->name;
                    }
                  }
                
                  ?>
              <?php } ?>

      </td>
      <td><?php echo $mem->status_name;?></td>
      <td><?php echo $mem->brand?></td>
      <td><?php echo $mem->facebook?></td>
      <td><?php echo $mem->lineid?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>