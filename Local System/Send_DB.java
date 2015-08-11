import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;


public class Send_DB {
	
	public Send_DB(){ }
	
	public Send_DB(Use_Saramin_API Saramin_API) {
		try {
			   Class.forName("com.mysql.jdbc.Driver");
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = "jdbc:mysql://localhost:3306/gongche";
			  String username = "gongche";
			  String password = "1q2w3e4r5t";
			  try {
			   Connection conn = DriverManager.getConnection(url, username, password);
			   Statement stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO gongche(job_name, company_url, published, deadline_data, occupations, in_Jobs, large_companies)"
			   		+ " VALUES ('"+ Saramin_API.Job_name +"','"+Saramin_API.Company_url+"','"+ Saramin_API.string_published 
			   		+"','"+ Saramin_API.string_deadline_date +"',"+ Saramin_API.Occupations +",'"+Saramin_API.in_Jobs+"',"+Saramin_API.large_companies+")";
			   stmt.executeUpdate(sql);
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }
	}
	
	public Send_DB(Use_Jobkorea Jobkorea) {
		try {
			   Class.forName("com.mysql.jdbc.Driver");
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = "jdbc:mysql://localhost:3306/gongche";
			  String username = "gongche";
			  String password = "1q2w3e4r5t";
			  try {
			   Connection conn = DriverManager.getConnection(url, username, password);
			   Statement stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO gongche(job_name, company_url, published, deadline_data, occupations, in_Jobs, large_companies)"
				   		+ " VALUES ('"+ Jobkorea.Job_name +"','"+Jobkorea.Company_url+"','"+ Jobkorea.string_published 
				   		+"','"+ Jobkorea.string_deadline_date +"',"+ Jobkorea.Occupations +",'"+Jobkorea.in_Jobs+"',"+Jobkorea.large_companies+")";
			   stmt.executeUpdate(sql);
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }
	}

}
