     
	<?php $this->load->view('site/templates/header.php');?>
     
	<?php $this->load->view('site/cms/services');?>

    <?php $this->load->view('site/cms/intro');?>

	<?php $this->load->view('site/cms/how_it_works.php');?>

     <div class="container">
 
     <?php // $this->load->view('site/cms/team.php');?>           
	
     <?php // $this->load->view('site/cms/membership.php');?> 
	 
	  <?php  $this->load->view('site/cms/partners.php');?>
	 
	  <?php  $this->load->view('site/cms/testimonials.php');?> 
	  
	  </div>
	 

	 <div class="row text-center" style="background-color: #f2f2f2; margin-top: 35px; margin-right: 0px;">
      

  <?php 
						if ($brands->num_rows() > 0){
							$i=1;
							foreach ($brands->result() as $row){
							if($i < 7 ) { 
						?>
	  
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<div class="single_icon  text-center"> 
						
						<span class="hvr-shrink wow fadeInLeftBig">
							 <img src="images/brands/<?php echo $row->brand_image;?>" style="width: 118px;height: 118px;opacity: 0.6; margin-top: 14px;margin-bottom: 14px;">
						</span> 
						
						
						
					</div>
				</div>
				
					<?php 
							} $i++; }
						}
						?>
				
   </div>
	 

   <?php $this->load->view('site/templates/footer.php');?>
  
  <?php  if($booking_no != 'null') {    ?>
  
  <!-- Add content to the popup -->
  <div id="my_popup" style="background:white;padding: 22px;border-radius: 5px;">

   <h4 style="text-align: center;margin-bottom: 18px; text-transform: capitalize;">How you feel about Hoopy</h4>

   <table>
	
	<tr>
		<td style="font-weight: 500; color: #464646;">Give us rating</td>
		<td><div id="stars-green" style="padding-left: 177px;" data-rating="3"></div></td>
	</tr>
	
</table>
<div class="form-group" style="margin-top: 11px;">
  <textarea maxlength="400" class="form-control" rows="5" id="comments" placeholder="Feel free to write any comments/query?"></textarea>
</div>

<input type="hidden" id="booking_id" value="<?php echo $booking_no; ?>" />
<input type="hidden" id="rating" value="3" />
   
 <div  style="text-align: center;">
  <button type="submit" id="feedsubmit" class="btn-primary ">Submit</button>
</div>  


  </div>
  
   <script src="assets/js/jquery.popupoverlay.js"></script>
  
    <script>
    $(document).ready(function() {
	 $('#my_popup').popup('show');

    });
  </script>
  
 <script>
 
 $('body').on("click","#feedsubmit", function(){
  var comments = $("#comments").val();
  var booking_id = $("#booking_id").val();
  var rating = $("#rating").val();
  
   $.ajax({
					  url: '<?php echo  FULLURL; ?>calls/feedback',
					  data: {
						comments: comments,
						booking_id: booking_id,
						rating: rating
						},
						type: 'POST',
						success: function( data ) {
							data = data.trim();
							if(data == 'success')
							{
								location.reload();
							}							
						}
					}); 
	});				
 </script>

  <script>
  //the $(document).ready() function is down at the bottom

(function ( $ ) {
 
    $.fn.rating = function( method, options ) {
		method = method || 'create';
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
			limit: 5,
			value: 0,
			glyph: "glyphicon-star",
            coloroff: "gray",
			coloron: "gold",
			size: "24px",
			cursor: "default",
			onClick: function () {},
            endofarray: "idontmatter"
        }, options );
		var style = "";
		style = style + "font-size:" + settings.size + "; ";
		style = style + "color:" + settings.coloroff + "; ";
		style = style + "cursor:" + settings.cursor + "; ";
	

		
		if (method == 'create')
		{
			//this.html('');	//junk whatever was there
			
			//initialize the data-rating property
			this.each(function(){
				attr = $(this).attr('data-rating');
				if (attr === undefined || attr === false) { $(this).attr('data-rating',settings.value); }
			})
			
			//bolt in the glyphs
			for (var i = 0; i < settings.limit; i++)
			{
				this.append('<span data-value="' + (i+1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
			}
			
			//paint
			this.each(function() { paint($(this)); });

		}
		if (method == 'set')
		{
			this.attr('data-rating',options);
			this.each(function() { paint($(this)); });
		}
		if (method == 'get')
		{
			return this.attr('data-rating');
		}
		//register the click events
		this.find("span.ratingicon").click(function() {
			rating = $(this).attr('data-value')
			$(this).parent().attr('data-rating',rating);
			paint($(this).parent());
			settings.onClick.call( $(this).parent() );
		})
		function paint(div)
		{
			rating = parseInt(div.attr('data-rating'));
			div.find("input").val(rating);	//if there is an input in the div lets set it's value
			div.find("span.ratingicon").each(function(){	//now paint the stars
				
				var rating = parseInt($(this).parent().attr('data-rating'));
				var value = parseInt($(this).attr('data-value'));
				if (value > rating) { $(this).css('color',settings.coloroff); }
				else { $(this).css('color',settings.coloron); }
			})
		}

    };
 
}( jQuery ));

$(document).ready(function(){

	$("#stars-default").rating();
	$("#stars-green").rating('create',{coloron:'#EC610E',onClick:function(){ $("#rating").val(this.attr('data-rating')); }});
});

  </script>


  <?php } ?>
  
 
    <style>
	 .sbox {
	  /*   background: rgba(242, 111, 33, 0.9); */
	    background-color: rgba(242, 111, 33, 0.95);
        margin: 20px;
        display: block !important;	
        cursor: pointer;		
	 }
	 
	 .scont {
		margin-top: -7%; 
	 }
	 
	 .sbox:hover {
		 /*  background-color: rgb(242, 111, 33); */
		  background-color: rgba(242, 158, 33, 0.95);
	 }
	 
	 h2 {
    color: #333333;
    font-size: 18px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
   }
   
   .member_details p {
    color: #b1b1b1;
    font-size: 13px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
}

.member_social i {
    width: 30px;
    height: 30px;
    background: rgba(242, 111, 33, 0.9);
    color: #fff;
    text-align: center;
    padding-top: 7px;
}

.team_page_paragarap {
    padding: 0 15%;
    padding-bottom: 50px;
}

.team_page_paragarap p {
    text-align: center;
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    color: #333333;
    line-height: 22px;
}

.introduce_heading p {
    color: #646464;
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    line-height: 25px;
}


.serv {
 color:white;
 font-size: 13px;
 font-family: 'Open Sans', sans-serif;
 font-weight: 700;	
	}

	
li {
	list-style: none;
}

	</style>
	
	