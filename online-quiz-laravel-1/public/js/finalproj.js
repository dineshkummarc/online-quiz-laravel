<script type="text/javascript">
	function timeOut()
	{

		var minute=Math.floor(timeLeft/60);
		var second=timeLeft%60;
		var mint=checktime(minute);
		var sec=checktime(second);
		if(timeLeft<=0)
		{
			clearTimeout(tm);
			document.getElementById("form1").submit();
		}
		else
		{
			document.getElementById("time").innerHTML=mint+":"+sec;
		}
		timeLeft--;
		var tm=setTimeout(function() {timeOut()}, 1000);
	}

	function checktime(msg)
	{
		if(msg<10)
		{
			msg="0"+msg;
		}
		return msg;
	}
</script>