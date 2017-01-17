
var menu = {
    loginForm: function(){
		var url = $(this).attr('data-link');
		//console.log(url);
		$.get(url, {}, function(response){
			if(response.success == 1){

				$('body').find('#screenPanel').html(response.data.html);

			}
		})
		
        
    },
    bind: function(){
        $('#sidebar li a').click(menu.loginForm);
        $('#screenPanel a').click(menu.loginForm);
    }
}

 $(menu.bind);