$(function(){
	$("#red").draggable({axis:"y"});
	$("#green").draggable({axis:"x"});
	$("#kid").draggable({containment: "parent"});
	$("#kid").resizable({
		grid: 10,
		alsoResize: "#gras",
		resize: function(event,ui){
			if($("#kid").width()>=150){
				alert("aloo dosta e");
			}
		}
	});
	$("#drop").draggable();
	$("#inside").droppable({
		drop: function(event,ui){
			alert("Droppppppppppppppppppppp!!!!!!");
			console.log(event);
		}
	});
});