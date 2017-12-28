$('document').ready(function () {
    const FACTOR = 1000; //Just to get rid to decimals


    //Colour Constants
    const RED = "#e53935";
    const YELLOW = "#ffeb3b";
    const GREEN = "#4caf50";
    const BLUE = "#94E0FC";

    const LIGHT_YELLOW = "#fff9c4";
    const DARK_YELLOW = "#fff59d";

    var canvas = document.getElementById("rgraph_canvas");
    var context = canvas.getContext("2d");


    $("#SubmitButton").click(function () {
        init();
    });

	var crefid = '100';
    function init() {
        var subjectID = crefid;

        $.ajax({
            url: "dependencies/helper/get.data.helper.php",
          data: {
            "id" : crefid + "U%"
          },
          method: "POST",
          dataType: "json",
          success: function(codedata) {
              generateCircles(codedata);
          },
          error: function() {

          }
        });
    }


    function generateCircles(statusCodes) {
        //get Data
        var subjectID = crefid;
        var unit1 = parseInt($("#unit_1").val());
        var unit2 = parseInt($("#unit_2").val());
        var unit3 = parseInt($("#unit_3").val());
        var unit4 = parseInt($("#unit_4").val());
        var unit5 = parseInt($("#unit_5").val());
        //clear canvas
        context.clearRect(0, 0, canvas.width, canvas.height);


        //Generate Data
        var data = [];
        var units = [unit1,unit2,unit3,unit4,unit5];
        var count = unit1 + unit2 + unit3 + unit4 + unit5 + 5; //Changed here
	
        var c = 0;
        units.forEach(function (item) {
            item++; //changed here
            //For each unit
            for(var i = 0;i < item; i++) {
                //Expanded Form

                //Each Section == 360/5 = 72 deg
                var for_single_element = 72/item;
                var final_result = for_single_element*FACTOR;

                // Same Thing is Shortened

                data[c] = parseInt(final_result);
                c++;
            }
        });

        var inner_circle_color_array = generateInnerCirlceColourArray();
        var outer_circle_color_array = generateOuterCirlceColourArray(units,count,statusCodes);

        generateInnerCirlce(inner_circle_color_array);
        generateOuterCirlce(data,outer_circle_color_array);

        generateInnerMostCirlce();


    }


    function generateInnerCirlceColourArray() {
        var colors = [];

        //Set Basic Colour
        for(var i=0;i < 5;i++) {
            if(i%2 == 0) {
                colors[i] = LIGHT_YELLOW;
            }else{
                colors[i] = DARK_YELLOW;
            }
        }

        return colors;
    }

	
    function generateOuterCirlceColourArray(units,count,statusCodes) {
        var colors = [];

        var subjectID = crefid;
        var unit = 0;
        var c = 0;

        units.forEach(function (item) {
            item++; //change here
            unit++;
            var session = 1;
            for(var i = 0;i < item; i++) {
                var final_id = crefid + "U" + unit + "S" + session;

                if(statusCodes[final_id] == 0) {
                    colors[c] = YELLOW;
                }else if(statusCodes[final_id] == 1) {
                    colors[c] = GREEN;
                }else if(item == i+1) { //changed here
                    colors[c] = BLUE;
                }else{
                    colors[c] = RED;
                } 
                session++;
                c++;
            }
        });

        return colors;
    }

    function generateOuterCirlce(data,outer_circle_color_array) {
        //Generate Donut with calculated data
                var outerCircle = new RGraph.Pie({
                    id: 'rgraph_canvas',
                    data: data,
                    options: {centerx: 400,
                        centery: 400,
                        colors: outer_circle_color_array, //HERE WE SET THE COLOUR ARRAY
                        variantDonutWidth: 50,
                        variant: "donut",
                        linewidth: 2,
                        tooltipsEvent: 'onmousemove',
						radius:380,
                    	tooltips: "session",
                        strokestyle: 'black'
                    }
                });

                outerCircle.on('click', function (e, shape) {
                    onOuterCircleClickListner(shape['index']);
                });

                outerCircle.draw();
    } // end -> generateOuterCirlce

    function generateInnerCirlce(inner_circle_color_array) {
        //5 individual unit
                var innerCirlce = new RGraph.Pie({
                    id: 'rgraph_canvas',
                    data: [1,1,1,1,1],
                    options: {
                        centerx: 400,
                        colors: inner_circle_color_array, //HERE WE SET THE COLOUR ARRAY
                        centery: 400,
                        radius: 330,
                        variantDonutWidth: 220,
                        variant: "donut",
                        linewidth: 2,
						tooltipsEvent: 'onmousemove',
						
                    	tooltips: topics,
                        strokestyle: 'black'
					
                    }
                });

                innerCirlce.on('click', function (e, shape) {
                    onInnerCirlceClickListner(shape['index']);
                });

                innerCirlce.draw();

    } //end -> generateInnerCirlce


    function generateInnerMostCirlce() {
            var innerMostCircle = new RGraph.Drawing.Circle({
                    id: 'rgraph_canvas',
                    x: 400,
                    y: 400,
                    radius: 105,
                    options: {
                        fillstyle: '#EEEEEE', //=========//Label Circle
                        textAccessible: true,
                        textSize: 14,
						tooltips:"Course ID",
						tooltipsEvent:'onmousemove'
                    }
                });

                innerMostCircle.on('click', function (e, shape) {
                    window.location = "CourseCurriculum.php";
                });

                innerMostCircle.draw();
    }
    function onOuterCircleClickListner(sessionID) { //Maded Change in this function
        function markHalfDone() {
      var sessionID = $("#sessionID").text();

        $.ajax({
          url: "dependencies/helper/mark.half.helper.php",
          data: {
            "id" : sessionID
          },
          method: "POST",
          success: function(codedata) {
              console.log(codedata);
          },
          error: function() {
            window.alert("Something Went Wrong. Contact Admin");
          }
        });
		return false;
      } // end of -> markHalfDone

		var subjectID = crefid;

        var unit1 = parseInt($("#unit_1").val())+1;
        var unit2 = parseInt($("#unit_2").val())+1;
        var unit3 = parseInt($("#unit_3").val())+1;
        var unit4 = parseInt($("#unit_4").val())+1;
        var unit5 = parseInt($("#unit_5").val())+1;


        var units = [unit1,unit2,unit3,unit4,unit5];
        var unit = 0,c = 0;

        var exit = false;
        units.forEach(function (item) {
            if(exit) return;
            //For each unit
            unit++;
            var session = 1;
            for(var i = 0;i < item; i++) {
                if(exit) return;
                if(sessionID === c) {
                    if(units[unit-1] == session) {
                        //TODO: Set new Page address. for opening in new tab use window.open("my-link");" 
                        window.location = "new-page.php?unit=" + unit; 
                        var final_id = crefid + "U" + unit + "S" + session;

                        $.ajax({
                            url: "dependencies/helper/mark.full.helper.php",
                            data: {
                                "id" : final_id
                            },
                            method: "POST",
                            success: function(codedata) {
                                console.log(codedata);
                            },
                            error: function(msg) {
                                console.log(JSON.stringify(msg));
                            }
                            }); // end od -> ajax request

                        //mark it done

                    }else {
                        //console.log("Unit: " + unit + "   Session: " + session + "Units Value:" + units[unit-1]);
                        window.location = "Session-Form.php?u=" + unit + "&s=" + session + "&sub=" + crefid;
                    }
                    exit = true;
                }
                session++;
                c++;
            }
        });

    } //end -> onOuterCircleClickListner

    function onInnerCirlceClickListner(unitID) {
        unitID++;
        var subjectID = crefid;
        window.location = "Unit.php?u=" + unitID + "&sub=" + crefid;

    } // end of -> onInnerCirlceClickLictner


    init();
		
				
	  var topics = [];
        for(var i=0;i<5;i++) {
            topics[i] = '<b>Unit ' + (i+1) + '</b>';
        }
	
		
		

});