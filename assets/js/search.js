function s1() {
	const searchBox = document.querySelector(".search-box");
      const searchBtn = document.querySelector(".search-icon");
      const cancelBtn = document.querySelector(".cancel-icon");
      const searchInput = document.querySelector("input");
      const searchData = document.querySelector(".search-data");
	 searchBox.classList.add("active");
        searchBtn.classList.add("active");
        searchInput.classList.add("active");
        cancelBtn.classList.add("active");
        searchInput.focus();
        if(searchInput.value != ""){
          $area = searchInput.value;
          searchData.classList.remove("active");
session_start();
			//$_SESSION['status']  = "Ok";
			$area=setcookie('area',$area, time()+3600, '/');

       //header('location: ../php/searchOrder.php');
				
         searchData.innerHTML = "You just typed " + "<span style='font-weight: 500;'>" + $area + "</span>";
        }else{
          searchData.textContent = "";
        }
}
function s2()
{
	searchBox.classList.remove("active");
        searchBtn.classList.remove("active");
        searchInput.classList.remove("active");
        cancelBtn.classList.remove("active");
        searchData.classList.toggle("active");
        searchInput.value = "";
}