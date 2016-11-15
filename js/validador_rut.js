/*******************************************************************************
 * 
 *                        Validadores de Rut y patente 
 *
 ******************************************************************************/

/*******************************************************************************
 * 
 * Funciones necesarias para validar correctamente un RUT
 * 
 ******************************************************************************/

/*******************************************************************************
 *@revisarDigito(), VERIFICA SI EL DIGITO INGRESADO CORRESPONDE AL NRO DE R.U.T
 ******************************************************************************/
function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		window.document.form1.rut.focus();		
		window.document.form1.rut.select();		
		return false;	
	}	
	return true;
}

/*******************************************************************************
 * @revisarDigito2(), VERIFICAR SI EL DIGITO INGRESO EN CORRECTO O FALTA UN NUMERO
 * EN EL R.U.T
 ******************************************************************************/
function revisarDigito2( crut, id_input )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el R.U.T completo");		
		window.document.getElementById(""+id_input+"").focus();
                window.document.getElementById(""+id_input+"").select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
            //alert("EL rut ingresado es incorrecto");	
            swal({ 
                title: "EL R.U.T ingresado es incorrecto",
                text:  "haz click en 'OK' para volver",
                type:  "info" 
            },
            function(){
                window.document.getElementById(""+id_input+"").focus();
                window.document.getElementById(""+id_input+"").value='';
                window.document.getElementById(""+id_input+"").select();
                
                return false;
            });
            window.document.getElementById(""+id_input+"").focus();
            window.document.getElementById(""+id_input+"").select();
            $("#"+id_input+"").val('');
            
            return false;
	}

	return true
}

function Rut(id_input)
{	
        texto = $("#"+id_input+"").val();
        if(texto == ""){
            return false;
        }
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		//alert("Debe ingresar el rut completo");
            swal({ 
            title: "Debe ingresar el R.U.T completo",
            text:  "haz click en 'OK' para volver",
            type:  "info" 
            },
            function(){
                window.document.getElementById(""+id_input+"").focus();
                window.document.getElementById(""+id_input+"").select();
                
                return false;
            });
            window.document.getElementById(""+id_input+"").focus();
            window.document.getElementById(""+id_input+"").select();	            
            
            return false;	
	}	
        
	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
                        swal({ 
                        title: "El valor ingresado no corresponde a un R.U.T válido",
                        text:  "haz click en 'OK' para volver",
                        type:  "info" 
                        },
                        function(){
                            window.document.getElementById(""+id_input+"").focus();
                            window.document.getElementById(""+id_input+"").value = '';
                            window.document.getElementById(""+id_input+"").select();
                            
                            return false;
                        });
                        
                        window.document.getElementById(""+id_input+"").focus();
                        window.document.getElementById(""+id_input+"").select();
                        $("#client_arut").val('');			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
            var dtexto = "";	
            dtexto = dtexto + invertido.charAt(0);	
            dtexto = dtexto + '-';	
            cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	
	
        window.document.getElementById(""+id_input+"").value = invertido.toUpperCase();
        
	if ( revisarDigito2(texto,id_input) )		
		return true;	
            
	return false;
}