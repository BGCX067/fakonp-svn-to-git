<html>
<head>
	<tittle>HTML Laborategia </tittle>
	

	
<script languaje="javascript" type="text/javascript">

function reseteatu(){

	//input type=text direnak lehenengo
	document.formularioa.izena.value="";
	document.formularioa.abizena.value="";
	document.formularioa.telefonoa.value="";
	document.formularioa.kalea.value="";
	document.formularioa.zb.value="";
	document.formularioa.letra.value="";
	document.formularioa.pk.value="";

	//input type=file berdin egiten da
	document.formularioa.argazkia.value="";

	//nola egin input type=radio 
	for (i=0; i<document.formularioa.sexua.length; i++) {
	document.formularioa.sexua[i].checked = false;
	 }

	//checkbox-ak radio-ak bezala
	for (i=0; i<document.formularioa.programaziolengoaiak.length; i++) {
		document.formularioa.programaziolengoaiak[i].checked = false;
	}

	//select
	document.formularioa.Probintzia.selectIndex = -1;
	document.formularioa.Lanexperientzia.selectIndex = -1;

	//textarea
	document.formularioa.testua.value = "Hemen idatzi" ;

}
function balioztatu(){

	if (document.formularioa.izena.value =="" || document.formularioa.abizena.value== "") {
		alert("*-dun eremuak bete behar dira");
		return false;
}
	if (isNaN(document.formularioa.pk.value) || isNaN(document.formularioa.telefonoa.value) || isNaN(document.formularioa.zenbakia.value)) {
alert("telefonoa, Zenbakia eta PK eremuak zenbakia izan behar dira");
return false;
}
	if (document.formularioa.telefonoa.value.length !=9){
alert("telefonoa eremuak 9 ditgitu eduki behar ditu");
return false;
}
	//helbidearen kasua
	if (document.formularioa.kalea.value !="" || document.formularioa.zb.value !="" || document.formularioa.letra.value !="" ||document.formularioa.pk.value !=""||document.formularioa.Probintzia.selectedIndex !=-1){
		if (document.formularioa.kalea.value =="" || document.formularioa.zb.value=="" || document.formularioa.letra.value=="" ||document.formularioa.pk.value==""||document.formularioa.Probintzia.selectedIndex ==-1){

		alert("helbidea sartu nahi izan ezkero eremu guztiak bete beharko dituzu");
		return false;
		}

}
	//pk = 5
	if (document.formularioa.pk.value.length !=5){
alert("pk eremuak 5 ditgitu eduki behar ditu");
return false;
}
}


function agurtu (agurra){
alert(agurra);
}

function gaituBotoiak(){
	document.formularioa.erabiltzailea_ezabatu.disabled = false;
	document.formularioa.erabiltzailea_aldatu.disabled = false;
}

</script>
</head>
<!--<body onLoad="agurtu('Kaixo, ongi etorri!!!')" onUnload="agurtu('aguuuurrrr!!!')"> -->

<body>

<?php 
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pwd = 'euiti';
$datubasea ='php_labo';
$konexioa = new mysqli ($db_host, $db_user, $db_pwd, $datubasea);
$sql_emaitza = $konexioa->query("SELECT * FROM Erabiltzailea");
	echo "<table border = '1'>";
	echo "<TR><th></th><th> Izena</th><th> Argazkia</th><th> Info gehiago</th></TR>";
	while ($lerroa = $sql_emaitza -> fetch_array (MYSQLI_ASSOC)){
		echo "<tr>";
		echo "<td> <input type=\"radio\" name=\"radioerabiltzailea\" value=\"$lerroa[idearabiltzailea]\" onclick=\"gaituBotoiak();\"/></td>";
		echo "<td> <a href=\mailto:$lerroa[emaila]\">$lerroa[izena] $lerroa[abizenak] </a> </td>";
		echo "<td><img src=\"../img/$lerroa[argazkia]\" height=\"80\"\"/></td>";	
		echo "<td> $lerroa[testua]</td>";
		echo "<tr>";
	}
	echo"</table>";

	
	mysql_free_result($rs);
	mysql_close();

?>	
<!--  
<table border = "1">

	<TR>
		<th> Izena</th>
		<th> Argazkia</th>
		<th> Info gehiago</th>
	</TR>
	<TR>
		<TD align="center"> <a href="mailto: ana@gmail.com">Ana </a> </TD>
		<TD align="center"> <a href="Argazkiak/anarenArgazkiak.html"><img src="img/delfin.jpg" height="100"></a> </TD>
		<TD align="center"><a href="profilak/ana.html">Link</a></TD>
	</TR>
	<TR>
		<TD align="center"><a href="mailto: andoni@gmail.com">Andoni </a></TD>
		<TD align="center"> <a href="Argazkiak/andonirenArgazkiak.html"><img src="img/Amberes1.jpg" height="100"> </TD>
		<TD align="center"><a href="profilak/andoni.html"> Link</a></TD>
	</TR>
	<TR>
		<TD align="center"><a href="mailto: amaia@gmail.com">Amaia </a></TD>
		<TD align="center"> <a href="Argazkiak/amaiarenArgazkiak.html"><img src="img/lion05.jpg" height="100"></a> </TD>
		<TD align="center"><a href="profilak/amaia.html"> Link</a></TD>
	</TR>


	
