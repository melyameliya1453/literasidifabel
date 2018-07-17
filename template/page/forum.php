<div id="page-inner" style="min-height: auto !important;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-head-line">Forum</h3>
        </div>
    </div>
               
    <?php
        $sqlpost = mysqli_query($db, "SELECT * FROM post ORDER BY id_post DESC");
        while ($datasqlpost = mysqli_fetch_array($sqlpost)) {
            $datauserpost = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user='$datasqlpost[penulis_post]'")); ?>
    

            <div id="post<?php echo $datasqlpost["id_post"];?>">
                <span style="float:right;"><?php echo $datasqlpost["tanggal_post"];?></span>
                <a href="./?p=baca&id=<?php echo $datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>" style="text-decoration: none;">
                    <h3 class="title-post"><?php echo $datasqlpost["judul_post"];?></h3>
                </a>
                
                <?php if ($datauserpost["pp_user"] == '') { ?>
                    <a href="#" class="author-post">
                        <img src="./assets/img/user/<?php echo $datauserpost["pp_user"];?>" style="width:15px; height:15px; border-radius:100%;"> 
                        <span><?php echo $datauserpost["nama_user"];?></span>
                    </a>
                <?php } else { ?>
                    <a href="#" class="author-post">
                        <img src="./assets/img/user/<?php echo $datauserpost["pp_user"];?>" style="width:15px; height:15px; border-radius:100%;"> 
                        <span><?php echo $datauserpost["nama_user"];?></span>
                    </a>
                <?php } ?>
                
                |
                
                <span style="margin-left: 5px;">
                    <i class="fa fa-comment"></i> <?php $totalkomentarpost = mysqli_num_rows(mysqli_query($db,"SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'")); echo $totalkomentarpost;?>
                </span>

                <span style="margin-left: 5px;">
                    <i class="fa fa-thumbs-up"></i> <?php echo $datasqlpost["suka_post"];?>
                </span>

                <div class="pull-right">
                    <?php
                        $sqllike = mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]'");
                        $siapayglike = mysqli_fetch_array($sqllike);
                    ?>
                            
                    <?php
                        $lala = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'");
                            
                        if (mysqli_num_rows($lala) >= 4) {
                            $totalngomeng = mysqli_num_rows(mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'"));
                            $dikurang = $totalngomeng - 3;
                            
                            echo "<a href='./?p=post&id=$datasqlpost[id_post]&post_by=$datasqlpost[penulis_post]'>Lihat ($dikurang) Komentar Lagi...</a><br>";
                        }
                            
                        if (@$_SESSION["user"]) { ?>
                            <span>
                                <?php
                                    $datasukapost = @mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]' AND user_suka='$_SESSION[user]'"));
                                    if ($datasukapost["post_suka"] == 1) { ?>
                                        <button class="btn btn-danger btn-sm"  onclick="window.location='./inc/unlike.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';">
                                            <i class="fa fa-heart"></i> Unlike
                                        </button>

                                <?php } else { ?>
                                    <button class="btn btn-primary btn-sm" onclick="window.location='./inc/like.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';">
                                        <i class="fa fa-heart"></i> Like
                                    </button>
                                <?php } ?>
                                
                                <script>
                                    $(document).ready(function(){
                                        $(".btn<?php echo $datasqlpost["id_post"];?>").click(function(){
                                            $("blabla<?php echo $datasqlpost["id_post"];?>").show();
                                        });
                                    });
                                </script>
                            </span>
                            
                        <?php } else { ?>
                            <small>
                                <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>"><i class="fa fa-sign-in"></i> Login untuk menambah suka dan komentar</a>
                            </small>
                        <?php } ?>
                </div>

                <hr>

                <?php } ?>
            </div>
        </div>
    </div>
</div>