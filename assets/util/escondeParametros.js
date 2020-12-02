
function escondeParametrosUrl() {     //função
	urlCompleta = $(location).attr('href');   //pega a url atual da página
	urlLimpa 	= urlCompleta.split("?")[0]      //tira tudo o que estiver depois de '?'

	window.history.replaceState(null, null, urlLimpa); //subtitui a url atual pela url limpa
}

setTimeout(escondeParametrosUrl, 100) //chama a função depois de 100 milisegundos
