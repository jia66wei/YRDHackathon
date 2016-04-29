<?php
function getMidList($uid="1810001095")
{
	#通过接口调用获得用户发博mid
	$url = "http://api.t.sina.com.cn/statuses/user_timeline.json?source=445670032&count=5&user_id=".$uid;
	$html = file_get_contents($url);  
	$json_str = json_decode($html); 
	$mid_array = array();
	for($i=0 ; $i<count($json_str);$i++)
	{
		$mid = $json_str[$i]->id;
		array_push($mid_array,$mid);
	}
	return $mid_array;  
}

function publishMessagev1($mid,$comment)
{
	$postData = http_build_query(
			array("access_token" => "2.00DyZUyBv5KO5D58d2f6f090cCaDWB",
			"comment" => $comment,
			"id" => $mid)
		);
	$opts = array('http' =>
	    array(
		'method'  => 'POST',
		'content' => $postdata
	)
	);
	$context  = stream_context_create($opts);

	$postUrl="https://api.weibo.com/2/comments/create.json";
	$result = file_get_contents($postUrl, false, $context);
	print $result;

}

function publishMessage($mid,$comment)
{
	#调用接口发布评论信息
	//$postData["access_token"] = "2.00DyZUyBv5KO5D58d2f6f090cCaDWB";
	$postData["access_token"] = "2.00PopvFG0hVzju598230862b019v9P";
	$postData["comment"] = $comment;
	$postData["id"] = $mid;
	
	$content = "";
	foreach ( $postData as $k => $v ) 
	{ 
		$content .= "$k=" . urlencode( $v ). "&" ;
	}
	$postData = substr($content,0,-1);

	$postUrl = "https://api.weibo.com/2/comments/create.json";
	$ch = curl_init ();
	curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
	curl_setopt ( $ch, CURLOPT_URL, $postUrl );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postData );
	$return = curl_exec ( $ch );
	curl_close ( $ch );
	print $return;
}

function hackathonApi($uid,$comment)
{
	if ($uid=="" || $comment=="")
	{
		echo "'uid'和'comment'信息不能为空<br>";
		return ;
	}
	$midlist = getMidList($uid);
	if( count($midlist) < 1)
	{
		echo "sorry,can't get $uid 's mblog info!!!!";
	}
	for($i=0 ; $i<count($midlist) && $i<2 ; $i++)
	{
		echo "$i-begging:".$midlist[$i]."<br>";
		publishMessage($midlist[$i],$comment);
		echo "endded:".$midlist[$i]."<br><br><br>";
	}
}

#$mid = "3963085611701390";

?>
