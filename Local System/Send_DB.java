/*  데이터 베이스 저장 및 통계분석용 텍스트 파일 저장 시스템
 *  사용 데이터베이스 시스템 : MYSQL
 * 
 * 
 *  Gongchemi version 3, Copyright (C) 2015년 <gadian88>
 * 	Gongchemi 프로그램에는 제품에 대한 어떠한 형태의 보증도 제공되지 않습니다. 
 * 	보다 자세한 사항은 http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서 참고할 수 있습니다. 
 * 	이 프로그램은 자유 소프트웨어입니다. 이 프로그램은 배포 규정을 만족시키는 조건하에서 자유롭게 재배포될 수 있습니다. 
 * 	배포에 대한 규정들은  http://korea.gnu.org/documents/copyleft/gpl.ko.html 에서  참고할 수 있습니다. 
 * 
 * 
 *  */
import java.io.BufferedWriter;
import java.io.FileOutputStream;
import java.io.OutputStreamWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

import com.mysql.jdbc.exceptions.MySQLSyntaxErrorException;


public class Send_DB {
	static final String  Encoding = "euc-kr", MYSQL="com.mysql.jdbc.Driver", LOCAL_HOST="jdbc:mysql://localhost:3306/", DB_ID="gongche", DB_PW="1q2w3e4r5t";
	//차후 R에서 데이터를 분석하기위하여 인코딩을 윈도우즈 디폴드 값으로 수동지정
	Connection conn = null;
  	Statement stmt  = null;
	public Send_DB(){ }
	/**/
	public Send_DB(Use_Saramin_API Saramin_API) {
		try {
			   Class.forName(MYSQL);
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = LOCAL_HOST+"gongche"+"?autoReconnect=true";
			  try {
			   conn = DriverManager.getConnection(url, DB_ID, DB_PW);
			   stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO gongche(job_name, company_url, published, deadline_data, occupations, in_Jobs, large_companies)"
			   		+ " VALUES ('"+ Saramin_API.Job_name +"','"+Saramin_API.Company_url+"','"+ Saramin_API.string_published 
			   		+"','"+ Saramin_API.string_deadline_date +"',"+ Saramin_API.Occupations +",'"+Saramin_API.in_Jobs+"',"+Saramin_API.large_companies+")";
			   try{
				   stmt.executeUpdate(sql);
			   }
			   catch(MySQLSyntaxErrorException e){
			//	   e.printStackTrace();
			   }
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			 //  e.printStackTrace();
			  }finally{
					try{
						if(stmt!=null)
							stmt.close();
					}catch(SQLException se2){
					}
					try{
						if(conn!=null)
							conn.close();
					}catch(SQLException se){
						se.printStackTrace();
					}
				}
	}
	
	public Send_DB(Use_Jobkorea Jobkorea) {
		try {
			   Class.forName(MYSQL);
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = LOCAL_HOST+"gongche"+"?autoReconnect=true";
			  try {
			   conn = DriverManager.getConnection(url, DB_ID, DB_PW);
			   stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO gongche(job_name, company_url, published, deadline_data, occupations, in_Jobs, large_companies)"
				   		+ " VALUES ('"+ Jobkorea.Job_name +"','"+Jobkorea.Company_url+"','"+ Jobkorea.string_published 
				   		+"','"+ Jobkorea.string_deadline_date +"',"+ Jobkorea.Occupations +",'"+Jobkorea.in_Jobs+"',"+Jobkorea.large_companies+")";
			   stmt.executeUpdate(sql);
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			  // e.printStackTrace();
			  }finally{
					try{
						if(stmt!=null)
							stmt.close();
					}catch(SQLException se2){
					}
					try{
						if(conn!=null)
							conn.close();
					}catch(SQLException se){
						se.printStackTrace();
					}
				}
	}
	public Send_DB(Use_Incruit Incruit) {
		try {
			   Class.forName(MYSQL);
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			//   e.printStackTrace();
			  }

			  String url = LOCAL_HOST+"gongche"+"?autoReconnect=true";
			  try {
			   conn = DriverManager.getConnection(url, DB_ID, DB_PW);
			   stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO gongche(job_name, company_url, published, deadline_data, occupations, in_Jobs, large_companies)"
				   		+ " VALUES ('"+ Incruit.Job_name +"','"+Incruit.Company_url+"','"+ Incruit.string_published 
				   		+"','"+ Incruit.string_deadline_date +"',"+ Incruit.Occupations +",'"+Incruit.in_Jobs+"',"+Incruit.large_companies+")";
			   stmt.executeUpdate(sql);
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			 //  e.printStackTrace();
			  }finally{
					try{
						if(stmt!=null)
							stmt.close();
					}catch(SQLException se2){
					}
					try{
						if(conn!=null)
							conn.close();
					}catch(SQLException se){
						se.printStackTrace();
					}
				}
	}
	/*DB_Garbage_Collecter : 데이터 베이스에서 기한이 지난 퀴리나 혹은 2033-01-01 중에서 20일이 경과한 내용들을 지운다
	 * triger : true = 선택적 삭제, false=전체삭제  
	 * */
	void DB_Garbage_Collecter(boolean triger){
		try {
			   Class.forName(MYSQL);
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = LOCAL_HOST+"gongche"+"?autoReconnect=true";
			  if(triger){
				  try {
					  	conn = DriverManager.getConnection(url, DB_ID, DB_PW);
					  	stmt = conn.createStatement();
					  	String sql ="DELETE FROM gongche WHERE `deadline_data` <= CURDATE() OR (`deadline_data` = '2033-01-03' AND `published` = CURDATE()+20)";
					  	stmt.executeUpdate(sql);
			   
				  } catch (SQLException e) {
					  // TODO Auto-generated catch block
					  e.printStackTrace();
				  }finally{
						try{
							if(stmt!=null)
								stmt.close();
						}catch(SQLException se2){
						}
						try{
							if(conn!=null)
								conn.close();
						}catch(SQLException se){
							se.printStackTrace();
						}
					}
			  	}
			  else{
				  	try {
					  	Connection conn = DriverManager.getConnection(url, DB_ID, DB_PW);
					  	Statement stmt = conn.createStatement();
					  	String sql ="DELETE FROM gongche";
					  	stmt.executeUpdate(sql);
					  	
				  } catch (SQLException e) {
					  // TODO Auto-generated catch block
					  e.printStackTrace();
				  }finally{
						try{
							if(stmt!=null)
								stmt.close();
						}catch(SQLException se2){
						}
						try{
							if(conn!=null)
								conn.close();
						}catch(SQLException se){
							se.printStackTrace();
						}
					}
			  }
	}
	
	void send_all_data_DB(String arg1, String date){
		
		
        
        String fileName = "C:\\tmp" + "\\" +"data_analysis "+ date +".txt" ;
         
         
        try{
                         
            // BufferedWriter 와 FileWriter를 조합하여 사용 (속도 향상)
            BufferedWriter fw = new BufferedWriter(new OutputStreamWriter(new FileOutputStream(fileName), Encoding));
             
            // 파일안에 문자열 쓰기
            fw.write(arg1);
            fw.flush();
 
            // 객체 닫기
            fw.close(); 
             
             
        }catch(Exception e){
            e.printStackTrace();
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
