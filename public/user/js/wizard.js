// limitations of reel width & col.
var min_r,max_r,min_c,max_c;

$("#example-form").steps({

	
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slide",
    onStepChanging: function(event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }

        //CUSTOMER CHECK
        if (newIndex == 1) {
            if (!$("select[name=customer_id]").val()) {
                $("select[name=customer_id]").select2("open");
                alertify.error("Please Select a Customer before proceeding");
                return false;
            }
        }
        //END

        if (newIndex == 2) {
          


            //JOB TITLE CHECK
            if (!$("input[name=starting_date]").val()) {
                alert("Please Add Job Title");
              
                return false;
            }
            //END

            //JOB TYPE CHECK
            if (!$("[name=jobType]").val()) {
                // $("[name=jobType]").focus();
                alertify.error("Please Select Job Type");
                return false;
            }
            //END

            //QUANTITY CHECK
            if (!$("[name=Qty]").val()) {
                $("[name=Qty]").select();
                alertify.error("Please Add Job Quantity");
                return false;
            }
            //END


            //step 2 is completed, now we can fetch the prev data of customers
            console.log("We are ready to fetch data");
            var customer_id = $("#c_id").val();
            var job_type_id = $("[name=jobType]").val();

            //
            var form_id = $("#form_id").val();

            console.log(customer_id, job_type_id);
		    //prev for the sake  of pdf thing.
			var p_r,p_q,p_d;

            var suc_func = function(data) {

                
                console.log(data);


                var price=data['price'];
			    var date=data['date'];
				var j_qt=data['qty'];
				var qty_unit=data['qty_unit'];

			//SETTING FETCHED VALUES ACCORDINGLY
				
			     //input fields
				 // 1 dec 2020  $('#prevrate').val(price);
				 //$('#preDate').val(date);
				// $('#preQty').val(j_qt);
				 //general
				 $("#date").html(date);
				 $("#j_qty").html(j_qt);
				 $("#qty_u").html(qty_unit);

                //LOOPING THROUGH TO SHOW THE PAST RATES

                // $.each(data, function(i, c) {
                 
                //     $('#d1').append('<tr><td>' + c.date + '</td>' + '<td>' + c.proposed_rate + '</td>' + '<td>' + c.client_proposed + '</td>' + '<td>' + c.qty+'</td><td>'+c.qty_unit+'</td></tr>');

                //     p_r=c.proposed_rate;
                //     p_q=c.qty;
                //     p_d=c.date;
                  
                // });

  

                // $("#preRates").val(p_r);
                // $("#preQty").val(p_q);
                // $("#preDate").val(p_d);

                // $("#preRates").val(price);
                // $("#preQty").val(j_qt);
                // $("#preDate").val(date);
               
			}
			

            //callback request to get past rates of customer=====>
            setTimeout(function() {
                fetch2("/previous", {
                    "customer_id": customer_id,
                    "type_id":$("#jobType").val()
                }, "POST", "JSON", suc_func, false, false, false);

			}, 500);
			//END===============================================>

            var succ_func = function(data) {

                console.log(data);

                  //LOOPING THROUGH TO SHOW THE PAST RATES

                $.each(data, function(i, c) {
                 
                    $('#d1').append('<tr><td>' + c.date + '</td>' + '<td>' + c.proposed_rate + '</td>' + '<td>' + c.client_proposed + '</td></tr>');
 });

            }

            fetch2("/pastdata", {
                "form_id": form_id
            }, "POST", "JSON", succ_func, false, false, false);




            //ALERTS ON MIN/MAX    ===================>
            //job type selected
			var job_type= $( "#jobType option:selected" ).text();
			//display limitations
			 min_c =$( "#jobType option:selected" ).attr("data-mincol");
			 max_c= $( "#jobType option:selected" ).attr("data-maxcol");
			 min_r=$( "#jobType option:selected" ).attr("data-minreel");
             max_r=$( "#jobType option:selected" ).attr("data-maxreel");
             
            //show the limits in form
            if(min_c||max_c||min_r||max_r){
		
			$('#reel_space').html('<div><h4>JOB TYPE IS  '+'( '+job_type+' )'+' HAVING ( MINIMUM REEL WIDTH = '+min_r+' )'+' AND ( MAXIMUM REEL WIDTH= '+max_r+' )</h4></div>');
			$('#col_space').html('<div><h4>JOB TYPE IS  '+'( '+job_type+' )'+' HAVING ( MINIMUM COL = '+min_c+' )'+' AND ( MAXIMUM COL= '+max_c+' )</h4></div>');
			
             }else{
            
			$('#reel_space').html('<div><h4>JOB TYPE IS  '+'( '+job_type+' )'+'</h4></div>');
			$('#col_space').html('<div><h4>JOB TYPE IS  '+'( '+job_type+' )'+'</h4></div>');
		   }
           //END============================>	

        }

        return true;
    },
    onStepChanged: function(event, currentIndex) {
        if (currentIndex == 2) {
            $("[name^=layermaterial]").change();
        }
    },
    onFinishing: function(event, currentIndex) {

    //PROPOSED RATE SHOULD NOT > FINAL RATE CHECK
    if(parseInt($("[name=proposed_rate]").val()) > parseInt($("[name=final_rate]").val())){
            alertify.error("FINAL RATE should be always greater then the PROPOSED RATE");
            return false;
	     }
	//END


		//REELWIDTH CHECK
        if (!$("[name=reelWidth]").val() || parseFloat($("[name=reelWidth]").val()) < 1) {
            $("[name=reelWidth]").select();
            alertify.error("Please Mention Reel Width");
            return false;
        }
		//END 
		
		//REEL WIDTH MAX,MIN DIMENSIONS CHECK
		if (parseFloat($("[name=reelWidth]").val()) > max_r || parseFloat($("[name=reelWidth]").val()) < min_r ) {
            $("[name=reelWidth]").select();
            alertify.error("REEL WIDTH should be accoding to the job type limitations.");
            return false;
        }
		//END 

        //COL CHECK)
        if (!$("[name=col]").val() || parseFloat($("[name=col]").val()) < 1) {
            $("[name=col]").select();
            alertify.error("Please Mention COL (1 Up)");
            return false;
        }
		//END


		//COL MAX,MIN DIMENSIONS CHECK
		if (parseFloat($("[name=col]").val()) > max_c || parseFloat($("[name=col]").val()) < min_c ) {
		$("[name=col]").select();
	    alertify.error("COL should be accoding to the job type limitations.");
		return false;
			}
		//END 
		
		
		//PROP UPS CHECK
        if (!$("[name=proUps]").val() || parseFloat($("[name=proUps]").val()) < 1) {
            $("[name=proUps]").select();
            alertify.error("Please Mention Proposed Ups");
            return false;
        }
		//END
		
		//COLORS CHECK
        if (!$("[name=colors]").val() || parseInt($("[name=colors]").val()) < 1) {
            $("[name=colors]").select();
            alertify.error("Please Mention Colors");
            return false;
		}
		//END


        //Entry CHECK
        var check = true;
        $("[name^=mic]:visible").each(function(index, element){
            if (!$(element).val())
            {
                check = false;
            }
        });
        if (!check){
            $("#mic").select();
            alertify.error("Please Enter Microns");
            return false;
        }
        //END


        // console.log($("#RateCaculator").serialize());
        return true;


    },



    //SUMBIT ALL DATA ===================================================================================
    onFinished: function(event) {
        // fetch2(url, data = null, method = "GET", dataType = "JSON", onSuccess = false, onError = false, successMsg = false, errorMsg = false, setDataAtSomeLocation = false)
        var url = $("#url").val();
        var onsuc = function(data) {
            return window.location = $("#redirect_url").val();
        };
        //fetch2(url, $("#RateCaculator").serialize(), "POST","JSON",onsuc,false,true,true);
        fetch_file_d($("#RateCaculator").attr('action'), this, "POST", onsuc, false, false, true, true);
    }
    //END===============================================================================================



});