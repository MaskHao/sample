
    //构造函数 
function Line(beginX,beginY,endX,endY,stepNumber,ctx){
	var context = ctx;
	var speedX = (endX-beginX)/stepNumber;
	var speedY = (endY-beginY)/stepNumber;
	var num = 0;
	var x = beginX;
	var y = beginY;
	this.draw = function(){
		num++;
		x+=speedX;
		y+=speedY;
		if(num>=stepNumber){
			x=endX;
			y=endY;
		}
		//开始绘画
		context.beginPath();
		context.shadowBlur = 0;
		context.strokeStyle = "white";//线色
		context.lineWidth = 0.1;//线宽
		context.moveTo(beginX,beginY);
		context.lineTo(x,y);
		context.stroke();
	}
}
//画圆
var r = 5;//半径
function arc(x,y,ctx){
	var context = ctx;
	context.beginPath();
	context.shadowColor = "floralwhite";
	context.shadowBlur = 1;
	context.arc(x,y,r,0,Math.PI*2,false);
	context.fillStyle = "white";
	context.fill();context.stroke();
}

//page2 
function page2_function(){
	//page2 左边线条
	var canvas = document.getElementById("canvas");
	canvas.width = window.innerWidth;
   	canvas.height = window.innerHeight;
	console.log(canvas.width+"//"+canvas.height);
    var ctx1 = canvas.getContext("2d");
	
	 var cx = canvas.width;
	 var ch = canvas.height;
	 var line1 = new Line(0,0.125*ch,0.36*cx,0.21*ch,10,ctx1);
	 var line2 = new Line(0.36*cx,0.21*ch,0.36*cx,0.84*ch,20,ctx1);
	 var line3 = new Line(0.36*cx,0.84*ch,0.53*cx,0.84*ch,20,ctx1);
	 var line4 = new Line(0.53*cx,0.84*ch,0.53*cx,ch,20,ctx1);
	// //page2 右边线条
	 var line5 = new Line(0.63*cx,0.75*ch,0.63*cx,0.8*ch,5,ctx1);
	 var line6 = new Line(0.63*cx,0.8*ch,0.96*cx,0.8*ch,10,ctx1);
	 var line7 = new Line(0.96*cx,0.8*ch,0.63*cx,0.69*ch,15,ctx1);
	 var line8 = new Line(0.63*cx,0.69*ch,0.63*cx,0.16*ch,20,ctx1);
	 var nums = 0;
	 function move (){
	 	nums++;
	 	line1.draw();
	 	var ctx = ctx1;
	 	arc(0.63*cx,0.75*ch,ctx);
	 	line5.draw();
	 	if(nums>5){
	 		arc(0.63*cx,0.8*ch,ctx);
	 		line6.draw();
	 	}if(nums>10){
	 		arc(0.36*cx,0.21*ch,ctx);
	 		line2.draw();
	 	}
	 	 if(nums>15){
	 		arc(0.96*cx,0.8*ch,ctx);
	 		line7.draw();
	 	}
	 if(nums>30){
	 		arc(0.63*cx,0.69*ch,ctx);
	 		line8.draw();
	 		arc(0.36*cx,0.84*ch,ctx);
	 		line3.draw();
	 	}
	if(nums>50){
	 		arc(0.63*cx,0.69*ch,ctx);
	 		line8.draw();
	 	}
	 if(nums>60){
	 		arc(0.63*cx,0.16*ch,ctx);
	 		arc(0.53*cx,0.84*ch,ctx);
	 	}
	 if(nums>100){
	 	line4.draw();
	 }
	 	window.requestAnimationFrame(move);
	 	if(nums>200){
	 		window.cancelAnimationFrame(move);
	 	}
	 } 
	 move ();
}

//page3
function page3_function(){
		var canvas2 = document.getElementById('canvas2');
		canvas2.width = window.innerWidth;
	 	canvas2.height = window.innerHeight;
		console.log(canvas2.width+"//"+canvas2.height);
	  	var ctx2 = canvas2.getContext("2d");
		var cx = canvas2.width;
	 	var ch = canvas2.height;
	 	var line1 = new Line(0.5*cx,0,0.5*cx,0.07*ch,40,ctx2 );
	 	var nums=0;
	 	function move2 (){
		 	nums++;
		 	line1.draw();
		 	var ctx = ctx2;
		   	if(nums>40){
		   		arc(0.5*cx,0.07*ch,ctx)
		   	}
		 	window.requestAnimationFrame(move2);
		 	if(nums>200){
		 		window.cancelAnimationFrame(move2);
		 	}
	 	} 
	 move2();
}




