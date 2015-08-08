	/* 공채일정을 위한 HTML 파싱 시스템
	 * 목적 : 사람인 잡코리아 등의 사이트 내에서 구문을 해석하고 이를 분류한뒤 데이터베이스에 저장
	 * 필요한 외부 라이브러리 : 자바 HTML 파서 jsoup (http://jsoup.org/)
	 * */
import java.io.IOException;  

import org.jsoup.Connection;
import org.jsoup.Jsoup;  
import org.jsoup.nodes.Document;  
import org.jsoup.nodes.Element;  
import org.jsoup.select.Elements;
import java.util.*;

class Company_Data{
	static final int Etc =0, IT = 1, Office = 2, Blue_collar = 3;
	//직종분류 IT: 1, 사무직: 2, 생산직 : 3, 기타 : 0
	
	int Company_ID,published,deadline_date,Occupations;
	//Company_ID : 문서번호, published : 계시일, deadline_data: 마감일, Occupations : 직종
	String Company_url,Job_name,in_Jobs;
	//Company_url : 주소, Job_name : 회사명, in_Jobs : 상세내용
	Company_Data() { };
	
	//디버깅용 
	public String toString(){
		return "ID : " + this.Company_ID + " 기업명 : " + this.Job_name+" 주소 : " + this.Company_url + 
				" 직종 : "+ this.Put_job(this.Occupations) +" 채용명 : "+ this.in_Jobs + " 계시일 : " + this.published + " 마감일 : " + this.deadline_date;
	}
	//in_Jobs 의 구문을 분석하여 직종분류작업
	void Find_job(String in_job){
		if(in_job.contains("자바")||in_job.contains("서버")||in_job.contains("C")||in_job.contains("java")||in_job.contains("IT")) this.Occupations = IT;
		else if(in_job.contains("사무직")||in_job.contains("회계")||in_job.contains("경리")||in_job.contains("분석")) this.Occupations = Office;
		else if(in_job.contains("생산직")||in_job.contains("공장")||in_job.contains("건설")) this.Occupations = Blue_collar;
		else Occupations = Etc;
	}
	//직종 출력
	String Put_job(int Occupations){
		if(Occupations == IT) return "IT";
		else if(Occupations == Office) return "사무직";
		else if(Occupations == Blue_collar) return "생산직";
		else return "기타직종";
	}
	
}


class Use_Saramin_API extends Company_Data{
	Use_Saramin_API(){}
	Use_Saramin_API(String[] Company){
		this.Company_ID = Integer.parseInt(Company[0]); //개시물 ID추출
		this.Company_url = Company[1]; //기업주소
		this.published = Integer.parseInt(Company[3]); // 기업채용개시일
		this.deadline_date = Integer.parseInt(Company[6]);//마감일
		this.Job_name = Company[8]; //기업명
		this.in_Jobs = Company[9] + Company[10] + Company[11]; //채용명
		super.Find_job(this.in_Jobs);
	}
}

class Use_Jobkorea extends Company_Data{
	Use_Jobkorea(){}
	int i = 0;
	//잡코리아용 구문해석기
	Use_Jobkorea(String[] Company){
		this.Job_name = Company[0]; //기업명
		this.in_Jobs = Company[1] + Company[2] + Company[3] + Company[4] + Company[5]; //채용명
		for(int i = 0;i< Company.length;i++){
			//특정 문자열에 요일이 있을 경우 15을 추가하여 년월일 형태로 정수형 변수에 추가
			if(Company[i].contains("(월)")||Company[i].contains("(화)")||Company[i].contains("(수)")||Company[i].contains("(목)")
					||Company[i].contains("(금)")||Company[i].contains("(토)")||Company[i].contains("(일)")){
				this.deadline_date = Integer.parseInt("15"+Company[i].substring(0,2)+Company[i].substring(3,5));
			}
		}
	}
	void Set_Jobkorea_url(String url){
		this.Company_url = url;
	}
}
   
public class HTML_parser{  
    public static void main(String[] args) throws IOException {  
   
    	//사람인 API의 XML구문 추출
       Document SaramIN = Jsoup.connect("http://api.saramin.co.kr/job-search?published=2015-08-07&start=2&count=1000").get();
       Document job_korea = Jsoup.connect("http://m.jobkorea.co.kr/Starter/NI_List.asp").get();
       
        //구문 해석을 위한 임시 변수정의
        String[] tmp_string;
        //xml에서 정확한 정보를 추출하기 위한 클라스 
        
        //ArrayList을 통한 동적인 저장공간 확보
        ArrayList<Use_Saramin_API> Company_list = new ArrayList<Use_Saramin_API>();
        ArrayList<Use_Jobkorea> Company_list_2 = new ArrayList<Use_Jobkorea>();
        ArrayList<String> tmp_Array = new ArrayList<String>();
        
       //XML의 데이터 추출 : job 
        //API에서는 job 태그로 각 기업정보를 저장하고 있음
        Elements titles = SaramIN.select("job");  
        //추출한 데이의 전체 내용 출력
        for(Element e: titles){  
            System.out.println("text: " +e.text());  
        }
        
        
        //클래스를 통한 데이터 지정
        for(Element e: titles){
        	tmp_string = e.text().split(" ");
        	Company_list.add(new Use_Saramin_API(tmp_string));
        	for(int i=0; i<Company_list.size(); i++)
        		System.out.println(Company_list.get(i));
        }
        
        
        titles = job_korea.select("ul.boothEvenOdd li");
        for(Element e: titles){
        	tmp_string = e.text().split(" ");
        	Company_list_2.add(new Use_Jobkorea(tmp_string));
        	/* 잡코리아 사이트에서 채용정보의 CSS 디자인 구문을 참고하여 boothEvenOdd 클라스의 구문이 있는 전체내용 저장
        	 * 
        	 * System.out.println("job korea : "+e.text());
        	 * 	for(int i = 0; i<tmp_string.length;i++)
        	 * 		System.out.println(tmp_string[i]);
        	 */
        }
        
        Elements links = job_korea.select("ul.boothEvenOdd a[href]");
        
        for(Element l: links){ 
        	//잡코리아 모바일 페이지를 분석후 기업 사이트의 조건에 해당하는 내용을 찾아 이를 리스트에 저장함
     	   if(l.attr("abs:href").contains("GI_No")&& !(l.attr("abs:href").contains("Page=1"))){
     		   /*System.out.println("link: " +l.attr("abs:href"));
     		    * 디버깅 용*/
     		   tmp_Array.add(l.attr("abs:href"));
     	   }
         }
        
        for(int i=0; i<Company_list_2.size()&&i<tmp_Array.size() ; i++){
        		Company_list_2.get(i).Set_Jobkorea_url(tmp_Array.get(i));
        }
       
    	for(int i=0; i<Company_list_2.size(); i++){
    		System.out.println(Company_list_2.get(i));
    	}
    }  
}  
