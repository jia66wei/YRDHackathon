#:-*-coding:utf8-*-
#@AUTHOR:jiawei4
#@USE:通过开放平台接口获得微博用户的相关信息
#@DATE:20160408
#地点:HACKATHON

import sys
import urllib,urllib2
import json

class GetWbInfo():
	'''
	通过接口获得微博相关信息
	'''
	def __init__(self):
		pass

	def getMidList(self,uid):
		'''
		获得uid的最新微博信息
		http://api.t.sina.com.cn/statuses/user_timeline.json?source=XXXXXX&user_id=1810001095
		'''
		interface = 'http://api.t.sina.com.cn/statuses/user_timeline.json?'
		para = {
				"source":"XXXXXX",
				"user_id":uid,
				"count":5
		}
		req = interface + urllib.urlencode(para)
		#print req
		json_str = urllib2.urlopen(req).read()
		res = json.loads(json_str)
		mid_list = []
		for i in range(len(res)):
			mid = res[i].get('id')
			mid_list.append(mid)
		return mid_list

if __name__ == '__main__':
	G = GetWbInfo()
	print G.getMidList('2382245653')