//page4
function page4_function(){
	var canvas4 = document.getElementById('canvas4');
	canvas4.width = window.innerWidth;
   	canvas4.height = window.innerHeight;
	console.log(canvas4.width+"//"+canvas4.height);
    var ctx4 = canvas4.getContext("2d");
	var cx = canvas4.width;
   	var ch = canvas4.height;
   	var line1a = new Line(0,0.8*ch,0.37*cx,0.91*ch,20,ctx4 );
   	var line1b = new Line(0.37*cx,0.91*ch,0.37*cx,0.87*ch,5,ctx4 );
   	var line1c = new Line(0.37*cx,0.87*ch,0.52*cx,0.87*ch,20,ctx4 );
   	
   	var line2a = new Line(0.52*cx,1*ch,0.52*cx,0.8*ch,20,ctx4 );
   	var line2b = new Line(0.52*cx,0.8*ch,0.63*cx,0.8*ch,5,ctx4 );
	var line2c = new Line(0.63*cx,0.8*ch,0.63*cx,0.75*ch,20,ctx4 );
	
	var line3a = new Line(1*cx,0.26*ch,0.63*cx,0.17*ch,20,ctx4 );
   	var line3b = new Line(0.63*cx,0.17*ch,0.63*cx,0.7*ch,20,ctx4);
   	var nums=0;
   	function move4 (){
	 	nums++;var ctx = ctx4;
	 	line1a.draw();
	 	line2a.draw();
	 	line3a.draw();
	   	if(nums>20){
	   		arc(0.37*cx,0.91*ch,ctx);
	   		line1b.draw();
	   		arc(0.52*cx,0.8*ch,ctx);
	   		line2b.draw();
	   		arc(0.63*cx,0.17*ch,ctx);
	   		line3b.draw();
	   	}
	   	if(nums>25){
	   		arc(0.37*cx,0.87*ch,ctx);
	   		line1c.draw();
	   		arc(0.63*cx,0.8*ch,ctx);
	   		line2c.draw();
	   	}
	   	if(nums>40){
	   		arc(0.63*cx,0.7*ch,ctx);
	   	}
	   	if(nums>45){
	   		arc(0.52*cx,0.87*ch,ctx);
	   		arc(0.63*cx,0.75*ch,ctx);
	   	}
	 	window.requestAnimationFrame(move4);
	 	if(nums>200){
	 		window.cancelAnimationFrame(move4);
	 	}
   	} 
   move4();
}


//page5
function page5_function(){
	$("#poster5").on("click",large);
	var canvas5 = document.getElementById('canvas5');
	canvas5.width = window.innerWidth;
   	canvas5.height = window.innerHeight;
	console.log(canvas5.width+"//"+canvas5.height);
    var ctx5 = canvas5.getContext("2d");
	var cx = canvas5.width;
   	var ch = canvas5.height;
   	var line1 = new Line(0.5*cx,0,0.5*cx,0.07*ch,40,ctx5 );
   	var nums=0;
   	function move5 (){
	 	nums++;
	 	line1.draw();
	 	var ctx = ctx5;
	   	if(nums>40){
	   		arc(0.5*cx,0.07*ch,ctx)
	   	}
	 	window.requestAnimationFrame(move5);
	 	if(nums>200){
	 		window.cancelAnimationFrame(move5);
	 	}
   	} 
   move5();
}




