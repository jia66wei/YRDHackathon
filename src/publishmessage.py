__author__ = 'hechaoyi'

import urllib2
import urllib

class CreateComment:
	def createComment(self,usrBlogId, comment):
		headers = {  
			'User-Agent':'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6'  
				}  
		postUrl="https://api.weibo.com/2/comments/create.json"
		#"access_token":"2.00PopvFG0hVzju598230862b019v9P",
		postData={
			"access_token":"2.00DyZUyBv5KO5D58d2f6f090cCaDWB",
			"comment":comment,
			"id":usrBlogId
		}
		resquest=urllib2.Request(postUrl,urllib.urlencode(postData))
		res=urllib2.urlopen(resquest)
