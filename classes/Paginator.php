<?php

class Paginator {		
		
        

        public function __construct()
        {
        	
        }
        
        public static function handlePagination(){
              $num_of_record = 2; 
    $page =  isset($_GET["page"]) ? $_GET["page"] :  $page=1;    
    $start_from = ($page-1) * $num_of_record;  

        }
		

        public static function printLinks($count,$num_of_record,$page)
        {
            $pageName =  basename($_SERVER['PHP_SELF']);
            $total_pages = ceil($count / $num_of_record);  
            $pagLink='';   
            //$pagLink = $page>=2 ?  "<a onclick='showPage(".($page-1).")'>  Prev </a>" : '';  
                
            for ($i=1; $i<=$total_pages; $i++)   
                $pagLink .=    $i == $page ?  "<a class = 'active' onclick='showPage(".$i.")' >".$i." </a>"  :    "<a  onclick='showPage(".$i.")'> ".$i." </a>"; 
                 
           // $pagLink .= ($page<$total_pages)? "<a onclick='showPage(".($page+1).")'>  Next </a>" : '';
         
            echo $pagLink; 
        }
				
        
      
      
       
     
}
