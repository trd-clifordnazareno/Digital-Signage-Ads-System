<?php $this->load->view('template/header'); ?>

<div class="row">
    <center><b style="font-size: 20px; font-family: monospace;">LOCATION SIGNAGE</b></center>
    <div class="col-xs-12 col-md-12">
    <button class="btn btn-primary btn-lg" id="tab" style="margin-bottom: 30px; background-color: #281672;">ADD HERE</button>
        <table class="table table-condensed table-hover table-bordered">
            <thead>
            <tr>
                <th>Location Code</th>
                <th>Location Name</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($get_loc as $get_loc){
                ?>
                <tr>
                <td><?php  echo $get_loc->location_code;  ?></td>
                <td><?php  echo $get_loc->location_name;  ?></td>
                <?php
                
                if($get_loc->is_online == 1){
                $stat = "OFFLINE";
                }else if($get_loc->is_online == 0){
                $stat = "<font color='green'><b>ONLINE</b></font>";
                }
                
                
                ?>
               <td><?php  echo $stat;  ?></td>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
    
    
    
    
   
    
</div>
<center>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">LOCATION SIGNAGE</h4>
      </div>
      <div class="modal-body">
          <b>LOCATION CODE : </b>
          <p><input type="text" class="input-sm" id="txtfname" style="width: 400px; text-align: center;"/></p>
          <b> LOCATION NAME : </b>
        <p><input type="text" class="input-sm" id="txtlname" style="width: 400px; text-align: center;"/></p>
        
        
        <!---->
        <div class="modal-footer">
        <div class="col-xs-12">
        <div class="btn-group" role="group" aria-label="Selection type" id="off_button">
            <button type="button" class="btn btn-default BtnType" value="1" id="off">OFF LINE</button>   </div>       
            <div class="btn-group" role="group" aria-label="Selection type" id="on_button">
            <button type="button" class="btn btn-default BtnType" value="0" id="on">ON LINE</button></div>   
        
</div>
</div>
        <!---->
      </div>
       
        
        
        
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</center>




<center>
<div class="modal fade" id="myModaltab">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">LOCATION SIGNAGE</h4>
      </div>
      <div class="modal-body">
          
          
          
          
          
          
          <select class="form-control" id='thread_client_id' style="width: 500px;">
                                                <!--<option id="clients">  </option>-->
                                                <?php
                                                foreach($client_load as $client_load){
                                                  
                                                echo "<option value=$client_load->client_code >$client_load->client_name</option>";
                                                        
                                                }
                                                ?>
                                                </select>
                                                <b>SUBJECT : </b>
                                                </br>
                                                <input type="text" class="input-sm" id="thread_client" style="width: 400px;"/>
          <div class="form-group">
                                        
                                    <div id="upload_image">
                                        <input type="file" id="file" name="file" style="margin-top: 15px;margin-left: -240px;" />
                                        
                                    </div>
                                   
                                    </div>
                                                
                                                <textarea style="width: 500px; height: 200px; margin-top: 3px;" id="txt_thread">
                                                    
                                                </textarea>
                                                
                                                
                                                
        <div id="con"></div>
        <div id="add_text_box"></div>
        <button type="button" class="btn bg-navy btn-flat margin" id="save_thread">SUBMIT</button>
         <div id="resume"></div>
      </div>
        <div id="button"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</center>
                                    <!--modal-->
    
<?php $this->load->view('template/footer'); ?>

    
    
                                    
                                    
                                    
                                    <script>
 $(document).ready(function(){
    $('table tbody tr  td').on('click',function(){
    $("#myModal").modal("show");
    <?php
    //$x = 0;
    //foreach($get_fail_loc as $data){
        //$x = $x + 1;
    //}
    //for($i =0;$i < $x;$i++){
    ?>   
    <?php
    //}
    ?>
    $("#txtfname").val($(this).closest('tr').children()[0].textContent);  
    $("#txtlname").val($(this).closest('tr').children()[1].textContent);
    });
 });
</script>
<script>
    $(document).ready(function () {
    $('#divType button').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('#<%= hidType.ClientID%>').val($(this).data('value'));
        //alert($(this).data('value'));             
    });
});
    </script>

<script>
    $(document).ready(function(){
        $("#off_button").click(function(){
            
    var datas = {
                                            loc_code : $("#txtfname").val(),
                                            status : 1,
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/switch_stat/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                alert("OFFLINE");
                                                window.location = "http://richmedia.com.ph/rmni/index.php/view_running_status/view_running_status/get_all_loc_000xa000addressrichmedianetwork";
                                            }
                                        });                             
         });
         });
         
         </script>
           <script>
         
         $(document).ready(function(){
        $("#on_button").click(function(){
                  var datas = {
                                            loc_code : $("#txtfname").val(),
                                            status : 0,
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/switch_stat/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                alert("ONLINE");
                                                window.location = "http://richmedia.com.ph/rmni/index.php/view_running_status/view_running_status/get_all_loc_000xa000addressrichmedianetwork";
                                            }
                                        });                                    
         });
         });
    </script>

 
    
    <!--<script>
        $(document).ready(function(){
                                    $("#show_edit").click(function(){
                                        alert("<?php //echo $data->location_code;   ?>");
                                    });
                                });
        </script>-->
        
        
        
        
        
        
        
        
        <script>
 $(document).ready(function(){
    $('#tab').click(function(){
    $("#myModaltab").modal("show");
    <?php
    //$x = 0;
    //foreach($get_fail_loc as $data){
        //$x = $x + 1;
    //}
    //for($i =0;$i < $x;$i++){
    ?>   
    <?php
    //}
    ?>
    $("#tab_create").val($(this).closest('tr').children()[0].textContent);  
    
    });
 });
</script>




<script>
    
    $(document).ready(function(){
        $("#save_thread").click(function(){
            datas = {
                thread_client : $("#thread_client").val(),
                thread_client_id : $("#thread_client_id").val(),
                txt_thread : $("#txt_thread").val(),
                file : $("#file").val(),
                ajax : 1
            };
            $.ajax({
                url : "http://richmedia.com.ph/rmni/index.php/view_running_status/view_running_status/save_new_thread/",
                type : "post",
                data : datas,
                success : function(msg){
                    
                    
                    
                    
                    
                    
                    //$("#upload_all").show();
                //$("#upload_image").show();
                
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'http://richmedia.com.ph/rmni/index.php/crawler/crawler/upload_image_crawler', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                            $("#upload_all").show();
                           $("#upload_image").show();
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                            $("#upload_all").show();
                            $("#upload_image").show();
                        }
                    });
                
                
                
                alert("INSERTED");
                
                
                }
            });   
        });
    });
    
    
    </script>
    
    
    
    
    
    

    
    
    
    

