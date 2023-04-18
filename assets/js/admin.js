(function ($) {

	$(document).ready(function(){
		$('#logFiles').change( function (e) {
			$('#loadingLogs').show();
			let params = {
				action: ajaxobj.action_getLog,
				nonce: ajaxobj.eucap_nonce,
				filename: JSON.stringify(e.target.value)
			}
			$.get(ajaxobj.ajax_url, params, function(res){
				const div = $('#logFileContent');
				div.html(res.message[1]);
				$('#loadingLogs').hide();
			}, 'json');
		});
	})

})(jQuery);