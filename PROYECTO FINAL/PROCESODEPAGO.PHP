<?php
  include("Basededatos.php");
?>
	
<HTML>
  <HEAD>	
	<TITLE>PROCESO DE PAGO </TITLE>
	 
  </HEAD>
   
   <table>
    <td><a href="INICIO.html"><div align="left"></a></td>
    <td><a href="ENVIOS Y PAGOS.html"><div align="right"></a></td>
    <td><a href="CONTACTOS.html"><div align="right"></a></td>
   </table>
   <div align="LEFT"><img src="MIA COSMETICOS.jpg" width="200" height="200"></DIV>
   <p><center><h1> PROCESO DE PAGO </h1></p>
   <P><CENTER><H3> MIA COSMETICOS </H3></P>
   <p><center> AL CREAR UNA CUENTA PUEDE COMPRAR MAS RAPIDO, AL LLENAR ESTE FORMULARIO SUS DATOS
    QUEDAN PROTEGIDOS POR <I> MIA</I> <B>COSMETICOS</B>, Y QUEDAN GUARDADOS PARA SU PROXIMA COMPRA </P>
	<?php
	  $var="";
	  $var1="";
	  $var2="";
	  $var3="";
	  $var4="";
	  $var5="";
          $var6="";
          $var7="";
          $var8="";

	if(isset($_POST["btn1"]))
	{
		$btn=$_POST["btn1"];
		$bus=$_POST["txtbus"];
	if($btn=="Buscar")
	  {
		//controlalumnos es el nombre de la tabla
		$sql="select * from registrodeclientes where Nombre='$bus'";
		$cs=mysql_query($sql,$cn);
		while($resul=mysql_fetch_array($cs))
	  	 {
		   $var=$resul[0];
		   $var1=$resul[1];
		   $var2=$resul[2];
		   $var3=$resul[3];
		   $var4=$resul[4];
		   $var5=$resul[5];
                   $var6=$resul[6];
                   $var7=$resul[7];
                   $var8=$resul[8];		
	  	 }
	  }
	if($btn=="Nuevo")
	  {
		$sql="select count(nombre),Max(nombre) from registrodeclientes";
		$cs=mysql_query($sql,$cn);
		while($resul=mysql_fetch_array($cs))
	  	 {
		   $count=$resul[0];
		   $Max=$resul[1];
		 }
	if($count==0)
	  {
		$var="0";
	  }
	else
	  {
		$var=''.substr((substr($Max,1)+1),1);
	  }
	  }	
       if($btn=="Agregar")
	  {
		$Nombre=$_POST["txtnombre"];
		$apellidos=$_POST["txtapellidos"];
		$telefono=$_POST["txttelefono"];
		$correoe=$_POST["txtcorreoe"];
		$pais=$_POST["txtpais"];
		$region=$_POST["txtregion"];
                $domicilio=$_POST["txtdomicilio"];
	        $calle=$_POST["txtcalle"];
                $numero=$_POST["txtnumero"];
		$sql="insert into registrodeclientes values('$Nombre','$apellidos','$telefono','$correoe',
                 '$pais','$region','$domicilio','$calle','$numero')";
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se lleno el formulario correctamente');</script>";
	  }
	if($btn=="Finalizar")
	  {
		$Nombre=$_POST["txtnombre"];
		$apellidos=$_POST["txtapellidos"];
		$telefono=$_POST["txttelefono"];
                $correoe=$_POST["txtcorreoe"];
		$pais=$_POST["txtpais"];
		$region=$_POST["txtregion"];
              	$domicilio=$_POST["txtdomicilio"];
                $calle=$_POST["txtcalle"];
		$numero=$_POST["txtnumero"];	
		$sql="update registrodeclientes set apellidos='$apellidos',telefono='$telefono',correoe='$correoe',
                 pais='$pais',region='$region',domicilio='$domicilio',calle='$calle',numero='$numero' 
                 where Nombre='$Nombre'";
			
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('GRACIAS, HA FINALIZADO SU COMPRA EN MIA COSMETICOS'); </script>";
	  }
	if($btn=="Eliminar")
	  {
		$Nombre=$_POST["txtnombre"];
		$sql="delete from registrodeclientes where Nombre='$Nombre'";
		$cs=mysql_query($sql,$cn);
		echo "<script> alert('Se elimino correctamente');</script>"; 		
	}
	}

	?>
   <BODY bgcolor="PINK">
     <form name="fe" action="" method="post">
      
	<table align="center" bgcolor="orange">
	  <tr>
	   <td> Nombre del registro a buscar </td>
	   <td> <input type="text" name="txtbus"> </td>
  	   <td> <input type="submit" name="btn1" value="Buscar"></td>
	  </tr></table>
         <br>
           <h1><center>Escoge la opci n deseada</h1>
        <table aling="center" bgcolor="yellow">
	  <tr>
	        <td><center><input type="submit" name="btn1" value="Nuevo"/></td>
                <td><center><input type="submit" name="btn1" value="Agregar"/></td>
		<td><center><input type="submit" name="btn1" value="Eliminar"/></td>
                
	  </tr>
	</table>
          <p>
	<center>
	<table border="2"  bgcolor="pink">
	  <tr>
	    <td> Nombre </td>
	    <td> <input type="text" name="txtnombre" value="<?php echo $var?>" /> </td>
	  </tr>
	  <tr>
	    <td> apellidos</td>
	    <td> <input type="text" name="txtapellidos" value="<?php echo $var1?>" /> </td>
	  </tr>
	  <tr>
	    <td> telefono </td>
	    <td> <input type="text" name="txttelefono" value="<?php echo $var2?>" /> </td>
	  </tr>
	  <tr>
	    <td> correoe </td>
	    <td> <input type="text" name="txtcorreoe" value="<?php echo $var3?>" /> </td>
	  </tr>
	  <tr>
	    <td> pais </td>
	    <td> <input type="text" name="txtpais" value="<?php echo $var4?>" /> </td>
	  </tr>
	  <tr>
	    <td> region </td>
	    <td> <input type="text" name="txtregion" value="<?php echo $var5?>" /> </td>
	  </tr>
           <tr>
	    <td> domicilio </td>
	    <td> <input type="text" name="txtdomicilio" value="<?php echo $var6?>" /> </td>
	  </tr>
           <tr>
	    <td> calle </td>
	    <td> <input type="text" name="txtcalle" value="<?php echo $var7?>" /> </td>
	  </tr>
          <tr>
	    <td> numero </td>
	    <td> <input type="text" name="txtnumero" value="<?php echo $var8?>" /> </td>
	  </tr>

	</table>
	</center>
	<br />
        <hr>
	</form>
          <td><a href="CONTACTOS.html"><input type="submit" name="btn1" value="Finalizar"/></a></td>
	<br>
	</BODY>
</HTML>