
import java.io.IOException;  
import org.jsoup.Jsoup;  
import org.jsoup.nodes.Document;  
import org.jsoup.nodes.Element;  
import org.jsoup.select.Elements;  
   
public class HTML_parser{  
    public static void main(String[] args) throws IOException {  
   
        Document doc = Jsoup.connect("http://blog.acronym.co.kr").get();  
        Elements titles = doc.select(".title");  
   
        //print all titles in main page  
        for(Element e: titles){  
            System.out.println("text: " +e.text());  
            System.out.println("html: "+ e.html());  
        }     
   
        //print all available links on page  
        Elements links = doc.select("a[href]");  
        for(Element l: links){  
            System.out.println("link: " +l.attr("abs:href"));  
        }  
   
    }  
}  