//page6
function page6_function(){
	var canvas6 = document.getElementById('canvas6');
	canvas6.width = window.innerWidth;
   	canvas6.height = window.innerHeight;
	console.log(canvas6.width+"//"+canvas6.height);
    var ctx6 = canvas6.getContext("2d");
	var cx = canvas6.width;
   	var ch = canvas6.height;
   	var line1a = new Line(0,0.2*ch,0.37*cx,0.32*ch,20,ctx6);
   	var line1b = new Line(0.37*cx,0.32*ch,0.37*cx,0.73*ch,20,ctx6);
   	
   	var line2a = new Line(0.3*cx,ch,0.3*cx,0.8*ch,20,ctx6);
   	var line2b = new Line(0.3*cx,0.8*ch,0.63*cx,0.8*ch,20,ctx6);
   	var line2c = new Line(0.63*cx,0.8*ch,0.63*cx,0.75*ch,40,ctx6);
   	
   	var line3a = new Line(1*cx,0.26*ch,0.63*cx,0.16*ch,20,ctx6);
   	var line3b = new Line(0.68*cx,0.18*ch,0.68*cx,0.65*ch,20,ctx6);
   	var line3c = new Line(0.63*cx,0.16*ch,0.63*cx,0.69*ch,20,ctx6);
   	
   	var nums=0;
   	function move6 (){
	 	nums++;var ctx = ctx6;
	 	line1a.draw();
	 	line2a.draw();
	 	line3a.draw();
	   	if(nums>20){
	   		arc(0.37*cx,0.32*ch,ctx);
	   		line1b.draw();
	   		arc(0.3*cx,0.8*ch,ctx);
	   		line2b.draw();
	   		arc(0.68*cx,0.175*ch,ctx);
	   		arc(0.63*cx,0.16*ch,ctx);
	   	}
	   	if(nums>40){
	   		line3b.draw();
	   		line3c.draw();
	   	}
	   	if(nums>60){
	   		arc(0.68*cx,0.65*ch,ctx);
	   		arc(0.63*cx,0.69*ch,ctx);
	   		line2c.draw();
	   	}
	   	if(nums>90){
	   		arc(0.63*cx,0.75*ch,ctx);
	   	}
	 	window.requestAnimationFrame(move6);
	 	if(nums>200){
	 		window.cancelAnimationFrame(move6);
	 	}
   	} 
   move6();
}





//page8
function page8_function(){
	var canvas8 = document.getElementById('canvas8');
	canvas8.width = window.innerWidth;
   	canvas8.height = window.innerHeight;
	console.log(canvas8.width+"//"+canvas8.height);
    var ctx8 = canvas8.getContext("2d");
	var cx = canvas8.width;
   	var ch = canvas8.height;
   	var line1a = new Line(0,0.12*ch,0.37*cx,0.24*ch,20,ctx8);
   	var line1b = new Line(0.37*cx,0.24*ch,0.37*cx,0.73*ch,20,ctx8);
   	
   	var line2a = new Line(1*cx,0.84*ch,0.63*cx,0.75*ch,20,ctx8);
   	var line2b = new Line(0.63*cx,0.75*ch,0.63*cx,0.8*ch,20,ctx8);
   	var line2c = new Line(0.63*cx,0.8*ch,0.37*cx,0.8*ch,20,ctx8);
   	var line2d = new Line(0.37*cx,0.8*ch,0.37*cx,1*ch,20,ctx8);
   	
   	var line3a = new Line(1*cx,0.78*ch,0.63*cx,0.68*ch,20,ctx8);
   	var line3b = new Line(0.63*cx,0.68*ch,0.63*cx,0.33*ch,20,ctx8);
   	
   	var nums=0;
   	function move8 (){
	 	nums++;var ctx = ctx8;
	 	line1a.draw();
	 	line2a.draw();
	 	line3a.draw();
	   	if(nums>20){
	   		arc(0.37*cx,0.24*ch,ctx);
	   		line1b.draw();
	   		arc(0.63*cx,0.75*ch,ctx);
	   		line2b.draw();
	   		arc(0.63*cx,0.68*ch,ctx);
	   		line3b.draw();
	   	}
	   	if(nums>40){
	   		arc(0.63*cx,0.33*ch,ctx);
	   		arc(0.37*cx,0.73*ch,ctx);
	   		arc(0.63*cx,0.8*ch,ctx);
	   		line2c.draw();
	   	}
	   	if(nums>70){
	   		arc(0.37*cx,0.8*ch,ctx);
	   		line2d.draw();
	   	}
	 	window.requestAnimationFrame(move8);
	 	if(nums>200){
	 		window.cancelAnimationFrame(move8);
	 	}
   	} 
   move8();
}
