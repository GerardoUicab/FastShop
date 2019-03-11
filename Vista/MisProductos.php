<?php include 'headerCli.php';
 ?>
 <script>
    <?php if(isset($_SESSION["id_TipoUsu"])==false){ ?>
        window.location.replace("login.php");
    <?php }if(isset($_SESSION["id_TipoUsu"])==true && $_SESSION["id_TipoUsu"]!=2){?>
        window.location.replace("indexAdmin.php");
    <?php }?>
    

</script>
<?php include 'footerCli.php'; ?>