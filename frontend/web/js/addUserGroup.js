

function addUserGroup(clientId, userId, groupId) {
	$.ajax({
        url: '/models/addUserGroup.php',
        method: 'POST',
        data: { c_id: clientId, u_id: userId, g_id: groupId },
        success: function(response) {
        	if (response.length < 1) {
        		$(".group"+groupId).removeClass("btn-primary");
        		$(".group"+groupId).addClass("btn-success");
                document.querySelector(".group"+groupId).setAttribute("disabled", "");
        	}else{
        		console.log(response);
        	}
        }
    });
}