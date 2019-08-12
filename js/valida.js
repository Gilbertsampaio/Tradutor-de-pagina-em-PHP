jQuery(document).ready(function() {

	
//validação do formulário de add album
	$('form#cad-adm').submit(function(){
			
		if( $('input#session_idioma').val() == 'br'){
		
			$alertatitulobr = 'Informe o Título';
			$alertatextobr = 'Informe a Descrição';

			$alertatitulous = 'Informe o Título em Inglês';
			$alertatextous = 'Informe a Descrição em Inglês';

			$alertatituloes = 'Informe o Título em Espanhol';
			$alertatextoes = 'Informe a Descrição em Espanhol';

			$alertatitulofr = 'Informe o Título em Francês';
			$alertatextofr = 'Informe a Descrição em Francês';

		}
		if( $('input#session_idioma').val() == 'us'){
		
			$alertatitulobr = 'Enter Title';
			$alertatextobr = 'Enter Description';

			$alertatitulous = 'Enter Title in English';
			$alertatextous = 'Enter the Description in English';

			$alertatituloes = 'Enter Title in Spanish';
			$alertatextoes = 'Enter the Description in Spanish';

			$alertatitulofr = 'Enter Title in French';
			$alertatextofr = 'Enter the Description in French';

		}
		if( $('input#session_idioma').val() == 'es'){
		
			$alertatitulobr = 'Ingrese título';
			$alertatextobr = 'Ingrese la descripción';

			$alertatitulous = 'Ingrese el título en inglés';
			$alertatextous = 'Ingrese la descripción en inglés';

			$alertatituloes = 'Ingrese el título en español';
			$alertatextoes = 'Ingrese la descripción en español';

			$alertatitulofr = 'Ingrese el título en francés';
			$alertatextofr = 'Ingrese la descripción en francés';

		}
		if( $('input#session_idioma').val() == 'fr'){
		
			$alertatitulobr = 'Entrez le titre';
			$alertatextobr = 'Entrez la description';

			$alertatitulous = 'Entrez le titre en anglais';
			$alertatextous = 'Entrez la description en anglais';

			$alertatituloes = 'Entrez le titre en espagnol';
			$alertatextoes = 'Entrez la description en espagnol';

			$alertatitulofr = 'Entrez le titre en français';
			$alertatextofr = 'Entrez la description en français';

		}	
			
			if( $('input#titulo_br').val() == ''){
				$('span#alertatitulo_br').html($alertatitulobr);
				$('input#titulo_br').focus();
				return false;
			} 

			if( $('input#titulo_us').val() == ''){
				$('span#alertatitulo_us').html($alertatitulous);
				$('input#titulo_us').focus();
				return false;
			}	

			if( $('input#titulo_es').val() == ''){
				$('span#alertatitulo_es').html($alertatituloes);
				$('input#titulo_es').focus();
				return false;
			}

			if( $('input#titulo_fr').val() == ''){
				$('span#alertatitulo_fr').html($alertatitulofr);
				$('input#titulo_fr').focus();
				return false;
			}
				
			if( $('input#foto').val() == '' ){
				$('span#alertafoto').html('Escolha a Foto');
				$('input#foto').focus();
				return false;
			}	
			
			if( $('textarea#texto_br').val() == ''){
				$('span#alertatexto_br').html($alertatextobr);
				$('textarea#texto_br').focus();
				return false;
			} 

			if( $('textarea#texto_us').val() == ''){
				$('span#alertatexto_us').html($alertatextous);
				$('textarea#texto_us').focus();
				return false;
			} 

			if( $('textarea#texto_es').val() == ''){
				$('span#alertatexto_es').html($alertatextoes);
				$('textarea#texto_es').focus();
				return false;
			} 

			if( $('textarea#texto_fr').val() == ''){
				$('span#alertatexto_fr').html($alertatextofr);
				$('textarea#texto_fr').focus();
				return false;
			} 
							
			return true;
			});
			
			
});