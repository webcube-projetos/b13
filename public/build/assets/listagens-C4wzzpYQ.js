function t(){$(".pagination a.page-link").off(),$(".pagination a.page-link").on("click",function(){let a=$(this).attr("href").replace("#",""),i=$("nav.paginacao li.page-item.active a.page-link").attr("href").replace("#","");a!=i&&n(a)})}function n(a=1){$.ajax({url:window.location.href.split("#")[0]+"/listar",type:"GET",data:{page:a},success:function(i){$("#tableList").html(i),t()}})}$(document).ready(function(){t()});
