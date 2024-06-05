
<?php 
    include('includes/header.php');
    include('includes/navbar.php');  
    include('includes/class-autoload.inc.php')
    
?>

<div class="container"> <!--container begin-->
    <div class="row">  <!--row begin-->
       
        <div class="col-md-9 mt-4">  <!--col-md-9 begin..-->
        
           

            <?php $scholar = new scholars (); ?>       
            <?php if($scholar->getScholar($scholar_id = $_GET['scholar_id'])) : ?>
                <?php foreach($scholar->getScholar($scholar_id = $_GET['scholar_id']) as $scholar) : ?>

            
                <div class="card shadow mb-4">
                <div class="card-header">

               
                 <?php
            if($scholar['scholar_img'] == ""){
                ?>
               <img class="img-fluid details-img-resize" src="admin/upload/scholar/aside.jpeg">
               <?php 
            }else{
                 ?>
                 <img class="img-fluid details-img-resize" src="admin/upload/scholar/<?= $scholar['scholar_img']?>">
            <?php 
            }
            ?>
            
                
                </div>

                 <div class="card-footer">
                     <span class="text-info">SCHOLAR NAME: </span>
                     <?=  $scholar['scholar_name'] ?>
                     <hr>
                     <span class="text-info">SCHOLAR LOCATION: </span>
                     <?= $scholar['scholar_location'] ?>
                </div>
            </div> <!--card shadow finish-->
          

<?php endforeach; ?>

<?php else : ?>

    <h1>No data found</h1>

<?php endif; ?>

<hr>
<h4 class="text-right">SCHOLAR FILES</h4>
<div class="col-md-12">  <!--col-md-6 begin..-->
    <div class="row"> <!--row begin..-->

    <?php $book = new files (); ?>       
            <?php if($book->getScholarFile($scholar_id = $_GET['scholar_id'])) : ?>
                <?php foreach($book->getScholarFile($scholar_id = $_GET['scholar_id']) as $book) : ?>

                
                
    <div class="col-md-4 col-sm-12 col-12"> <!--col-md-6 2 begin..-->
    <a href="files.php?file_id=<?= $book['file_id']; ?>">
        <div class="card shadow mb-3"> <!--card shadow begin-->
            <div class="card-img-fluid">
            
            <?php
            if($book['file_image'] == ""){
                ?>
               <img class="img-fluid image-resize" src="admin/upload/files/default.jpg">
               <?php 
            }else{
                 ?>
                 <img class="img-fluid image-resize" src="admin/upload/files/<?= $book['file_image']?>">
            <?php 
            }
            ?>
            
           </div> 
                <div class="card-footer text-dark">
                    <span class="text-info">Files Title: </span>
                    <?= $book['file_title'] ?>
                </div>
        </div> <!--card shadow finish-->
        </a>
    </div><!--col-md-6 2 finish--> 
       
    <?php endforeach; ?>

<?php else : ?>

    <h1 class="alert alert-danger">No data found!</h1>

<?php endif; ?>

    </div><!--row finish..-->
</div>  <!--col-md-6 finish..-->
  


 </div><!--col-md-9 finish..-->

           

        <div class="col-md-3 mt-4">  <!--col-md-4 begin..-->
                <div class="card shadow mb-3">  <!--card shadow begin-->
                <div class="card-header text-center text-info">RECENT FROM SCHOLAR</div>
                <div class="card-body">
                   
                <?php $recent = new files (); ?>       
            <?php if($recent->getRecentFromScholar($scholar_id = $_GET['scholar_id'])) : ?>
                <?php foreach($recent->getRecentFromScholar($scholar_id = $_GET['scholar_id']) as $recent) : ?>
    

                    <small><a class="text-dark btn btn-link" href="files.php?file_id=<?= $recent['file_id'];?>"><?= $recent['file_title'] ?></a></small><hr>

                    <?php endforeach; ?>

<?php else : ?>

    <h1 class="alert alert-danger">No data found!</h1>

<?php endif; ?>
                    </div>
            </div>  <!--card shadow finish-->
        </div>  <!--col-md-4 finish..-->


    </div>  <!--row finish-->
</div><!--container finish-->



<?php
    include('includes/footer.php');
    include('includes/script.php');
?>