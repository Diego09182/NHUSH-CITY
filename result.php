<?php

	//登入狀態驗證
	session_start();
	if (empty($_SESSION["user"]))
	{
		header("location:index.html");
		exit();
	}
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>NHUSH-CITY</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon" />
</head>
<body>
    <h2 align='center'>南湖高中學生自治:投票結果</h2>
	<div class="container">
		<div class="card">
			<table  class="container center">
			<tr> 
				<td class="center brown"><b><font>候選人</font></b></td>
				<td class="center brown"><b><font>得票數</font></b></td>
				<td class="center brown"><b><font>得票百分比</font></b></td>
				<td class="center brown"><b><font>直方圖</font></b></td>
			</tr>
			<tr> 
			<?php
				require_once("dbtools.inc.php");
						
				//建立資料連接
				$link = create_connection();
								
				//執行 SELECT 陳述式來選取候選人資料
				$sql = "SELECT * FROM candidate";
				$result = execute_sql($link, "vote", $sql);
						
				//計算總記錄數
				$total_records = mysqli_num_rows($result);
						
				//計算總票數
				  $total_score = 0;
				while ($row = mysqli_fetch_object($result))
				  $total_score += $row->score;
		
				/* 目前記錄指錄已經在資料表尾端，我們使用
				   mysql_data_seek() 函式將記錄指標移至第 1 筆記錄 */
				mysqli_data_seek($result, 0);
				?>
				<?php
				//列出所有候選人得票資料
				for ($j = 0; $j < $total_records; $j++)
				{
					//取得候選人資料
					$row = mysqli_fetch_assoc($result);
					
					//計算候選人得票百分比
					$percent = round($row["score"] / $total_score, 4) * 100;
					
					//顯示候選人各欄位的資料
					echo "<tr>";
					echo "<td class='center blue lighten-1'>".$row["name"]."</td>";
					echo "<td class='center indigo darken-1'>".$row['score']."</td>";
					echo "<td class='center pink darken-4'>".$percent."%</td>";
					echo "<td class='teal lighten-1' height='35'><img src='images/bar.jpg' width='".$percent * 3 . "' height='20'></tr>";
					echo "</tr>";
				}
				
				//釋放資源及關閉資料連接
				mysqli_free_result($result);
				mysqli_close($link);
			?>
			<tr> 
				<td class='center'>總計</td>
				<td class='center'><?php echo $total_score ?></td>
				<td class='center'>100%</td>
				<td><img src='images/bar.jpg' width='300' height='20'></td>
			</tr>
			</table>
			<div class="card-action">
				<p class='center'><a href='main.php'>回首頁</a></p>
			</div>
		</div>
	</div>
</body>
</html>