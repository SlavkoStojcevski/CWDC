			var start=new Date().getTime();
			var reakcija=new Date().getTime();
			function getcolor(){
				var leters="0123456789ABCDEF".split('');
				var color="#";
				for(var i=0;i<6;i++){
					color+=leters[Math.floor(Math.random()*16)];
				}
				return color;
				alert(color);
			}
			function shape_disappear (){
					var end =new Date().getTime();
					document.getElementById("shape").style.display="none";
					reakcija=(end-start)/1000;
					document.getElementById("reactiontime").innerHTML="You reacted in: "+reakcija+" seconds.";
					setTimeout(shape_appear,Math.random()*3000);
			}
			function shape_appear(){
				document.getElementById("shape").style.display="block";
				document.getElementById("shape").style.top=(Math.floor(Math.random()*600))+"px";
				document.getElementById("shape").style.left=(Math.floor(Math.random()*1700))+"px";
				document.getElementById("shape").style.width=(Math.floor(Math.random()*600))+"px";
				document.getElementById("shape").style.height=(Math.floor(Math.random()*600))+"px";
				document.getElementById("shape").style.backgroundColor=getcolor();
				document.getElementById("shape").style.borderRadius=(Math.floor(Math.random()*100))+"%";
				start=new Date().getTime();

			}