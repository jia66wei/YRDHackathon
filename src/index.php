<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<form name="form1" method="post" action="index.php">
<table>
<tr>
	<td>UID:</td><td><input type="text" name="uid" value=""></td>
	<td><input style="block" type="file" value="请选择文件"></input></td>
</tr>
<tr>
	<td>
	Comment:</td><td> <textarea name="comment" value="" rows="5" cols="40"></textarea
	</td>
</tr>
<tr>
	<td>
	&nbsp;
	</td><td>
	<input type="submit" value="submit">
	</td>
</tr>
</table>
</form>
<?php
//header("Content-Type:text/html;charset=utf-8");
//获取表单提交的数据
$uid = $_POST['uid'];
$comment = $_POST['comment'];
system("python /Users/jiawei/jiawei/YRD/hackathon/src/hackathon_v1.py $uid $comment ");
echo "<br>";
if ($uid !="")
{
	echo "评论用户主页：<a href='http://weibo.com/u/$uid'>http://weibo.com/u/$uid</a>";
}
#echo $comment;
?>
<br>
<table>
<tr>
TIPS:
</tr>
<tr>
<td>1.uid-微博帐号(段老师帐号:1859409827;其他可测试帐号:1810001095,1435431423,5584462527,2763550310)</td>
</tr>
<tr>
<td>2.content- 1)中文内容最好放在""内；2)再次提交内容不要相似</td>
</tr>
<tr>
<td>3.推荐文案:</tr></td> 
<tr><td>
1)"小宜已经默默关注您很久了，我们为您打造了与您优雅气质相符专属理财产品-宜定赢: http://www.yirendai.com/finance/list/1" 
</tr></td>
<tr><td>
2)"FindYou,WelcomeYRDFamily:http://www.yirendai.com"
</tr></td>
<tr><td>
3)"互联网金融第一股(YRD)小宜在这里，欢迎来参观→_→ http://www.yirendai.com/finance/list/1"</td>
</tr></td>
</tr>
</table>
</body>
</html>
