// 詢問使用者是否真的要清空購物車?
function clearCart()
{
	if (confirm("您確定要清空購物車嗎?"))
	{
		location.href = "/MVC/EasyMVC/Order/clear_cart";
	}	
		
	return false;
	
}