/*  R분석 시스템
 *  사용 데이터베이스 시스템 : MYSQL
 * 
 * 
 *  Gongchemi version 3, Copyright (C) 2015년 <gadian88>
 * 	Gongchemi 프로그램에는 제품에 대한 어떠한 형태의 보증도 제공되지 않습니다. 
 * 	보다 자세한 사항은 http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서 참고할 수 있습니다. 
 * 	이 프로그램은 자유 소프트웨어입니다. 이 프로그램은 배포 규정을 만족시키는 조건하에서 자유롭게 재배포될 수 있습니다. 
 * 	배포에 대한 규정들은  http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서  참고할 수 있습니다. 
 * 
 *  */

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class R_handler {
	
	public void R_exe() throws IOException, InterruptedException{


		Process proc = Runtime.getRuntime().exec("Rscript.exe " + "C:\\tmp\\test.r"); 
		 

		int resultSign = proc.waitFor(); 


		  

		if(resultSign==0){

		 System.out.println("R operation success"); 

		 System.out.println();


		 StringBuffer rOut = new StringBuffer(); 

		 String inputLine; 

		 BufferedReader inputBuf = new BufferedReader(new InputStreamReader(proc.getInputStream(), "UTF-8")); 



		 while (((inputLine = inputBuf.readLine()) != null)) { 

		  rOut.append(inputLine); //rOut 변수에 쓴다

		  rOut.append("\n"); //개행문자(줄바꿈 표시문자)로는 \n을 넣어준다

		 }

		 inputBuf.close(); //input stream을 닫는다

		 

		 System.out.println(rOut.toString()); //R에서 받아온 결과물을 찍어보자


		 System.out.println("R error : "+resultSign);

		}

	}

}
/*
 * 프로그램의 이름과 용도를 한 줄 정도로 설명합니다.
 * Copyright (C) 2015년 <gadian88>
 * 
 * 이 프로그램은 자유 소프트웨어입니다. 소프트웨어의 피양도자는 자유 소프트웨어 재단이 공표한 GNU 일반 공중 사용 허가서 2판 또는 그 이후 판을 임의로 선택해서, 그 규정에 따라 프로그램을 개작하거나 재배포할 수 있습니다.
 * 
 * 이 프로그램은 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만, 특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인 보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에 대해서는 GNU 일반 공중 사용 허가서를 참고하시기 바랍니다.
 * 
 * GNU 일반 공중 사용 허가서는 이 프로그램과 함께 제공됩니다. 만약, 이 문서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다. (자유 소프트웨어 재단: Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA)
 *  */
