<?php
 //檢查 cookie 中的 passed 變數是否等於 TRUE
 $passed = $_COOKIE{"passed"};
 $id = $_COOKIE{"id"};
 
 if ($_COOKIE{"passed"} != "TRUE")
 {
 		header("location:index.html");
 		exit();
 }
 if ($_COOKIE{"id"} == "")
 {
 		header("location:index.html");
 		exit();
 }
 
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
  </head>
  <body>
    <h1 align="center">南湖高中學生自治:候選人投票</h1>
    <form name="myForm" action="vote.php" method="post" >
      <table width="50%" height="300px" align="center" bordercolor="#999999">
        <tr bgcolor="#795548" height='50px'> 
          <td align="center"><b><font>候選人</font></b></td>
          <td align="center"><b><font>候選人介紹</font></b></td>
        </tr>
          <?php
            require_once("dbtools.inc.php");
						
            $link = create_connection();
														
            //執行 Select 陳述式選取候選人資料
            $sql = "SELECT * FROM candidate";
            $result = execute_sql($link, "vote", $sql);

          ?>
		
		  <?php
		  
			while ($row = mysqli_fetch_object($result))
			{
			  echo "<tr>";
			  echo "<td width='20%' height='50px' align='center' bgcolor='#42a5f5'>";
			  echo "<input type='radio' name='name'value='$row->name'>";
			  echo "$row->name</td>";
			  echo "<td bgcolor='#FFCCCC'>$row->introduction</td>";
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
        <input type="button" value="投票" onClick="check_data()">
        <input type="button" value="推薦候選人"
          onclick="javascript:window.open('recommendation.php','_self')">
        <input type="button" value="觀看投票結果"
          onclick="javascript:window.open('result.php','_self')">
      </p>
    </form>
  </body>
</html>