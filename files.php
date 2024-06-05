<?php 
    include('includes/header.php');
    include('includes/navbar.php');  
    include('includes/class-autoload.inc.php') ;
    
?>


<div class="container"> <!--container begin-->
    <div class="row">  <!--row begin-->




<div class="col-md-12">  <!--col-md-12 begin..-->
    <div class="row"> <!--row begin..-->
      
                
          <?php $file = new files (); ?>       
            <?php if($file->getFile($file_id = $_GET['file_id'])) : ?>
                <?php foreach($file->getFile($file_id = $_GET['file_id']) as $file) : ?>
         <div class="col-md-7 col-sm-12 col-12"> <!--col-md-6 2 begin..-->
    
        <div class="card shadow mb-3 mt-3"> <!--card shadow begin-->
            <div class="card-img-fluid">
            
            <?php
            if($file['file_image'] == ""){
                ?>
               <img class="img-fluid" src="admin/upload/files/default.jpg">
               <?php 
            }else{
                 ?>
                 <img class="img-fluid details-img-resize" src="admin/upload/files/<?= $file['file_image']?>">
            <?php 
            }
            ?>
            
           </div> 
                <div class="card-footer">
                    <span class="text-success">Files Title: </span>
                    <?= $file['file_title'] ?>
                    <hr>
                    <span class="text-success">Files Description: </span>
                <?= $file['file_desc'] ?>
                </div>
        </div> <!--card shadow finish-->
     
    </div><!--col-md-6 2 finish--> 


    <?php endforeach; ?>

<?php else : ?>

    <h1>No data found</h1>

<?php endif; ?>

</div>  <!--row finish..-->
</div> <!-- col-md-12 finish-->

<div class="col-md-12 m-3"><!-- col-md-8 begin-->
 <div class="row"> <!--row begin..-->

      <table class="table table-stripe table-responsive">

    <thead class="text-success">
      <tr>
        <th>#</th>
        <th>FILE NAME</th>
        <th>SIZE</th>
        <th>DOWNLOAD</th>
      </tr>
    </thead>
  
    <tbody>
    
    <?php $a=1; ?>
    <?php $audio = new audio (); ?>       
     <?php if($audio->getAllAudio($file_id = $_GET['file_id'])) : ?>
         <?php foreach($audio->getAllAudio($file_id = $_GET['file_id']) as $audio) : ?>
          
    <tr>
        <td><?= $a ?></td>
        <td><?= $audio['audio_name']; ?></td>
        <td>
        
        <?php $size = $audio['size']; 
              $s = 'KB';
              $x = round($size/1024,1);
              if($x > 1024){
                $x = round($x/1024,1);
                $s = 'MB';
              } else if ($x > 1048576){
                $x = round($x/1048576,1);
                $s = 'GB';
              }
              echo $x . ' ' . $s;
          ?> </td>
        <td class="float-right">
        <input type="hidden" name="edit_id" value="">
        <a href="./admin/upload/audio/<?= $audio['audio_name']; ?>" download rel="noopener noreferrer"><button type="submit" name="download" class="btn btn-info btn-circle btn-sm"><i class="fa fa-download"></i></button></a>
        </td>  
      </tr>
       <?php $a++; ?>
       <?php endforeach; ?>

       <?php else : ?>
       
           <h1>No data found</h1>
       
       <?php endif; ?>
      
    </tbody>

    
  </table>   

   

</div>  <!--row finish..-->
</div> <!-- col-md-8 finish-->


  </div>  <!--row finish-->
</div><!--container finish-->



<?php
    include('includes/footer.php');
    include('includes/script.php');
?>






