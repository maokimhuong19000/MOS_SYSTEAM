
var submenuHeight = $('.submenu').outerHeight();

//console.log(submenuHeight);

$('.submenu').css('margin-top', '-' + submenuHeight + 'px');

$('.item').each(function() {
	var clicker = true;
	
	$(this).click(function() {
		if(clicker) {
			$(this).next('.submenu-container').find('.submenu').css('margin-top', '0');
			clicker = false;
		} else if (!clicker) {
			$(this).next('.submenu-container').find('.submenu').css('margin-top', '-' + submenuHeight + 'px');
			clicker = true;
		}
	})
	
});


//tab
function openPage(pageName,elmnt,color) {

			    var i, tabcontent, tablinks;
			    tabcontent = document.getElementsByClassName("tabcontent");
			    for (i = 0; i < tabcontent.length; i++) {
			        tabcontent[i].style.display = "none";
			    }
			    tablinks = document.getElementsByClassName("tablink");
			    for (i = 0; i < tablinks.length; i++) {
			        tablinks[i].style.backgroundColor = "";
			    }
			    document.getElementById(pageName).style.display = "block";
			    elmnt.style.backgroundColor = color;

			}
			// Get the element with id="defaultOpen" and click on it
			//document.getElementById("defaultOpen").click();

			
    function formatNumber(num) {
    return num.replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function datekh(param){

	var date = new Date(param);
            var day =   date.getDate();
            var month = (parseInt(date.getMonth()) +1) ;
            var year = date.getFullYear() ;
            var result = (day > 9 ? day : "0"+day)  + "-" + (month > 9 ? month : "0"+month) + "-" + year;
            return result ;
}

function datekh_hour(param){

	var date = new Date(param);
            var day =   date.getDate();
            var month =  (parseInt(date.getMonth()) +1) ;
            var year = date.getFullYear() ;
            var hour =  date.getHours();
            var minute =  date.getMinutes();
            var second = date.getSeconds();
            var result = (day > 9 ? day : "0"+day)  + "-" + (month > 9 ? month : "0"+month) + "-" +
             year + "  " + (hour > 9 ? hour : "0"+hour)+ ":"+(minute > 9 ? minute : "0"+minute) + ":"+
             (second > 9 ? second : "0"+second);
            return result ;
}