</table>
<form name="formularioa">

<p>
<fieldset style="border-color: #00FF00; width:550">
	<legend> Datu Pertsonalak </legend>
	<table>
		<tr>
			<td> Izena*: </td> <td> <input type="text" name="izena" value=""> </td>
		</tr>
		<tr> 
			<td> Abizena*: </td> <td> <input type="text" name="abizena" value=""> </td>
		</tr>
		<tr> 
			<td> Telefonoa: </td> <td> <input type="text" name="telefonoa" value=""> </td>
		</tr>
		<tr> 
			<td> Argazkia </td> <td> <input type="file" name="argazkia" value=""> </td>
		</tr>
		<tr> 
			<td> Sexua: </td> <td> <input type="radio" name="sexua" value="Gizona"> Gizona </input> 
			<input type="radio" name="sexua" value="Emakumea"> Emakumea </input> </td>
		
		</tr>
			
	</table>		
</fieldset>
</p>
-->


<p>
<fieldset style="border-color: #FF0000; width:550">
	<legend> Helbidea</legend>
<table>
		<tr>
			<td> Kalea: </td> <td> <input type="text" name="kalea" value=""> </td>
			<td> Zb.: </td> <td> <input type="text" name="zb" value=""> </td>
			<td> Letra: </td> <td> <input type="text" name="letra" value=""> </td>
		</tr>
		<tr> 
			<td> PK: </td> <td> <input type="text" name="pk" value=""> </td>
		</tr>
		<tr>
			<td> Probintzia: </td> <td> 
				<select name ="Probintzia">
					<option> Bizkaia </option>
					<option> Araba </option>
					<option> Gipuzkoa </option>	
				</select>	
		</tr>
			


</table>

</fieldset>
</p>



<p>
<fieldset style="border-color: #0000FF; width:550">
	<legend> Ezagutzak</legend>
		<p>
			<u><i> Programazio Lengoaiak </u> </i> <br>
			<input type = "checkbox" name= "programaziolengoaiak" value="Java"> Java </input>
			<input type = "checkbox" name= "programaziolengoaiak" value="C"> C </input>		
			<input type = "checkbox" name= "programaziolengoaiak" value="C++"> C++ </input>
			<input type = "checkbox" name= "programaziolengoaiak" value="Cobol"> Cobol </input> <br>

			<u><i> Lan Experientzia </u> </i> <br>
				<select width="width:300" size=5 name="Lanexperientzia" multiple="multiple"> 
						<option value="analista" > Analista </option>  	
						<option value="diseinatzailea" > Diseinatzailea </option>			
						<option value=" programatzailea" > Programatzailea </option>
						<option value="Proiektu zuzendaria"> Proiektu zuzendaria </option>
						<option value=" Idazkaria"> Idazkaria </option>	
				</select> <br>
			<u><i> Beste merituak </u> </i> <br>
			<textArea name="testua" cols="70" rows="2" value=""> Hemen idatz ezazu </textArea>
					
</fieldset>
</p>

<input type="button" name="Reset" value="Reset" onclick="reseteatu();" />
<input type="button" name="Balioztatu" value="Balioztatu"  onclick="balioztatu();"/> 
<input type="button" name="datuak emailez bidali" value="Datuak emailez bidali" />
<input type="button" name="datuak taulara gehitu" value="Datuak taulara gehitu" />
<input type="button" name="erabiltzailea_ezabatu" value="erabiltzailea ezabatu" disabled= "true" />
<input type="button" name="erabiltzailea_aldatu" value="erabiltzailea aldatu" disabled= "true" />




</form>
</body>
</html>

<! -- #TR= hilara
#TD = zutabe
#gure argazkiak 3 lerro, orduan 3 aldiz TR eta lerro bakoitzeko 3 zutabe.
#izenburua jartzeko taulari= th
#border= para poner la cuadricula, =1 para la anchura de la raya.
#para centrar= td barruan align = "center"
#arghazkia HTML karpetan egon behar da.
#img src="argazkiaren izena.jpg" argazkia lortzeko
#height zabalera jartzeko argazkiari
#link-aren erreferentzia, nora joango den.
#href="profilak/amaia.html" ; profilak karpeta sortu behar da eta pertsona bakoitzarentzako a.html artxiboa.

#document.formularioaren izena. eremuaren izena.value=""


#document.formularioa.telefonoa.value.length ! = 9
lehenengo laurak egin
-->


