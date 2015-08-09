import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;


public class Send_DB {
	
	public void SendDB() {
		try {
			   Class.forName("com.mysql.jdbc.Driver");
			  } catch (ClassNotFoundException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }

			  String url = "jdbc:mysql://mysql.wink.ws";
			  String username = "u407641631_gong";
			  String password = "**********";
			  try {
			   Connection conn = DriverManager.getConnection(url, username, password);
			   Statement stmt = conn.createStatement();
			   
			   String sql = "INSERT INTO auto_increment_test_table job_name VALUE ('test')";
			   stmt.executeUpdate(sql);
			  } catch (SQLException e) {
			   // TODO Auto-generated catch block
			   e.printStackTrace();
			  }
	}

}
