// Created By: John Joseph Pietrangelo III 					GO DEVILS!!

//											IMPORTANT !!!
                                    
//			If opening browser off-line, jQuery code will not be recognized by your computer!


var main = function()
{
	"use strict";
	var $new_student;
	var $semester_header;
	var $semester_spacer;
	var $semester_courseNumber;
	var $semester_courseTitle;
	var firstClickFall = 0;
	var firstClickSpring = 0;
	var addCommentFromInputBox = function()
	{
		if (($(".firstName").val() !== "") && ($(".lastName").val() !== "")) 
		{
	 		$new_student = $("<p>").text($(".firstName").val() + " " + $(".lastName").val() + " is registering for the following courses:");
	 		$new_student.hide();
		 	$(".registrationLabel").empty();
			$(".registrationLabel").append($new_student);
	 		$new_student.fadeIn(1000);
	 		$(".firstName").val("");
	 		$(".lastName").val("");
		}	
	};

	var addScheduleFromInputBox = function()
	{
		if (($(".semester option:selected").text() == "Fall 2017") && firstClickFall === 0) 
		{ 
			$semester_header = $("<h1>").text("Fall 2017:");
			$semester_spacer = $("<br>");
			$semester_courseNumber = $("<p>").text($(".courseNum option:selected").text());
			$semester_courseTitle = $("<p>").text($(".courseTitle option:selected").text());
			$semester_header.hide();
			$semester_spacer.hide();
			$semester_courseNumber.hide();
			$semester_courseTitle.hide();
			$(".outputScheduleFall").append($semester_header);
			$(".outputScheduleFall").append($semester_spacer);
			$(".outputScheduleFall").append($semester_courseNumber);
			$(".outputScheduleFall").append($semester_courseTitle);
			$semester_header.fadeIn(1000);
			$semester_spacer.fadeIn(1000);
			$semester_courseNumber.fadeIn(1000);
			$semester_courseTitle.fadeIn(1000);
			firstClickFall ++;
		}

		else if(($(".semester option:selected").text() == "Fall 2017") && firstClickFall >= 1)
		{
			$semester_courseNumber = $("<p>").text($(".courseNum option:selected").text());
			$semester_courseTitle = $("<p>").text($(".courseTitle option:selected").text());
			$semester_courseNumber.hide();
			$semester_courseTitle.hide();
			$(".outputScheduleFall").append($semester_courseNumber);
			$(".outputScheduleFall").append($semester_courseTitle);
			$semester_courseNumber.fadeIn(1000);
			$semester_courseTitle.fadeIn(1000);
		}

		if (($(".semester option:selected").text() == "Spring 2017") && firstClickSpring === 0) 
		{ 
			$semester_header = $("<h1>").text("Spring 2017:");
			$semester_spacer = $("<br>");
			$semester_courseNumber = $("<p>").text($(".courseNum option:selected").text());
			$semester_courseTitle = $("<p>").text($(".courseTitle option:selected").text());
			$semester_header.hide();
			$semester_spacer.hide();
			$semester_courseNumber.hide();
			$semester_courseTitle.hide();
			$(".outputScheduleSpring").append($semester_header);
			$(".outputScheduleSpring").append($semester_spacer);
			$(".outputScheduleSpring").append($semester_courseNumber);
			$(".outputScheduleSpring").append($semester_courseTitle);
			$semester_header.fadeIn(1000);
			$semester_spacer.fadeIn(1000);
			$semester_courseNumber.fadeIn(1000);
			$semester_courseTitle.fadeIn(1000);
			firstClickSpring ++;
		}

		else if(($(".semester option:selected").text() == "Spring 2017") && firstClickSpring >= 1)
		{
			$semester_courseNumber = $("<p>").text($(".courseNum option:selected").text());
			$semester_courseTitle = $("<p>").text($(".courseTitle option:selected").text());
			$semester_courseNumber.hide();
			$semester_courseTitle.hide();
			$(".outputScheduleSpring").append($semester_courseNumber);
			$(".outputScheduleSpring").append($semester_courseTitle);
			$semester_courseNumber.fadeIn(1000);
			$semester_courseTitle.fadeIn(1000);
		}
	};		

	$(".captureButton1").on("click",  function(event)
	{
		addCommentFromInputBox();
	}
	 );

	$(".userInputDiv1").on("keypress", function (event)
	{
		if (event.keyCode === 13)
		{ 
			addCommentFromInputBox();
		}
	}
	 );

	$(".captureButton2").on("click",  function(event)
	{
		addScheduleFromInputBox();
	}
	 );

	$('.courseNum').click(function()
	{
 		if ($(".courseNum option:selected").text() == "CIS 105") 
 		{
 			$(".courseTitle option:selected").text("Computer App-IT");
 		}

 		else if ($(".courseNum option:selected").text() == "CIS 235") 
 		{
 			$(".courseTitle option:selected").text("Intro to Information Systems");
 		}

 		else if ($(".courseNum option:selected").text() == "CIS 340") 
 		{
 			$(".courseTitle option:selected").text("Business Info System Development");
 		}

 		else if ($(".courseNum option:selected").text() == "CIS 425") 
 		{
 			$(".courseTitle option:selected").text("E-Commerce Strategy");
 		}
 		
 		else if ($(".courseNum option:selected").text() == "CIS 430") 
 		{
 			$(".courseTitle option:selected").text("Networks and Distributed Systems");
 		}
 	
 		else if ($(".courseNum option:selected").text() == "CIS 440") 
 		{
 			$(".courseTitle option:selected").text("Enterprise Systems Development");
 		}
	}
	 );

	$('.courseTitle').click(function()
	{
 		if ($(".courseTitle option:selected").text() == "Computer App-IT") 
 		{
 			$(".courseNum option:selected").text("CIS 105");
 		}

 		else if ($(".courseTitle option:selected").text() == "Intro to Information Systems") 
 		{
 			$(".courseNum option:selected").text("CIS 235");
 		}
 	
 		else if ($(".courseTitle option:selected").text() == "Business Info System Development") 
 		{
 			$(".courseNum option:selected").text("CIS 340");
 		}
 	
 		else if ($(".courseTitle option:selected").text() == "E-Commerce Strategy") 
 		{
 			$(".courseNum option:selected").text("CIS 425");
 		}
 	
 		else if ($(".courseTitle option:selected").text() == "Networks and Distributed Systems") 
 		{
 			$(".courseNum option:selected").text("CIS 430");
 		}
 	
 		else if ($(".courseTitle option:selected").text() == "Enterprise Systems Development") 
 		{
 			$(".courseNum option:selected").text("CIS 440");
 		}
	}
	 );
};

$(document).ready(main);