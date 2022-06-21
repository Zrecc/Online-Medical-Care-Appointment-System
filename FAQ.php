<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	
	<style>
	p{
		font-size: 40px;
		font-weight: bold;
		margin: 0 10px;
		text-align: center;
		padding-top: 100px;
		}

	section{
		width: 100%;
		height: 800px;
		padding-top: 50px;
		display: flex;
		justify-content: center;
	}
	
	.container{
		width: 70%;
	}
	
	.box{
		background-color: #000000;
		border-radius: 10px;
		margin: 20px 0;
		padding: 10px;
		width: 100%;
	}
	
	.link {
		text-decoration: none;
		padding: 10px 0;
		display: flex;
		justify-content: space-between;
        width: 100%;
        height: 20px;
        line-height: 5px;
		cursor: pointer;
		color: #FFF;
	}
	
	.link:visited{
		color: #C0C0C0;
	}
	
	#faq1, #faq2, #faq3, #faq4 {
			display: none;
		}
		
	.answer{
		background-color: #000000;
		color: #FFFFFF;
		font-size: 18px;
		padding: 20px;
		border-radius: 10px;
		background-color: #1ca9c9;
		overflow: hidden;
		display: none; 
	}
	
	headerspace {
		height: 130px;
	}
	</style>
	
	<script>
        function showHide(section_id) {
          var accordian = document.getElementById(section_id);
            if (accordian.style.display == "none") {
                accordian.style.display = "block";
          } else {
                accordian.style.display = "none";
          }
        }
    </script>
</head>

<body>
<div id="headerspace"><?php include_once("header-footer/header.php");?></div><br><br>
<p>FAQs</p>
	<section>
	
	<div class="container"> 
		<div class="box">
			<a class="link" onclick="showHide('faq1')">What to do in a medical emergency?</a>
			<div class="answer" id="faq1">
			To take appropriate actions in any emergency, follow the three basic emergency action steps — Check-Call-Care. Check the scene and the victim. Call the local emergency number to activate the EMS system. 
			Ask a conscious victim's permission to provide care.
			</div>
		</div>
			
		<div class="box">
			<a class="link" onclick="showHide('faq2')">What is meant by medical care?
			</a>
			<div class="answer" id="faq2">
			Medical care means the ordinary and usual professional services rendered by a Physician or other specified Provider during a professional visit for treatment of an illness or injury.
			</div>
		</div>
			
		<div class="box">
			<a class="link" onclick="showHide('faq3')">What provides medical care?	
			</a>
			<div class="answer" id="faq3">
				Medical providers include doctors and nurses, but also pharmacies, 
				hospitals, labs, clinics, and many other entities. 
				A healthcare provider is a person or company that provides a healthcare service to you. 
				In other words, your healthcare provider takes care of you.</div>
		</div>
		
		<div class="box">
			<a class="link" onclick="showHide('faq4')">What is the process of healthcare?	
			</a>
			<div class="answer" id="faq4">
				From this point of view, five main processes are identified: Keeping Healthy, Detecting Health Problems, Diagnosing Diseases, Treating Diseases and Providing for a Good End of Life. The citizen should be looked upon as a cocreator of value and improvement of these processes.</div>
		</div>
		<br><br>
		
	</div>
	</section>
	<div><?php include_once("header-footer/footer.php");?></div>
</body>
</html>