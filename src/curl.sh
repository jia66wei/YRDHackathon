#!/bin/sh
mid='3956891841188784'
comment='小宜已经默默关注您很久了，我们为您打造了与您优雅气质相符专属理财产品-宜定赢, 请点击: http://www.yirendai.com/finance/list/1'
if [ $# == 1 ];then
	mid=$1
fi

echo 'mid:',$mid
echo 'commend:',$comment
curl -d "access_token=2.00DyZUyBv5KO5D58d2f6f090cCaDWB&id=$mid&comment=$comment" "https://api.weibo.com/2/comments/create.json"
