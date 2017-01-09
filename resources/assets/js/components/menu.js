
var menu = {
    loginForm: function(){
		let url = $(this).attr('data-link');
		//console.log(url);
		$.get(url, {}, function(response){
			if(response.success == 1){
				$('.screenPanel').html(response.data.html);
			}
		})
		
        
    },
    bind: function(){
        $('#sidebar li a').click(menu.loginForm);
        $('.btnajax').click(menu.loginForm);
    }
}

 $(menu.bind);