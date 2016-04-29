#:-*-coding:utf8-*-
#@AUTHOR:jiawei
#@USE:publish message
#@DATE:20160408

import sys
import time
import json

from interface import GetWbInfo
from publishmessage import CreateComment

if __name__ == '__main__':
	if len(sys.argv) < 3:
		print "need 'exe','uid','comments'"
		exit()
	uid = sys.argv[1]
	comment = sys.argv[2]
	WBINFO = GetWbInfo()
	PUBLISH =  CreateComment()

	#comment = '小宜已经默默关注您很久了，我们为您打造了与您优雅气质相符专属理财产品-宜定赢: http://www.yirendai.com/finance/list/1'
	#comment = 'FindYou,WelcomeYRDFamily ->_-> http://www.yirendai.com'
	#comment = '年化近似10%的理财产品宜定盈，值得你关注→_→ http://www.yirendai.com/finance/list/1'
	#comment = '互联网金融第一股(YRD)在这里→_→ http://www.yirendai.com/finance/list/1'
	print 'uid:',uid
	midlist = WBINFO.getMidList(uid)
	if len(midlist) == 0 :
		print 'sorry,can not get mblog info!'
		exit()
	for i in range(0,min(2,len(midlist))):
		mid = midlist[i]
		print 'begging comment:',mid
		time.sleep(2)
		PUBLISH.createComment(mid,comment)
		print 'endding comment:',mid
