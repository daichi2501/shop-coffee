<script type="text/javascript">
	function deleteAccount(id, role){
		var option = confirm('Bạn chắc chắn muốn xóa mục này không?');
		if(!option){
			return;
		}
		console.log(id);
		//ajax
		$.post('account&action=delete', {
			'id' : id,
			'role': role,
			'action' : 'delete'
		},function (data){
			location.reload();
		})
	}
	$(document).ready(function(){
	  $("#button-select").click(function(){
	    $(".dropdown-select").css({"display":"block"});
	      $(".style-menu").click(function(){

	      var i = $(this).text();
	      
	      $("#choice").text("");
	      $("#choice").text(i);

	      $(".dropdown-select").css({"display":"none"});
	    });
	  });
	});
</script>