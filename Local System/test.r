# 	데이터 베이스 저장 및 통계분석용 텍스트 파일 저장 시스템
#	사용 데이터베이스 시스템 : MYSQL
#
#
#	Gongchemi version 3, Copyright (C) 2015년 <gadian88>
#	Gongchemi 프로그램에는 제품에 대한 어떠한 형태의 보증도 제공되지 않습니다. 
# 	보다 자세한 사항은 http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서 참고할 수 있습니다. 
#	이 프로그램은 자유 소프트웨어입니다. 이 프로그램은 배포 규정을 만족시키는 조건하에서 자유롭게 재배포될 수 있습니다. 
#	배포에 대한 규정들은  http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서  참고할 수 있습니다. 
  


install.packages('RMySQL', repos='http://cran.nexr.com/')
install.packages("rvest", repos='http://cran.nexr.com/') 
install.packages("KoNLP", repos='http://cran.nexr.com/') 
install.packages("wordcloud", repos='http://cran.nexr.com/') 



library(RMySQL)
library(rvest)
library(KoNLP)
library(wordcloud)

useSejongDic() 
mergeUserDic(data.frame("지방", "ncn"))
mergeUserDic(data.frame("김포", "ncn"))
mergeUserDic(data.frame("알바", "ncn"))
mergeUserDic(data.frame("캐드", "ncn"))
mergeUserDic(data.frame("휘트니스", "ncn"))
mergeUserDic(data.frame("경비", "ncn"))
mergeUserDic(data.frame("택배", "ncn"))
mergeUserDic(data.frame("자바", "ncn"))
mergeUserDic(data.frame("프로그래머", "ncn"))
mergeUserDic(data.frame("시스템", "ncn"))

con <- dbConnect(MySQL(),username="gongche",password="1q2w3e4r5t",host="127.0.0.1",port=3306,dbname="gongche")
a<-con %>% dbGetQuery("SELECT * FROM gongche")
dbDisconnect(con)

a[[7]] <- iconv(as.character(a[[7]]),from='UTF-8')
a <- a[[7]]


place<-sapply(a,extractNoun,USE.NAMES=F)


setwd("c:/tmp/")

c <- unlist(place)

comp <- Filter(function(x) {nchar(x) >= 2} ,c)

comp <- gsub("사원","",comp) 
comp <- gsub("모집","",comp) 



comp <- gsub("경력","",comp)
comp <- gsub("정년","",comp)
comp <- gsub("직업","",comp)
comp <- gsub("lg","",comp)
comp <- gsub("지점","",comp)
comp <- gsub("수시","",comp)
comp <- gsub("직원","",comp)
comp <- gsub("추가","",comp)
comp <- gsub("법인","",comp)
comp <- gsub("(주)","",comp)
comp <- gsub("정규","",comp)
comp <- gsub("교육","",comp)
comp <- gsub("선생님","",comp)
comp <- gsub("에듀코","",comp)
comp <- gsub("2015","",comp)
comp <- gsub("전문통","",comp)
comp <- gsub("2014","",comp)

write(unlist(comp),"test.txt")
rev <- read.table("test.txt")


wordcount <- table(rev)
head(sort(wordcount, decreasing=T),10)

library(RColorBrewer)
palete <- brewer.pal(9,"Set1")

path <- "C:/Bitnami/wampstack-5.5.28-0/apache2/htdocs/GongcheMe/img"
filename <- paste("img_",Sys.Date(), ".png", sep="")
fullpath <- paste(path, filename, sep="/")

png(filename=fullpath, width=8,height=12, units='in', res=300 )
wordcloud(names(wordcount),freq=wordcount,scale=c(7,0.5),rot.per=0.25,min.freq=1,random.order=F,random.color=T,colors=palete)

dev.off()

result <- head(sort(wordcount, decreasing=T),10)
name <- iconv(names(result),"CP949","UTF-8")

#path <- "C:/Bitnami/wampstack-5.5.28-0/apache2/htdocs/GongcheMe/img"
#filename <- paste("img_",Sys.Date(), ".png", sep="")
#fullpath <- paste(path, filename, sep="/")
#savePlot("img.txt",type="png")



sql1 <- "INSERT INTO `data_analysis` ( `analysis_date`, `1st_word`, `1st_num`, `2st_word`, `2st_num`, `3st_word`, `3st_num`, `4st_word`, `4st_num`, `5st_word`, `5st_num`, `6st_word`, `6st_num`, `7st_word`, `7st_num`, `8st_word`, `8st_num`, `9st_word`, `9st_num`, `10st_word`, `10st_num` ) VALUES "

setsql <- paste(sql1 ,'(', "'", Sys.Date() ,"','", name[1],"'," ,"'", result[[1]],"'," ,"'", name[2],"'," ,"'", result[[2]],"'," ,"'", name[3],"'," ,"'", result[[3]],"'," ,"'", name[4],"'," ,"'", result[[4]],"'," ,"'", name[5],"'," ,"'", result[[5]],"'," ,"'", name[6],"'," ,"'", result[[6]],"'," ,"'", name[7],"'," ,"'", result[[7]],"'," ,"'", name[8],"'," ,"'", result[[8]],"'," ,"'", name[9],"'," ,"'", result[[9]],"'," ,"'", name[10],"'," ,"'", result[[10]],"')" , sep="")

con <- dbConnect(MySQL(),username="gongche",password="1q2w3e4r5t",host="127.0.0.1",port=3306,dbname="gongche")


dbSendQuery(con,"DELETE FROM `data_analysis` WHERE `analysis_date` = CURDATE()");

dbSendQuery(con, setsql);

dbDisconnect(con)


quit(save = "no", status = 0, runLast = TRUE)


# 프로그램의 이름과 용도를 한 줄 정도로 설명합니다.
# Copyright (C) 2015년 <gadian88>
# 이 프로그램은 자유 소프트웨어입니다. 소프트웨어의 피양도자는 자유 소프트웨어 재단이 공표한 GNU 일반 공중 사용 허가서 2판 또는 그 이후 판을 임의로 선택해서, 그 규정에 따라 프로그램을 개작하거나 재배포할 수 있습니다.
# 이 프로그램은 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만, 특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인 보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에 대해서는 GNU 일반 공중 사용 허가서를 참고하시기 바랍니다.
# GNU 일반 공중 사용 허가서는 이 프로그램과 함께 제공됩니다. 만약, 이 문서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다. (자유 소프트웨어 재단: Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA)
