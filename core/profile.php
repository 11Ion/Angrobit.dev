<?php
if(isset($_GET['userid']) && !empty($_GET['userid'])){
    $id_users = $_GET['userid'];
    $countcard = selectRecords('users_shop','*',"WHERE id_users = '".$_GET['userid']."'");
    $countelement = count($countcard);
    $infousers = selectRecords('users_info','*',"WHERE id_users = '".$_GET['userid']."'");
     if (count($infousers) > 0){
         $fname = $infousers[0]['fname'];
         $lname = $infousers[0]['lastname'];
     }else{
         $fname = 'Angro';
         $lname = 'Bit';
     }

    if(count($countcard) > 0){
        $countelement = count($countcard);
    }else{
        $countelement = 0;
    }
    $img = selectRecords('img_bd','*',"WHERE id_users = '".$_GET['userid']."' AND pag='usersprofile' ");
    $imgprofile = '  <div class="profile_photo" >
            <a href="https://angrobit.com/admin"><img src="https://angrobit.com/uploads/mini_'.$img[0]['nameImg'].'" alt="username"></a>
        </div>';
    } else{
        $id_users = '';
        $imgprofile = '  <div class="profile_photo" style="height: auto;">
                <a href="https://angrobit.com/reg/"><img src="../../assets/images/home/logo.svg" alt="username"></a>
            </div>';
        $fname = 'Angro';
        $lname = 'Bit';
        $countelement = 0;
    }


echo '<div class="profile_widget">
    <div class="content">
        <span class="border border_t_right"></span>
        <span class="border border_b_right"></span>
   '.$imgprofile.'
        <div class="right_content">
            <p class="username">'.$fname.$lname.'</p>
            <span class="profile_line"></span>
            <div class="actions">
                <button class="button" id="open_cart">
                   <img src="../../assets/images/home/icon_cart.svg" alt="cart"> 
                   <span id="cardcount">'.$countelement.' </span>
                </button>
                <button class="button">
                    <img src="../../assets/images/home/icon_favorites.svg" alt="favorites">
                </button>
                <button class="button" id="burger">
                    <img src="../../assets/images/home/icon_burger.svg" alt="burger">
                </button>
            </div>
        </div>
    </div>
</div>';

?>


<!-- <a href="../../pages/cart/cart.php?userid='.$id_users.'"><img src="../../assets/images/home/icon_cart.svg" alt="cart"><span id="cardcount">'.$countelement.'</span></a> -->
