
<!-- START PAGE CONTENT -->
<div class="content ">
<div class=" container-fluid   container-fixed-lg">
    <div class="tab-pane slide-left padding-20 sm-no-padding radio radio-success" id="tab4">
        <div style="padding-left: 30px;">
            <p>การประเมินผล สำหรับผู้สมัครจัดกิจกรรม CMDW</p><br>
            <p>
                <?php $prename=''; if(@$member->prename == 1){ $prename='นาย';}?>
                <?php  if(@$member->prename == 2){$prename='นาง';}?>
                <?php  if(@$member->prename == 3){$prename='นางสาว';}?>
                <?php echo $prename.$member->firstname.' '.$member->lastname;?>
            </p>
                <table class="table table-borderless" border="0">
                    <tr>
                        <th>คำถาม</th>
                        
                        <th>&nbsp;</th>
                        <th>คะแนน</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        
                        <th>น้อย</th>
                        <th>&nbsp;</th>
                        <th>มาก</th>
                    </tr>
                    <tr>
                        <td>1.  ผู้จัดการกิจกรรมให้ข้อมูลและอำนวยความสะดวก</td>

                        <td>  
                            <input <?= (@$quiz->answer_1 == 1)? 'checked':'';?> type="radio" value="1" name="radio1" id="1_1">
                            <label for="1_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_1 == 2)? 'checked':'';?> type="radio" value="2" name="radio1" id="1_2">
                            <label for="1_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_1 == 3)? 'checked':'';?> type="radio" value="3" name="radio1" id="1_3">
                            <label for="1_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>2.  ขั้นตอนการเข้าร่วมกิจกรรมสะดวกและเข้าใจง่าย</td>
                        <td>  
                            <input <?= (@$quiz->answer_2 == 1)? 'checked':'';?> type="radio" value="1" name="radio2" id="2_1">
                            <label for="2_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_2 == 2)? 'checked':'';?> type="radio" value="2" name="radio2" id="2_2">
                            <label for="2_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_2 == 3)? 'checked':'';?> type="radio" value="3" name="radio2" id="2_3">
                            <label for="2_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>3.  สถานที่จัดมีความเหมาะสมกับกิจกรรม</td>
                        <td>  
                            <input <?= (@$quiz->answer_3 == 1)? 'checked':'';?> type="radio" value="1" name="radio3" id="3_1">
                            <label for="3_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_3 == 2)? 'checked':'';?> type="radio" value="2" name="radio3" id="3_2">
                            <label for="3_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_3 == 3)? 'checked':'';?> type="radio" value="3" name="radio3" id="3_3">
                            <label for="3_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>4.  การออกแบบผังพื้นที่และบรรยากาศได้น่าสนใจ</td>
                        <td>  
                            <input <?= (@$quiz->answer_4 == 1)? 'checked':'';?> type="radio" value="1" name="radio4" id="4_1">
                            <label for="4_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_4 == 2)? 'checked':'';?> type="radio" value="2" name="radio4" id="4_2">
                            <label for="4_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_4 == 3)? 'checked':'';?> type="radio" value="3" name="radio4" id="4_3">
                            <label for="4_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>5.  ระยะเวลาการจัดมีความเหมาะสมกับกิจกรรม</td>
                        <td>  
                            <input <?= (@$quiz->answer_5 == 1)? 'checked':'';?> type="radio" value="1" name="radio5" id="5_1">
                            <label for="5_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_5 == 2)? 'checked':'';?> type="radio" value="2" name="radio5" id="5_2">
                            <label for="5_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_5 == 3)? 'checked':'';?> type="radio" value="3" name="radio5" id="5_3">
                            <label for="5_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>6.  สูจิบัตรและสื่อสิ่งพิมพ์แสดงข้อมูลได้ครบถ้วน</td> 
                        <td>  
                            <input <?= (@$quiz->answer_6 == 1)? 'checked':'';?> type="radio" value="1" name="radio6" id="6_1">
                            <label for="6_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_6 == 2)? 'checked':'';?> type="radio" value="2" name="radio6" id="6_2">
                            <label for="6_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_6 == 3)? 'checked':'';?> type="radio" value="3" name="radio6" id="6_3">
                            <label for="6_3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>7.  การประชาสัมพันธ์กิจกรรมไปสู่กลุ่มเป้าหมายได้ทั่วถึง</td>
                        <td>  
                            <input <?= (@$quiz->answer_7 == 1)? 'checked':'';?> type="radio" value="1" name="radio7" id="7_1">
                            <label for="7_1">1</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_7 == 2)? 'checked':'';?> type="radio" value="2" name="radio7" id="7_2">
                            <label for="7_2">2</label>
                        </td>
                        <td> 
                            <input <?= (@$quiz->answer_7 == 3)? 'checked':'';?> type="radio" value="3" name="radio7" id="7_3">
                            <label for="7_3">3</label>
                        </td>
                    </tr>
                    </table>
        </div>
    </div>        

<!-- END CONTAINER FLUID -->
</div>
</div>
<!-- END PAGE CONTENT -->