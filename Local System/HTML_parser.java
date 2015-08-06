
import java.io.IOException;  

import org.jsoup.Connection;
import org.jsoup.Jsoup;  
import org.jsoup.nodes.Document;  
import org.jsoup.nodes.Element;  
import org.jsoup.select.Elements;

class Company_Data{
	int Company_ID;
	String Company_url;
	
}
   
public class HTML_parser{  
    public static void main(String[] args) throws IOException {  
   
    	//사람인 API의 XML구문 추출
        Document doc = Jsoup.connect("http://api.saramin.co.kr/job-search?deadline=2015-08-07 19:55").get();
        //구문 해석을 위한 임시 변수정
        String[] tmp_string;
        
       //XML의 데이터 추출 : job 
        //API에서는 job 태그로 각 기업정보를 저장하고 있음
        Elements titles = doc.select("job");  
        //추출한 데이의 전체 내용 출력
        for(Element e: titles){  
            System.out.println("text: " +e.text());  
        }
        
        //추출한 데이의 전체 내용 출력
        for(Element e: titles){
        	tmp_string = e.text().split(" ");
        	for(int i=0; i<tmp_string.length; i++)
            System.out.println(tmp_string[i]);
        	//디버깅
        	System.out.println(e);
        }
        
   
    }  
}  