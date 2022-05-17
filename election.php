<?php

	//登入狀態驗證
	session_start();
	if (empty($_SESSION["user"]))
	{
	  header("location:index.html");
	  exit();
	}
	
	$id = $_SESSION["user"];
 
	require_once("dbtools.inc.php");
	
	//建立資料連接
	$link = create_connection();
	
	//執行 SELECT 陳述式取得使用者資料
	$users_sql = "SELECT * FROM users Where id = $id";
	$users_result = execute_sql($link, "member", $users_sql);	
	$users_row = mysqli_fetch_assoc($users_result);
	$account = $users_row{"account"};
 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>線上投票</title>
    <meta charset="utf-8">		
  </head>
  <style>
  
  	#card
  	{
  		border:10px solid #8B4513;
  		padding:20px 20px; 
  		background:#FFD1A4;
  		border-radius:25px;
  	}
  	
	#button {
	  display: inline-block;
	  padding: 15px 25px;
	  font-size: 24px;
	  text-align: center;   
	  color: #fff;
	  background-color: #4CAF50;
	  border: none;
	  border-radius: 15px;
	  box-shadow: 0 9px #999;
	}
	
	#button:hover {background-color: #3e8e41}
	
	#button:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}
	
	#radio{
		width:20px;height:20px
	}
	
  </style>
  <body>
    <h1 align="center">南湖高中學生自治:候選人投票</h1>
    <form name="myForm" action="vote.php" method="post" >
		<table id="card" width="60%" height="300px" align="center" bordercolor="#999999" >
			<tr height='50px'> 
				<td align="center"><b><font><h2>候選人</h2></font></b></td>
				<td align="center"><b><font><h2>候選人介紹</h2></font></b></td>
			</tr>
			<?php
				require_once("dbtools.inc.php");
							
				$link = create_connection();
															
				//執行 Select 陳述式選取候選人資料
				$sql = "SELECT * FROM candidate";
				$result = execute_sql($link, "vote", $sql);
				
				while ($row = mysqli_fetch_object($result))
				{
				  echo "<tr>";
				  echo "<td width='20%' height='50px' align='center'>";
				  echo "<h2>";
				  echo "<input id='radio' type='radio' name='name' value='$row->name'>";
				  echo "$row->name</td>";
				  echo "</h2>";
				  echo "<td><h2 align='center'>$row->introduction</h2></td>";
				  echo "</tr>";
				}
				
				mysqli_close($link);
			?>
			<tr bgcolor="#FFFF99">
				<input type="hidden" name="user_id" value="<?php echo $id ?>">
				<input type="hidden" name="account" value="<?php echo $account ?>">
			</tr>
		</table>
      <p align="center"> 
		<input id="button" type="button" value="投票" onClick="check_data()">
		<?php
			if ($id == 45){
				echo"<input id='button' type='button' value='推薦候選人' onclick='javascript:window.open('recommendation.php','_self')'>";
			}		
		?>
		<input id="button" type="button" value="觀看投票結果" onclick="javascript:window.open('result.php','_self')">
      </p>
    </form>
  </body>
  <script type="text/javascript">
    function check_data()
    {		
  
      //此部分用來驗證瀏覽者是否有選擇候選人
      for (var i = 0;i < document.myForm.elements.length; i++)
      {
        var e = document.myForm.elements[i];
        if (e.name == "name" && e.checked == true )
        {
          var found = true;
          break;          
        }
      }
  			
      if (found != true)
      {
        alert("您沒有選擇候選人");
        return false;				
      }				
  			
      myForm.submit();
    }
  </script>
</html>