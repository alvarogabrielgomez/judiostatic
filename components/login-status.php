<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
// Close the dropdown menu if the user clicks outside of it

// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
    
function dropdownShow() {
  document.getElementById("dropdown-menu").classList.toggle("show");
}


</script>

<li class="login-status">


<div class="dropdown">
  <button onclick="dropdownShow()" class="dropbtn">
<i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 1px;" 
class="dropbtn-i 
<?php if(isset($_SESSION['admin_ID'])){
    echo 'fas fa-user-tie';
}else if(isset($_SESSION['client_id'])){
    echo 'fas fa-user';
}else if(isset($_SESSION['buss_ID'])){
    echo 'fas fa-user-tie';
}else{
    echo 'fas fa-user-ninja';
}?>
"></i>
<?php if(isset($_SESSION['admin_ID'])){
    echo '<span> Admin</span>';
}else if(isset($_SESSION['client_id'])){
    echo '<span>'.$_SESSION['client_first'].'</span>';
}else if(isset($_SESSION['buss_ID'])){
    echo '</span>'.$_SESSION['buss_name'].'</span>';
}else{
    echo '';
}?>


</button>
  <div id="dropdown-menu" class="dropdown-content">
  <div id="whoisyou">
  <div id="whoisyou-img">
  <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" 
class="
<?php if(isset($_SESSION['admin_ID'])){
    echo 'fas fa-user-tie';
}else if(isset($_SESSION['client_id'])){
    echo 'fas fa-user';
}else if(isset($_SESSION['buss_ID'])){
    echo 'fas fa-user-tie';
}else{
    echo 'fas fa-user-ninja';
}?>"></i>
  </div>
  <div id="whoisyou-name"><span>
<?php if(isset($_SESSION['admin_ID'])){
    echo 'Admin';
}else if(isset($_SESSION['client_id'])){
    echo $_SESSION['client_first'];
}else if(isset($_SESSION['buss_ID'])){
    echo $_SESSION['buss_name'];
}else{
    echo 'Ninjaman';
}?>  
    </span>
  <div id="whoisyou-email"><span>
<?php if(isset($_SESSION['admin_ID'])){
    echo $_SESSION['admin_UID'];
}else if(isset($_SESSION['client_id'])){
    echo $_SESSION['client_email'];
}else if(isset($_SESSION['buss_ID'])){
    echo $_SESSION['buss_email'];
}else{
    echo 'Anon';
}?>  
</span>
</div>
</div>
</div>

<div id="dropdown-o-container">
<?php if(isset($_SESSION['admin_ID'])){
    echo '<a href="admin.php">Dashboard</a>';
}else if(isset($_SESSION['buss_ID'])){
    echo '<a href="buss.php">Dashboard</a>';
}else if(isset($_SESSION['client_id'])){
    echo '<a href="profile.php">My Profile</a>';
}
?>
<?php if(isset($_SESSION['admin_ID']) || isset($_SESSION['client_id']) ||isset($_SESSION['buss_ID']) ){

 echo '<a><form  action="includes/logout-inc.php" method="POST">
    <button type="submit" class="logout-b" name="logout-submit">Logout</button>
 </form></a>';

}else{
    echo '<a href="profile.php">Iniciar Sesion</a>';
}?>  

    <div class="divider"></div>
    <a href="#footer">Ayuda</a>
  </div>
  </div>
</div>
</li>